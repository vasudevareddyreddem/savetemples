<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blogs List
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Blogs List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Blogs List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Image</th>
                  <th>Created date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if(isset($blogs_list) && count($blogs_list)>0){ ?>
				<?php foreach($blogs_list as $list){ ?>
                <tr>
                  <td><?php echo htmlentities($list['title']); ?></td>
                  <td><?php echo htmlentities($list['description']); ?></td>
                  <td><?php echo htmlentities($list['name']); ?></td>
                  <td><?php echo htmlentities($list['date']); ?></td>
                  <td><img width="50px" height="50px" src="<?php echo base_url('assets/blogs/'.$list['image']); ?>">
				  <td><?php echo date("d-m-Y", strtotime($list['create_at']));?></td>
				<td><?php if($list['status']==1){ echo "Active"; }else{ echo "deactive";} ?></td>
                  <td>
					<a href="<?php echo base_url('blogs/edit/'.base64_encode($list['b_id'])); ?>"><i class="fa fa-edit"></i></a>
										&nbsp;&nbsp;

					<a href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['b_id'])).'/'.base64_encode(htmlentities($list['status']));?>');adminstatus('<?php echo $list['status'];?>')" href="javascript:void(0)" data-toggle="modal" data-target="#myModal"><i class="fa fa-check-square-o"></i></a>
										&nbsp;&nbsp;

					<a href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode($list['b_id']) ?>');admindedeletemsg();" data-toggle="modal" data-target="#myModal" title="Delete"><i class="fa fa-trash-o"></i></a>
				  
				  </td>
                </tr>
                
                
                
				<?php } ?>
				<?php } ?>
				</tbody>
				<tfoot>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Name</th>
                  <th>Date</th>
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
	$(".blogs").attr("href","<?php echo base_url('event/status'); ?>"+"/"+id);
}

function admindedelete(id){
	$(".blogs").attr("href","<?php echo base_url('event/delete'); ?>"+"/"+id);
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
