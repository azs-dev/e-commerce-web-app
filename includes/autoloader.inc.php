<?php
spl_autoload_register('myAutoLoader');

function myAutoLoader($className) {
  $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  if (stripos($url, 'includes') !== false) {
    switch (true) {
      case stripos($className, 'cntrl') !== false:
        $path = '../classes/cntrl/';
        break;
      case stripos($className, 'view') !== false:
        $path = '../classes/view/';
        break;
      default:
        $path = '../classes/model/';
        break;
    }
  } elseif (stripos($url, 'pages') !== false) {
    switch (true) {
      case stripos($className, 'cntrl') !== false:
        $path = '../../classes/cntrl/';
        break;
      case stripos($className, 'view') !== false:
        $path = '../../classes/view/';
        break;
      default:
        $path = '../../classes/model/';
        break;
  }
}
  else {
    switch (true) {
      case stripos($className, 'cntrl') !== false:
        $path = 'classes/cntrl/';
        break;
      case stripos($className, 'view') !== false:
        $path = 'classes/view/';
        break;
      default:
        $path = 'classes/model/';
        break;
    }
  }
  $extension = '.class.php';
  $fullPath = $path . $className . $extension;
  // Error handler
    if (!file_exists($fullPath)) {
      return false;
    }

  require_once $fullPath;
}
?>
