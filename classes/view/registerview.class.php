<?php

class RegisterView extends Register {

  public function alreadyexists() {
    header("Location:../../index.php?usernameexists");
  }

  public function registersuccess() {
    header("Location:../index.php?success");
  }
}
