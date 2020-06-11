<?php

class Framework
{
    private $uri = [];

    function __construct()
    {
        session_start();
        $this->load_config();
        $this->load_functions();
        $this->init_autoload();
        $this->init_csrf();
        $this->dispatch();
    }

    public static function init()
    {
        $framework = new self();
        return;
    }

    private function init_session()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start([
                'use_only_cookies' => 1,
                'read_and_close' => true
            ]);
            return;
        }
        session_start();
        return;
    }

    private function load_config()
    {
        $filename = 'framework_config.php';
        if (!is_file('app/config/' . $filename)) {
            die(sprintf('No se encuentra el archivo %s requerido.', $filename));
        }
        require_once 'app/config/' . $filename;
        return;
    }

    private function load_functions()
    {
        $file = 'core_functions.php';
        if (!is_file(FUNCTIONS . $file)) {
            die(sprintf('No se encuentra el archivo %s requerido.', $file));
        }
        require_once FUNCTIONS . $file;
        $file = 'custom_functions.php';
        if (!is_file(FUNCTIONS . $file)) {
            die(sprintf('No se encuentra el archivo %s requerido.', $file));
        }
        require_once FUNCTIONS . $file;
        return;
    }

    private function init_autoload()
    {
        require_once CLASSES . 'Autoload.php';
        Autoload::init();
        return;
    }

    private function init_csrf()
    {
        $csrf = new Csrf();
    }

    private function filter_url()
    {
        if (isset($_GET['uri'])) {
            $this->uri = $_GET['uri'];
            $this->uri = rtrim($this->uri, '/');
            $this->uri = filter_var($this->uri, FILTER_SANITIZE_URL);
            $this->uri = explode('/', strtolower($this->uri));
            return $this->uri;
        }
    }

    // Método para ejecutar automáticamente el controlador solicitado por el usuario, su método y pasarle parametros
    private function dispatch()
    {
        $this->filter_url();

        // Saber si se está pasando el nombre de un controlador en el URI
        if (isset($this->uri[0])) {
            $current_controller = $this->uri[0];
            unset($this->uri[0]);
        } else {
            $current_controller = DEFAULT_CONTROLLER;
        }

        // Saber si existe clase y el metodo con ese nombre dentro del archivo controlador especificado
        $controller = $current_controller . 'Controller'; // Se debe pasar el nombre sin la palabra 'Controller'
        if (!class_exists($controller)) {
            $current_controller = DEFAULT_ERROR_CONTROLLER;
            $controller = DEFAULT_ERROR_CONTROLLER . 'Controller';
        }
        if (isset($this->uri[1])) {
            $method = str_replace('-', '_', $this->uri[1]);
            if (!method_exists($controller, $method)) {
                $controller = DEFAULT_ERROR_CONTROLLER . 'Controller';
                $current_method = DEFAULT_METHOD; // Debe existir el metodo index() en todos los controladores
                $current_controller = DEFAULT_ERROR_CONTROLLER;
            } else {
                $current_method = $method;
            }
            unset($this->uri[1]);
        } else {
            $current_method = DEFAULT_METHOD;
        }

        // Creando constantes para utilizar más adelante
        define('CONTROLLER', $current_controller);
        define('METHOD', $current_method);

        // Ejecutando controlador y método según se haga la petición
        $controller = new $controller; // Se instancia la clase del nombre del controlador
        $params = array_values(empty($this->uri) ? [] : $this->uri); // Se obtienen los parametros de la URI
        if (empty($params)) {
            call_user_func([$controller, $current_method]); // Llamada al metodo sin parametros
        } else {
            call_user_func_array([$controller, $current_method], $params); // Llamada al metodo cuando se especifican parametros
        }
        return;
    }
}
