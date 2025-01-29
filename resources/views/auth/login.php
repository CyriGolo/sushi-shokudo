<?php
ob_start();
?>

<section class="flex flex-col items-center gap-6">
  <form action="/login/" method="post" class="flex flex-col gap-4">
    <div>
      <div class="flex items-center gap-4 border-2 border-gray-200 p-4">
        <label for="identifier"><i class="fas fa-user-tie"></i></label>
        <input type="text" class="p-2" autocomplete="username" name="identifier" value="<?php echo old("identifier");?>" placeholder="Username or Email" required>
      </div>
      <span class="error"><?php echo error("identifier");?></span>
    </div>

    <div>
      <div class="flex items-center gap-4 border-2 border-gray-200 p-4">
        <label for="password"><i class="fas fa-key"></i></label>
        <input id="inputPassword" class="p-2" autocomplete="current-password" class="inputPassword" type="password" name="password" value="<?php echo old("password");?>" placeholder="password" required />
        <button id="btnPassword" class="viewPassword" type="button" name="button"><i class="far fa-eye"></i></button>
      </div>
      <span class="error"><?php echo error("password");?></span>
    </div>
    <span class="error"><?php echo error("message");?></span>

    <input type="submit" value="S'identifier" class="w-full p-2 border-cyan-500 border-2 rounded-md cursor-pointer text-center bg-cyan-500 text-white hover:text-black hover:bg-white"/>
  </form>

  <div class="more">
    <p>Vous n'avez pas de compte ? <a href="/register">Inscrivez-vous !</a></p>
  </div>
</section>

<script>
var btnPass = document.getElementById("btnPassword");
var inputPass = document.getElementById("inputPassword");
btnPass.onclick = function() {
    if (inputPass.type === "password") {
        inputPass.type = "text";
    } else {
        inputPass.type = "password";
    }
};
</script>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';