<?php
require_once('C:\xampp\htdocs\DOST\PHPMailer\PHPMailerAutoload.php');

class Checkout extends Dbh {

  protected function CheckOutModel($productArr, $customerId, $date, $email, $name, $address, $phone, $totalprice) {
    $viewCheckout = new CheckoutView;
    $sql = "INSERT INTO sold_t(c_id, p_id, date_sold) VALUES (?,?,?)";
    $stmt = $this->connect()->prepare($sql);

    for ($i=0; $i < sizeof($productArr) ; $i++) {
      $stmt->execute([$customerId, $productArr[$i]['product'], $date]);
    }
    $this->sendEmail($customerId, $email, $name, $address, $phone, $totalprice);
    $this->removeCartItems($customerId);
    $viewCheckout->CheckoutViewer();
  }

  private function removeCartItems($customerId){
    $sql = "DELETE FROM cart_t WHERE c_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$customerId]);
  }

  private function sendEmail($customerId, $email, $name, $address, $phone, $totalprice) {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->isHTML();
    $mail->Username = '140482@adzu.edu.ph';
    $mail->Password = 'lilycollinss';
    $mail->SetFrom('no-reply@aziz.com');
    $mail->Subject = 'Order Summary';
    $mail->Body =
    'Thank you for ordering from us <b>'.$name.'</b>.<br><br> Your Order is on its way to your address <b>'.$address.'</b><br><br>
    you will be contacted through your mobile phone number <b>'.$phone.'</b>.<br><br>

    Your total order is PHP <b>'.$totalprice.'</br><br>';
    $mail->AddAddress($email);

    $mail->Send();
  }

}
