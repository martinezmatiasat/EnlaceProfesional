<?php

class Alert
{
    private $valid_types = ['info', 'success', 'danger', 'warning', 'light', 'dark'];
    private $type;
    private $msg;

    /**
     * Generar una notificación flash
     * @param string array $msg
     * @param string $type
     * @return void
     */
    public static function set_msg($msg, $type = null)
    {
        $self = new self();
        $self->type = in_array($type, $self->valid_types) ? $type : 'info';
        if (is_array($msg)) {
            foreach ($msg as $m) {
                $_SESSION[$self->type][] = $m;
            }
            return true;
        }
        $_SESSION[$self->type][] = $msg;
        return true;
    }

    /**
     * Llamar desde la vista para mostrar notificaciones al usuario
     *
     * @return void
     */
    public static function show_msg()
    {
        $self = new self();
        $output = '';
        foreach ($self->valid_types as $type) {
            if (isset($_SESSION[$type]) && !empty($_SESSION[$type])) {
                foreach ($_SESSION[$type] as $m) {
                    $output .= '<div class="alert alert-'.$type.' alert-dismissible show fade" role="alert">';
                    $output .= $m;
                    $output .= '<button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                                </button>';
                    $output .= '</div>';
                }
                unset($_SESSION[$type]);
            }
        }
        return $output;
    }
}
