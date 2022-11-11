<?php

class Register extends Dbh {

  protected function CheckData($name, $email, $username, $password, $role) { // MERHCANT 1, CUSTOMER 0
    $view = new RegisterView;
    $userCheck = "SELECT * FROM users_t WHERE u_username = ?"; // CHECKING IF USERNAME ALREADY EXISTS
    $stmt = $this->connect()->prepare($userCheck);
		$stmt->execute([$username]);
		$results = $stmt->fetchAll();

    if (!empty($results)) {
      $view->alreadyexists($username);
    } else {
      $this->InsertData($name, $email, $username, $password, $role);
    }
  }

  protected function InsertData($name, $email, $username, $password, $role) {
    $view = new RegisterView;
    $sql = "INSERT INTO users_t(u_username, u_password, u_role) VALUES (?,?,?)";
    $stmt = $this->connect()->prepare($sql);
		$stmt->execute([$username, $password, $role]);

    if ($role == 1) {
      $sql2 = "SELECT u_id FROM users_t WHERE u_username = ?";
      $stmt = $this->connect()->prepare($sql2);
  		$stmt->execute([$username]);
  		$results = $stmt->fetchAll();
      $uId = $results[0]['u_id'];

      $sql3 = "INSERT INTO merchants_t (u_id, m_name, m_email) VALUES (?,?,?)";
      $stmt = $this->connect()->prepare($sql3);
  		$stmt->execute([$uId, $name, $email]);
      $view->registersuccess();

    } elseif ($role == 0) {
      $sql4 = "SELECT u_id FROM users_t WHERE u_username = ?";
      $stmt = $this->connect()->prepare($sql4);
  		$stmt->execute([$username]);
  		$results = $stmt->fetchAll();
      $uId = $results[0]['u_id'];

      $sql5 = "INSERT INTO customers_t (u_id, c_name, c_email) VALUES (?,?,?)";
      $stmt = $this->connect()->prepare($sql5);
  		$stmt->execute([$uId, $name, $email]);
      $view->registersuccess();
    }
  }
}
