 
 <?php //echo '<pre>';print_r($details);exit; ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Admin profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
				<?php if($details['profile_pic']!=''){ ?>
					<img src="<?php echo base_url('assets/profile_pic/'.$details['profile_pic']); ?>" class="profile-user-img img-responsive img-circle" alt="User Image">
				<?php }else{  ?>
						<img src="<?php echo base_url(); ?>assets/vendor/images/user2-160x160.jpg" class="profile-user-img img-responsive img-circle" alt="User Image">
				<?php } ?>
              <h3 class="profile-username text-center"> <?php echo isset($details['name'])?$details['name']:''; ?></h3>

              <p class="text-muted text-center">Admin</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?php echo isset($details['email'])?$details['email']:''; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Phone  Number	</b> <a class="pull-right"><?php echo isset($details['phone'])?$details['phone']:''; ?></a>
                </li>
				<li class="list-group-item">
                  <a href="<?php echo base_url('profile/changepassword'); ?>" class="">Change password?</a>&nbsp; &nbsp;&nbsp; &nbsp;<a href="<?php echo base_url('dashboard/logout'); ?>" class="">Sign Out</a>
                </li>
                
              </ul>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php echo isset($details['address'])?$details['address']:''; ?></p>

              <hr>
			  <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p><?php echo isset($details['notes'])?$details['notes']:''; ?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> Information</h3>
              <a href="<?php echo base_url('profile/edit'); ?>"class=" pull-right btn btn-primary btn-sm"> Edit</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-user margin-r-5"></i> Name</strong>

              <p class="h4">
               <?php echo isset($details['name'])?$details['name']:''; ?>
              </p>

              <hr>  
			  <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

              <p class="h4">
<?php echo isset($details['email'])?$details['email']:''; ?>              </p>
			  <hr>  
			  <strong><i class="fa fa-mobile margin-r-5"></i> Mobile</strong>

              <p class="h4">
               <?php echo isset($details['phone'])?$details['phone']:''; ?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php echo isset($details['address'])?$details['address']:''; ?></p>

              <hr>
			  <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p><?php echo isset($details['notes'])?$details['notes']:''; ?></p>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>

