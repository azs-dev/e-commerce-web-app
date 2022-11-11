<?php

class RegisterCntrl extends Register {

  public function DataCntrl($name, $email, $username, $password, $role) {
    $this->CheckData($name, $email, $username, $password, $role);
  }
}
