<!DOCTYPE html>
<html >
 
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Save Temples Bharat</title>
        <!--Favicon add-->
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/vendor/images/logo.png">
        <!--bootstrap Css-->
        <link href="<?php echo base_url(); ?>assets/vendor/css/plugins/bootstrap.min.css" rel="stylesheet">
        <!--font-awesome Css-->
        <link href="<?php echo base_url(); ?>assets/vendor/css/font-awesome.min.css" rel="stylesheet">
        <!--Swiper  Css-->
        <link href="<?php echo base_url(); ?>assets/vendor/css/plugins/swiper.min.css" rel="stylesheet">
                <!--Lightcase  Css-->
        <link href="<?php echo base_url(); ?>assets/vendor/css/plugins/lightcase.css" rel="stylesheet">
        <!--Style Css-->
        <link href="<?php echo base_url(); ?>assets/vendor/css/mithra.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendor/css/style.css" rel="stylesheet">
        
    </head>
    <body >
   
        <header class="header-section">
            <!-- Header top start -->
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-wrapper">
                                <!-- Header section start -->
                                <div class="header-top-section">
                                    <!-- header top left start -->
                                    <div class="header-top-left">
                                        <ul>
                                            <li>
                                                <i class="fa fa-envelope-o" aria-hidden="true"> </i> 
                                                <p>
                                                    <a href="#" style="text-transform:none;">
                                                        savetemplesbharat@gmail.com
                                                    </a>
                                                </p>
                                            </li>

                                            <li>
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                                <P>9848177511, 9291099699</P>
                                            </li>

                                        </ul>

                                    </div>
                                    <!-- Header top left end -->

                                    <!-- Header top right start -->
                                    <div class="header-top-right">
                                        <!--<ul class="admin-area">
                                            <li><a href="login.html"><i class="fa fa-user" aria-hidden="true"></i><span>login</span></a></li>
                                            <li><a href="register.html"><i class="fa fa-user-plus" aria-hidden="true"></i><span>Register</span></a></li>
                                        </ul>-->
                                        <ul class="social-link-list  social-link-list1">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>

                                    </div>
                                    <!-- Header top right end -->
                                </div>
                                <!-- Header section end -->
                            </div>
                            <!-- section-wrapper -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- header top end -->

            <!-- Header bottom start -->
            <div class="header-bottom header header-wrapper">
                <nav class="navbar navbar-default">
                    <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="navbar-menu">
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img style="width:110px;height:auto;" src="<?php echo base_url(); ?>assets/vendor/images/logo.png" alt="logo"></a>
                                        </div>

                                            <!-- Collect the nav links, forms, and oth
                                                er content for toggling -->
                                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                              <ul class="nav navbar-nav">
                                                <li class="<?php if($this->uri->segment(1)==''){ echo "menu-active"; } ?>"><a class="page-scroll" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a></li>
                                                  <li class="<?php if($this->uri->segment(1)=='certificates'){ echo "menu-active"; } ?>"><a class="page-scroll" href="<?php echo base_url('certificates'); ?>">Committee</a></li>
                                               <li class="<?php if($this->uri->segment(1)=='aboutus'){ echo "menu-active"; } ?>"><a class="page-scroll" href="<?php echo base_url('aboutus'); ?>">Activities</a></li> 
											
												<li class="<?php if($this->uri->segment(1)=='gallery'){ echo "menu-active"; } ?>"><a class="page-scroll" href="<?php echo base_url('gallery'); ?>">Gallery</a>
												</li>
												<li class="<?php if($this->uri->segment(1)=='events'){ echo "menu-active"; } ?>"><a class="page-scroll" href="<?php echo base_url('events'); ?>">Media Coverage</a></li>
												
                                               	<li class="<?php if($this->uri->segment(1)=='donate'){ echo "menu-active"; } ?>"><a class="page-scroll" href="<?php echo base_url('donate'); ?>">Donate</a></li>
                                                
                                             
                                                
                                                <li class="<?php if($this->uri->segment(1)=='contactus'){ echo "menu-active"; } ?>"><a class="page-scroll" href="<?php echo base_url('contactus'); ?>">contact</a></li>
                                              </ul>
                                              <div class="donate-button">
                                                <button type="button" data-toggle="modal" data-target="#donate-popup">donate<br> now</button>
                                              </div>
                                        </div><!-- /.navbar-collapse -->
                                    
                                    </div>
                                </div>
                        </div>
                    </div>
                </nav>    
            </div>
             <!-- header-bottom end -->
        </header>  
		 <?php if($this->session->flashdata('success')): ?>
        <div class="alert_msg1 animated slideInUp bg-succ">
            <?php echo $this->session->flashdata('success');?> &nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i> </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('error')): ?>
        <div class="alert_msg1 animated slideInUp bg-warn">
            <?php echo $this->session->flashdata('error');?> &nbsp; <i class="fa fa-exclamation-triangle text-success ico_bac" aria-hidden="true"></i> </div>
        <?php endif; ?>