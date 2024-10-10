<?php
    session_start();
    $dba = $_SESSION['db'];
    $conn = mysqli_connect("localhost","", "","$dba");
    $query = "SELECT * FROM `live5` ORDER BY sn";
    $dat = mysqli_query($conn,$query);
	
?>
<html>
	<head>
		<title>Live Table Edit - 1</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script type="text/javascript" src="dist/jquery.tabledit.js"></script>
        <script type="text/javascript" src="custom_table_edit.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="apple-touch-icon" sizes="180x180" href="../logo/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="../logo/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="../logo/favicon-16x16.png">
		<link rel="manifest" href="../logo/site.webmanifest">
		<link rel="mask-icon" href="../logo/safari-pinned-tab.svg" color="#5bbad5">
		<link rel="shortcut icon" href="../logo/favicon.ico">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="msapplication-config" content="../logo/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js"></script>
		<style>
			.logoooo{
				text-align: center;
				height: 100%;
				padding: 0px;
				margin: 0px;
			}
			.btn-primary {
				margin-bottom: 12px;
			}
			.btn-primary a{
				color: white;
				text-decoration: none;
			}
		</style>
	</head>
	<body>
	<!-- <div class="modal fade" id="Student_AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Please enter the name of the team</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-message">

                    </div>
                </div>
                <div class="col-md-4">
                    <label for="">Team No.</label>
                    <input type="text" class="form-control sn">
                </div>
                <div class="col-md-8">
                    <label for="">Team Name</label>
                    <input type="text" class="form-control yoyoyo">
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary student_add_ajax">Save</button>
      </div>
    </div>
  </div>
</div> -->

		<div class="container">
			<h3 align="center"><b>Live Table Backend</b></h3>
			
			<br />
			<button type="button" class="btn btn-primary"><a href="../up-5">
                                Add Team
								</a></button>
							
			<div class="panel panel-default">
				
				<div class="panel-heading">Live Track of</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="data_table" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>id</th>
									<th>Sn</th>
									<th>Team Name</th>
									<th>Finish</th>
									<th>Status</th>
									<th>Logo</th>
									<th>Delete</th>
								</tr>
							</thead>
                            <?php

                                while($row = mysqli_fetch_assoc($dat)){

                            ?>
                            <tbody><tr>
                            
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['sn']?></td>
                                <td><?php echo $row['teamname']?></td>
                                <td><?php echo $row['finishes']?></td>
                                <td><?php echo $row['status']?></td>
								<td class="logoooo"><img src="<?php echo $row['logo']?>" alt="" width=39px></td>
								<td> <button type="button" name="button" class="delete" data-id="<?php echo $row['id']?>">Delete</button> </td>
                            
                            </tr></tbody>
                            <?php
                                }
                            ?>
						</table>
					</div>
				</div>
				
			</div>
			<a class="btn btn-success btn-sm rounded-0" href="./export.php">Export Data</a>
			<!-- <form action="csv.php" method="post">
					<input type="Submit" name="export_csv" class="btn btn-success" value="CSV Please" />
				</form> -->
		</div>
		<br />
		<br />
		<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->
	<!-- <script>
		$(document).ready(function() {
			$('.student_add_ajax').click(function(e){
				e.preventDefault();
				var yoyoyo = $('.yoyoyo').val();
				var sn = $('.sn').val();
				// console.log(yoyoyo);
				if (yoyoyo !=''){
				$.ajax({
					type: "POST",
					url: "server.php",
					data: {
						'checking_add':true,
						'teamname': yoyoyo,
						'sn': sn,
					},
					success: function (response) {
						$('#Student_AddModal').modal('hide');
						$('.studentdata').html("");
						$('.yoyoyo').val("");
						$('.sn').val("");
						window.location.reload();
					}
				});
				}else{
					$('.error-message').append('\
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                            <strong>Hey!</strong> Please enter the Team Name.\
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                                <span aria-hidden="true">&times;</span>\
                            </button>\
                        </div>\
                    ');
				}
			});
		});
	</script> -->
	<script type="text/javascript">
		$(document).ready(function() {
			$('.delete').click(function(){
				var delete_id = $(this).data('id');
				$.ajax({
					url:"delete.php",
					type:'POST',
					data:{
						delete_id:delete_id
					},
					datatype:'html',
					success:function(response){
						window.location.reload();
					}
				});
			});
		});
	</script>
</body>
</html>