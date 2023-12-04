<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Employee List</title>

	<!-- Custom fonts for this template -->
	<link href="<?php echo base_url("/assets/vendor/fontawesome-free/css/all.min.css");?>" rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?php echo base_url("/assets/css/sb-admin-2.min.css");?>" rel="stylesheet">

	<!-- Custom styles for this page -->
	<link  href="<?php echo base_url("/assets/vendor/datatables/dataTables.bootstrap4.min.css");?>" rel="stylesheet">
	
	<link rel="stylesheet" href="<?php echo base_url("assets/datatables-responsive/css/responsive.bootstrap4.min.css");?>">
	
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3529023621603295"
     crossorigin="anonymous"></script>

</head>

<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Begin Page Content -->
				<div class="container-fluid">
					<div class="card shadow mb-4">
						<!-- Card Header - Accordion -->
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">EMPLOYEE LIST</h6>
						</div>
						<!-- Card Content - Collapse -->
						<div class="collapse show">
							<div class="card-body">

					<p class="mb-4"><a class="btn btn-primary" href="<?php echo site_url("Management/add_employee");?>">+ เพิมข้อมูล</a></p>
					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="example1" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>ลำดับ</th>
											<th>รูปภาพ</th>
											<th>ชื่อ - นามสกุล</th>
											<th>เพศ</th>
											<th>อีเมล</th>
											<th>เบอร์โทรศัพท์</th>
											<th>เพิ่มข้อมูล</th>
											<th>แก้ไขล่าสุด</th>
											<th>จัดการ</th>
										</tr>
									</thead>
									<tbody>
				<?php
			if($employee->num_rows() > 0){
				$i = 0;
				foreach($employee->result() as $row){
					echo "<tr>";
					echo "<td><center>".++$i."</center></td>";
					echo "<td><img src=".base_url("pic/".$row->emp_pic)." height=\"100\"></td>";
					echo "<td>".$row->prefix_name.$row->emp_first_name." ".$row->emp_last_name."</td>";
					echo "<td>".$row->gender_name."</td>";
					echo "<td>".$row->emp_email."</td>";
					echo "<td>".$row->emp_telephone."</td>";
					echo "<td>".$row->emp_create."</td>";
					echo "<td>".$row->emp_update."</td>";
					echo "<td><a href='".site_url("Management/edit_employee/".$row->emp_id)."' class='btn btn-warning btn-circle'><i class='fas fa-pen'></i></a><a class='btn btn-danger btn-circle delete-data' data-id='".$row->emp_id."'><i class='fas fa-trash' data-toggle='modal' data-target='#editmodal'></i></a></td>";
					echo "</tr>";
				}
			}else{
				echo "<td colspan='9'><center>ไม่พบข้อมูล</center></td>";
			}
				?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>			
								
							</div>
						</div>
					</div>
					<!-- Page Heading -->
				</div>
				<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">ยืนยันการออกจากระบบ?</h5>
								<button class="close" type="button" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">ต้องการลบข้อมูลใช่หรือไม่</div>
							<div class="modal-footer">
								<form action="<?php echo site_url("Management/delete_employee");?>" method="post">
								<button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
								<!--<a class="btn btn-primary" href="<?php echo site_url("Management/delete_employee");?>">ยืนยัน</a>-->
								<input type="hidden" name="delete_id" id="delete_id" value="">
								<input type="submit" value="ยืนยัน" class="btn btn-primary">
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; Naitonkla</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<?php include "default_script.php"; ?>
	
	<script>
		$(function () {
			$("#example1").DataTable({
				"autoWidth": false,
				stateSave: true,
				"responsive": true
			});
		});
		$(document).on("click", ".delete-data", function () {
			$("#delete_id").val($(this).data('id'));
		});
	</script>

</body>

</html>