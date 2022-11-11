<?php

class UsersCntrl extends Users {
  public function LogIn($username, $password) {
     $results = $this->getUser($username, $password);
   }
}
