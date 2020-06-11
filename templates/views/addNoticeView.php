<?php require_once INCLUDES.'admin_header.php'; ?>

<?php require_once INCLUDES.'admin_navbar.php'; ?>

<form action="/my-handling-form-page" method="post">
 <ul>
  <li>
    <label for="name">Titulo:</label>
    <input type="text" id="name" name="user_name">
  </li>
  <li>
    <label for="mail">Imagen:</label>
    <input type="email" id="mail" name="user_mail">
  </li>
  <li>
    <label for="msg">Cuerpo de la noticia:</label>
    <textarea id="msg" name="user_message"></textarea>
  </li>
 </ul>
</form>

<?php require_once INCLUDES.'inc_footer.php'; ?>