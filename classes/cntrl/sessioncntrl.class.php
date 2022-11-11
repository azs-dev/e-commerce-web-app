<?php

class SessionCntrl {

  private $loggedin = false; // Only determines session

  function __construct() { // Start session
    if (session_status() !== PHP_SESSION_ACTIVE) {
      session_start();
    }
  }

  public function setSession($key, $value) {
    $_SESSION[$key] = $value;
    $this->$loggedin = true;
  }

  public function getSession($key){
    if (isset($_SESSION[$key])) {
      return $_SESSION[$key];
    } else {
      return null;
    }
  }

  public static function destroySession() {
    if (self::$_sessionStarted == true) {
      session_unset();
      session_destroy();
    }
  }

  public function logOut() {
    session_start();
  	session_unset();
  	session_destroy();
  	return header("Location:../index.php?loggedout");
  	exit();
  }

}
