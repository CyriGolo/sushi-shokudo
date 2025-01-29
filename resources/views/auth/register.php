<?php
ob_start();
?>

<section class="flex flex-col items-center gap-6">
  <form action="/register/" method="post" class="flex flex-col gap-4">
    <div>
      <div class="flex items-center gap-4 border-2 border-gray-200 p-4">
        <label for="username"><i class="fas fa-user-tie"></i></label>
        <input type="text" class="p-2" autocomplete="username" name="username" value="<?php echo old("username");?>" placeholder="Username" required>
      </div>
      <span class="error"><?php echo error("username");?></span>
    </div>

    <div>
      <div class="flex items-center gap-4 border-2 border-gray-200 p-4">
        <label for="email"><i class="fas fa-envelope"></i></label>
        <input type="email" class="p-2" autocomplete="email" name="email" value="<?php echo old("email");?>" placeholder="Email" required>
      </div>
      <span class="error"><?php echo error("email");?></span>
    </div>

    <div>
      <div class="flex items-center gap-4 border-2 border-gray-200 p-4">
        <label for="password"><i class="fas fa-key"></i></label>
        <input id="inputPassword" class="p-2" autocomplete="new-password" class="inputPassword" type="password" name="password" value="<?php echo old("password");?>" placeholder="Password" required />
        <button id="btnPassword" class="viewPassword" type="button" name="button"><i class="far fa-eye"></i></button>
      </div>
      <span class="error"><?php echo error("password");?></span>
    </div>

    <div>
      <div class="flex items-center gap-4 border-2 border-gray-200 p-4">
        <label for="passwordConfirm"><i class="fas fa-key"></i></label>
        <input id="inputPasswordConfirm" class="p-2" autocomplete="new-password" class="inputPassword" type="password" name="passwordConfirm" value="<?php echo old("passwordConfirm");?>" placeholder="Confirm Password" required />
        <button id="btnPasswordConfirm" class="viewPassword" type="button" name="button"><i class="far fa-eye"></i></button>
      </div>
      <span class="error"><?php echo error("passwordConfirm");?></span>
    </div>

    <span class="error"><?php echo error("message");?></span>

    <input type="submit" value="S'inscrire" class="w-full p-2 border-cyan-500 border-2 rounded-md cursor-pointer text-center bg-cyan-500 text-white hover:text-black hover:bg-white"/>
  </form>

  <div class="more">
    <p>Vous avez déjà un compte ? <a href="/login">Identifiez-vous !</a></p>
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

var btnPassConf = document.getElementById("btnPasswordConfirm");
var inputPassConf = document.getElementById("inputPasswordConfirm");
btnPassConf.onclick = function() {
    if (inputPassConf.type === "password") {
        inputPassConf.type = "text";
    } else {
        inputPassConf.type = "password";
    }
};
</script>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';