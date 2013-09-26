<?php
// Quick and dirty navigation.
$menu_item_default = 'movies';
$menu_items = array(
  'movies' => array(
    'label' => 'Home',
    'desc' => 'A list of all my magazines',
  ),
  'addList' => array(
    'label' => 'Add',
    'desc' => 'Add a magazine to my collection',
  ),
);

// Determine the current menu item.
$menu_current = $menu_item_default;
// If there is a query for a specific menu item and that menu item exists...
if (@array_key_exists($this->uri->segment(2), $menu_items)) {
  $menu_current = $this->uri->segment(2);
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Movie List | <?php html_escape($menu_items[$menu_current]['label']); ?></title>
        <meta name="description" content="<?php html_escape($menu_items[$menu_current]['desc']); ?>">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="/CodeIgniter_2.1.3/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="/CodeIgniter_2.1.3/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="/CodeIgniter_2.1.3/css/main.css">

        <script src="/CodeIgniter_2.1.3/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="/CodeIgniter_2.1.3/js/bootstrap.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    </head>
    <body>
        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        <div class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/CodeIgniter_2.1.3-project/index.php/">My Move Rating</a>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
               <?php
                  foreach ($menu_items as $item => $item_data) {
                    echo '<li' . ($item == $menu_current ? ' class="active"' : '') . '>';
                    echo '<a href="/CodeIgniter_2.1.3-project/index.php/' ."movies/" .$item . '" title="' . $item_data['desc'] . '">' . $item_data['label'] . '</a>';
                    echo '</li>';
                  }
                ?>
              </ul>
              
              <?php
                if($this->session->userdata('logged_in')){
                  echo '<ul class="nav navbar-right"><li><a href="/CodeIgniter_2.1.3-project/index.php/home/logout">Logout</a></li></ul>';
                }else{
                  $this->load->helper(array('form'));
                  $this->load->view('login_view');
                }

              ?>
            </div><!--/.nav-collapse -->
          </div>
        </div>

        <div class="container">