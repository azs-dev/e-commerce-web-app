<script src="https://kit.fontawesome.com/1ae22fb5eb.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css"> <!-- bootstrap's css -->
<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script> <!-- bootstrap's js -->
<link rel="stylesheet" type="text/css" href="../../css/style.css">

<nav class="navbar navbar-expand-lg sticky-top" style="background-color: #01062F;">
  <a class="navbar-brand" style="color: #C6940B; font-size: 20px;">DOST<img src="../../images/dost-logo.png" class="dost_logo"></a>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
    <span class="navbar-text">
      <?php
      include '../../includes/autoloader.inc.php';
      $merchantname = new SessionCntrl;
      echo "Hello, <i class='user-name'>". $merchantname->getSession('m_name')."</i>";
      ?>
    </span>
    </li>
  </ul>
  <form action="../../includes/logout.inc.php" method="post">
    <button class="btn btn-outline-danger btn-md" type="submit" name="button">Logout</button>
  </form>

</nav>
