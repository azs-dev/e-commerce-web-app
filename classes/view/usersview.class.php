<?php

class UsersView extends Users {
  public function LoggedIn($uid, $role) { // ROLE '1' IS FOR MERCHANT, ROLE '0' IS FOR CUSTOMER
      if ($role == 1) {
          $results = $this->getMerchantAccount($uid);
          $merchantName = $results[0]['m_name'];
          $merchantId = $results[0]['m_id'];

          $session = new SessionCntrl;
          $session->setSession("m_id", $merchantId);
          $session->setSession("m_name", $merchantName);
          if (isset($_SESSION['m_id'])) {
            header("Location:../pages/merchant/home.merchant.php?");
          } else {
            echo "ERROR MERCHANT!";
          }
      }
      elseif ($role == 0) {
          $results = $this->getCustomerAccount($uid);
          $customerName = $results[0]['c_name'];
          $customerId = $results[0]['c_id'];

          $session = new SessionCntrl;
          $session->setSession("c_id", $customerId);
          $session->setSession("c_name", $customerName);
          if (isset($_SESSION['c_id'])) {
            header("Location:../pages/customer/home.customer.php");
          } else {
            echo "ERROR CUSTOMER!";
          }

      } else {
          return false;
      }
  }

  public function NotRegistered() {
    header("Location:../index.php?notregistered");
  }

  public function InvalidPassword() {
    header("Location:../index.php?invalidpwd");
  }
}
