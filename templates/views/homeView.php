<?php require_once INCLUDES . 'inc_header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-6 text-center offset-md-3">
            <img src="<?php echo IMAGES . 'logo_2m_blanco.png' ?>" alt="2m framework" class="img-fluid" style="width: 200px;">
            <h2 class="text-white mt-5 mb-3">FRAMEWORK</h2>
            <div class="mt-5">
                <p class="text-muted">Bienvenido <?php echo $_SESSION['user']['name']; ?></p>
                <p class="text-muted">Desarrollado por 2M Soft Solutions</p>
                <a href="login/logout">Cerrar sesion</a>
            </div>
        </div>
    </div>
</div>

<?php require_once INCLUDES . 'inc_footer.php'; ?>