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
		<div id="content-wrapper">

			<!-- Main Content -->
			<div id="content">

				<!-- Begin Page Content -->
				<div class="container-fluid">
					<div class="card shadow mb-4">
								<!-- Card Header - Accordion -->
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">PROFILE ข้อมูลส่วนตัว</h6>
						</div>
						<!-- Card Content - Collapse -->
						<div>
							<div class="card-body">
								<form action="<?php echo site_url("Management/employee_update");?>" method="post" enctype="multipart/form-data">
								<input type="hidden" value="<?php echo $emp->emp_id;?>" name="id">
								<div class="row">
									<div class="col-lg-3">
										<div class="form-group">
											<img src="<?php echo base_url("pic/".$emp->emp_pic);?>" class="center" height="200">
										</div>
										<input type="file" name="filename" accept="image/*">
										&nbsp;
									</div>
									<br>
									<br>
									<br>
									<div class="col-lg-9">
										<div class="form-group row">
											<label class="col-sm-12 col-lg-2">คำนำหน้า : </label>
											<div class="col-sm-12 col-lg-2">
											
									<?php	echo form_dropdown('prefix', $opt_prefix, $emp->emp_prefix_id, "class='form-control'");?>
											</div>
											<label class="col-sm-12 col-lg-2">ชื่อจริง : </label>
											<div class="col-sm-12 col-lg-2">
												<input type="text" name="first_name" class="form-control" value="<?php echo $emp->emp_first_name;?>">
											</div>
											<label class="col-sm-12 col-lg-2">นามสกุล : </label>
											<div class="col-sm-12 col-lg-2">
												<input type="text" name="last_name" class="form-control" value="<?php echo $emp->emp_last_name;?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-12 col-lg-2">เพศ : </label>
											<div class="col-sm-12 col-lg-2">
									<?php	echo form_dropdown('gender', $opt_gender, $emp->emp_gender_id, "class='form-control'");?>
											</div>
											<label class="col-sm-12 col-lg-2">อีเมล : </label>
											<div class="col-sm-12 col-lg-2">
												<input type="text" name="email" class="form-control" value="<?php echo $emp->emp_email;?>">
											</div>
											<label class="col-sm-12 col-lg-2">เบอร์โทร : </label>
											<div class="col-sm-12 col-lg-2">
												<input type="text" name="telephone" class="form-control" value="<?php echo $emp->emp_telephone;?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-12 col-lg-2">username : </label>
											<div class="col-sm-12 col-lg-2">
												<input type="text" name="username" class="form-control" value="<?php echo $emp->emp_username;?>" readonly>
											</div>
											<label class="col-sm-12 col-lg-2">password : </label>
											<div class="col-sm-12 col-lg-2">
												<input type="password" name="password" class="form-control" value="--password--">
											</div>
											<label class="col-sm-12 col-lg-2">ยืนยัน password : </label>
											<div class="col-sm-12 col-lg-2">
												<input type="password" name="cf_passwoerd" class="form-control" value="--password--">
											</div>
										</div>
										<div class="form-group row">
											<input type="reset" value="คืนค่า" class="btn btn-secondary">
											<input type="submit" value="อัปเดท" class="btn btn-warning">
										</div>
									</div>
								</div>
								</form>
							</div>
						</div>
					</div>
					
					<!-- Page Heading -->
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
</body>

</html>