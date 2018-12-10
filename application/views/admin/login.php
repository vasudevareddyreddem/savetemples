<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mithra Seva Samtithi Admin Pannel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/admin/css/custom.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/admin/css/bootstrapValidator.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/admin/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/admin/css/custom.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets/vendor/admin/js/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/admin/js/bootstrapValidator.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/vendor/admin/js/bootstrap.min.js"></script>


</head>
<body class="hold-transition login-page" style="background-image: url('../img/loginbac.png');background-repeat: no-repeat; background-size: cover;">
<div class="login-box">
  <div class="login-logo">
       <span class="logo-lg"><b>Mss</b> Admin</span>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    
						
						<div class="">
							<form id="defaultForm" name="defaultForm" method="post" class="" action="<?php echo base_url('admin/post'); ?>">
							<div class="form-group">
								<label class=" control-label">Email Id</label>
								<div class="">
								<input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email Id">
								
								</div>
							</div>
							<div class="form-group">
								<label class=" control-label">Password</label>
								<div class="">
								<input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password">
								
								</div>
							</div>
								
						  <div class="form-group">
                            <div class="col-md-6">
                                <a  href="<?php echo base_url('admin/forgotpassword'); ?>" >Forget Password?</a>
								
                                
                            </div> 
							<div class="col-md-6">
                                <button type="submit" class="btn btn-primary pull-right" name="signup" value="Sign up">Login</button>
								
                                
                            </div>
                        </div>
							
                    </form>
                        </div>	
						
					<div class="clearfix">&nbsp;</div>	
					
					
				

  

  </div>
  <!-- /.login-box-body -->
</div>

<script type="text/javascript">
$(document).ready(function() {
	
    $('#defaultForm').bootstrapValidator({
//     
        fields: {
            email: {
               validators: {
					notEmpty: {
						message: 'Email is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
				}
            },
            password: {
               validators: {
					notEmpty: {
						message: 'Password is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Password wont allow <> [] = % '
					}
				}
            }
        }
    });
});
</script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/vendor/admin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/admin/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/vendor/admin/js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
</body>
</html>
<?php if($this->session->flashdata('success')): ?>
<div class="alert_msg1 animated slideInUp bg-succ">
   <?php echo $this->session->flashdata('success');?> &nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i>
</div>
<?php endif; ?>
<?php if($this->session->flashdata('error')): ?>
<div class="alert_msg1 animated slideInUp bg-warn">
   <?php echo $this->session->flashdata('error');?> &nbsp; <i class="fa fa-exclamation-triangle text-success ico_bac" aria-hidden="true"></i>
</div>
<?php endif; ?>