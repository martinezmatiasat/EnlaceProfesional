<?php require_once INCLUDES.'inc_header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-6 text-center offset-xl-3">
            <img src="<?php echo IMAGES.'logo_2m_blanco.png' ?>" alt="2m framework" class="img-fluid" style="width: 200px;">
            <div>
                <h2 class="text-white mt-5 mb-3">Inicio de Sesión</h2>
                <form class="form-inicio" action="login/login" method="post">
                    <input class="icon-mail" name="email" type="email" placeholder="Email" required>
                    <input class="icon-pass" name="pass" type="password" placeholder="Contraseña" required>
                    <input type="hidden" name="csrf_token" value=<?php echo $_SESSION['csrf_token']['token']; ?> >
                    <br>
                    <a href="recuperar">No recuerdo mi clave</a>
                    <br>
                    <button class="form-boton" type="submit">INCIAR SESIÓN</button>
                </form>
            </div>
            <!-- contenido -->
            <?php echo Alert::show_msg(); ?>
            <!-- ends -->
        </div>
    </div>
</div>

<?php require_once INCLUDES . 'inc_footer.php'; ?>