<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Event's List
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Event's List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Event's List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Image</th>
                  <th>Created date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if(isset($talkaboutus_list) && count($talkaboutus_list)>0){ ?>
				<?php foreach($talkaboutus_list as $list){ ?>
                <tr>
                  <td><?php echo htmlentities($list['name']); ?></td>
                  <td><?php echo htmlentities($list['description']); ?></td>
                  <td><?php echo htmlentities($list['category']); ?></td>
                  <td><img width="50px" height="50px" src="<?php echo base_url('assets/talkaboutus/'.$list['image']); ?>">
				  <td><?php echo date("d-m-Y", strtotime($list['create_at']));?></td>
				<td><?php if($list['status']==1){ echo "Active"; }else{ echo "deactive";} ?></td>
                  <td>
					<a href="<?php echo base_url('talkaboutus/edit/'.base64_encode($list['a_id'])); ?>"><i class="fa fa-edit"></i></a>
										&nbsp;&nbsp;

					<a href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['a_id'])).'/'.base64_encode(htmlentities($list['status']));?>');adminstatus('<?php echo $list['status'];?>')" href="javascript:void(0)" data-toggle="modal" data-target="#myModal"><i class="fa fa-check-square-o"></i></a>
										&nbsp;&nbsp;

					<a href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode($list['a_id']) ?>');admindedeletemsg();" data-toggle="modal" data-target="#myModal" title="Delete"><i class="fa fa-trash-o"></i></a>
				  
				  </td>
                </tr>
                
                
                
				<?php } ?>
				<?php } ?>
				</tbody>
				<tfoot>
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Image</th>
                  <th>Created date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 

<script>
function admindeactive(id){
	$(".popid").attr("href","<?php echo base_url('talkaboutus/status'); ?>"+"/"+id);
}

function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('talkaboutus/delete'); ?>"+"/"+id);
}
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
