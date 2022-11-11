<?php

class Users extends Dbh {

	protected function getUser($username, $password) {
		$viewResult = new UsersView;
		$sql = "SELECT * FROM users_t WHERE u_username = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$username]);
		$results = $stmt->fetchAll();

		if (!empty($results)) {
			$passwordCheck = $this->verifyPassword($password, $results[0]['u_password']);
				if (!empty($passwordCheck)) {
					$uid = $results[0]['u_id'];
					$role = $results[0]['u_role'];
					$viewResult->LoggedIn($uid, $role);
				}
		} else {
			$viewResult->NotRegistered();
		}
	}

	private function verifyPassword($password1, $password2) {
		$viewResult = new UsersView;
		if ($password1 == $password2) {
			return true;
		} else {
			$viewResult->InvalidPassword();
		}
	}

	protected function getCustomerAccount($uId) {  // ROLE '1' IS FOR MERCHANT, ROLE '0' IS FOR CUSTOMER
			$sql = "SELECT * FROM customers_t WHERE u_id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$uId]);

			$results = $stmt->fetchAll();
			return $results;
	}

	protected function getMerchantAccount($uId) {
		$sql = "SELECT * FROM merchants_t WHERE u_id = '.$uId.'";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$uId]);

		$results = $stmt->fetchAll();
		return $results;
	}
}
