<!doctype html>
<html lang="en" oncontextmenu="return false" 
onkeydown="javascript:Disable_Control_C()">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo BASE_URL;?>img/logo.jpg">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="icon" type="image/png" href="<?php echo BASE_URL;?>img/logo.jpg">
  <title>Appan Ghar</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

  <!--     Fonts and icons     -->
  <?php echo $this->Html->css(['https://fonts.googleapis.com/icon?family=Material+Icons','https://fonts.googleapis.com/css?family=Roboto:300,400,500,700','font-awesome.min','bootstrap.min','material-kit','demo','style']);?>
<style type="text/css">
  option{
    font-size: 15px;
  }
</style>
</head>
<body class="index-page" >
<!-- Navbar -->
<nav class="navbar " style="background-color: #8b0d04;">
  <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        
            <div class="logo-container">
                  <div class="logo">
                      
                      <?php echo $this->Html->image('logo.jpg',['alt'=>'Creative Tim Logo','rel'=>'tooltip','title'=>'Designed By Trayzon.com','data-placement'=>'bottom','data-html'=>true,'url'=>['controller'=>'homes','action'=>'index']]);?>
                  </div>

            </div>
          
      </div>

      <div class="collapse navbar-collapse" id="navigation-index">
        <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="<?php echo BASE_URL.'blogs';?>" rel="tooltip" title="Blog" data-placement="bottom" >
            <i class="fa fa-commenting-o"></i> Blog
          </a>
        </li>
        <li>
          <a href="#" rel="tooltip" title="Contact Us" data-placement="bottom">
            <i class="fa fa-phone"></i> +9123456789
          </a>
        </li>
        <li>
          <a rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/"  class="btn btn-white btn-simple btn-just-icon">
            <i class="fa fa-twitter"></i>
          </a>
        </li>
        <li>
          <a rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/" class="btn btn-white btn-simple btn-just-icon">
            <i class="fa fa-facebook-square"></i>
          </a>
        </li>
        <li>
          <a rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/?hl=en" class="btn btn-white btn-simple btn-just-icon">
            <i class="fa fa-instagram"></i>
          </a>
        </li>

        </ul>
      </div>
  </div>
</nav>
<!-- End Navbar -->
<div class="wrapper">
<br><br>
<div class="container">
<div class="main main-raised">
<div class="section">
          <div class="container tim-container">
              <div class="title" style="text-align: center;">
                          <p class="text-center title">
                          <?php 
                          echo "<h3>Your order status is ". $book->status .".</h3>";
                          echo "<h4>Your transaction id for this transaction is ".$book->txnid."</h4>";?></p>
                          <br>
                          <a href="<?php echo BASE_URL;?>" class="btn btn-info">Conform</a>
            </div>
        </div>

      </div>
  </div>
</div>
  <?=$this->html->script('new')?>
  </div>
    <footer class="footer">
          <div class="container">
              <nav class="pull-left">
                  <ul>
              <li>
                <a href="<?php echo BASE_URL;?>">
                  Appan Ghar
                </a>
              </li>
              <li>
                <a href="<?php echo BASE_URL.'homes/about';?>">
                   About Us
                </a>
              </li>
              <li>
                <a href="<?php echo BASE_URL.'blogs';?>">
                   Blog
                </a>
              </li>
              <li>
                <a href="<?php echo BASE_URL.'homes/licenses';?>">
                  Privacy Policy
                </a>
              </li>
                  </ul>
              </nav>
              <div class="copyright pull-right">
                  &copy; 2017 Appan Ghar. All rights reserved  <i class="material-icons">favorite</i> Design by <a href="http://trayzon.com" target="_blank">Trayzon Technologies</a>

              </div>
          </div>
      </footer>
  </div>

</body>
  <!--   Core JS Files   -->
  <?php echo $this->Html->script(['jquery.min','bootstrap.min','material.min','nouislider.min','bootstrap-datepicker','material-kit']);?>



</html>

