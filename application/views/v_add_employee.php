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
								<form action="<?php echo site_url("Management/employee_save");?>" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-3">
										<div class="form-group">
											<img src="<?php echo base_url("pic/default-profile.jpg");?>" class="center" height="200">
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
												<!--<select class="form-control">
													<option>1</option>
													<option>2</option>
													<option>3</option>
													<option>4</option>
												</select>-->
											
									<?php	echo form_dropdown('prefix', $opt_prefix, 1, "class='form-control'");?>
											</div>
											<label class="col-sm-12 col-lg-2">ชื่อจริง : </label>
											<div class="col-sm-12 col-lg-2">
												<input type="text" name="first_name" class="form-control" validate id="first_name">
											</div>
											<label class="col-sm-12 col-lg-2">นามสกุล : </label>
											<div class="col-sm-12 col-lg-2">
												<input type="text" name="last_name" class="form-control" id="last_name">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-12 col-lg-2">เพศ : </label>
											<div class="col-sm-12 col-lg-2">
									<?php	echo form_dropdown('gender', $opt_gender, 1, "class='form-control'");?>
											</div>
											<label class="col-sm-12 col-lg-2">อีเมล : </label>
											<div class="col-sm-12 col-lg-2">
												<input type="text" name="email" class="form-control" id="email">
											</div>
											<label class="col-sm-12 col-lg-2">เบอร์โทร : </label>
											<div class="col-sm-12 col-lg-2">
												<input type="text" name="telephone" class="form-control" id="telephone">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-12 col-lg-2">username : </label>
											<div class="col-sm-12 col-lg-2">
												<input type="text" name="username" class="form-control" id="username">
											</div>
											<label class="col-sm-12 col-lg-2">password : </label>
											<div class="col-sm-12 col-lg-2">
												<input type="password" name="password" class="form-control" id="password">
											</div>
											<label class="col-sm-12 col-lg-2">ยืนยัน password : </label>
											<div class="col-sm-12 col-lg-2">
												<input type="password" name="cf_passwoerd" class="form-control" id="cf_passwoerd">
											</div>
										</div>
										<div class="form-group row">
											<input type="submit" value="บันทึก" class="btn btn-success" style="text-align: right;" onclick="return validate_form()">
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
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		function validate_form(){
			// check validate
			if($("#first_name").val() == ""){
				Swal.fire({
				  icon: "error",
				  title: "การบันทึกข้อมูลผิดพลาด",
				  text: "กรุณากรอกชื่อจริง",
				  didClose: () => {
					$("#first_name").focus();
				  }
				});
				
				return false;
			}
			if($("#last_name").val() == ""){
				// alert("กรุณากรอกนามสกุล");
				// $("#last_name").focus();
				Swal.fire({
				  icon: "error",
				  title: "การบันทึกข้อมูลผิดพลาด",
				  text: "กรุณากรอกนามสกุล",
				  didClose: () => {
					$("#last_name").focus();
				  }
				});
				return false;
			}
			if($("#email").val() == ""){
				// alert("กรุณากรอกอีเมล");
				// $("#email").focus();
				Swal.fire({
				  icon: "error",
				  title: "การบันทึกข้อมูลผิดพลาด",
				  text: "กรุณากรอกอีเมล",
				  didClose: () => {
					$("#email").focus();
				  }
				});
				return false;
			}
			if($("#telephone").val() == ""){
				// alert("กรุณากรอกอกเบอร์โทร");
				// $("#telephone").focus();
				Swal.fire({
				  icon: "error",
				  title: "การบันทึกข้อมูลผิดพลาด",
				  text: "กรุณากรอกอกเบอร์โทร",
				  didClose: () => {
					$("#telephone").focus();
				  }
				});
				return false;
			}
			if($("#username").val() == ""){
				// alert("กรุณากรอก username");
				// $("#username").focus();
				Swal.fire({
				  icon: "error",
				  title: "การบันทึกข้อมูลผิดพลาด",
				  text: "กรุณากรอก username",
				  didClose: () => {
					$("#username").focus();
				  }
				});
				return false;
			}
			if($("#password").val() == ""){
				// alert("กรุณากรอกอก password");
				// $("#password").focus();
				Swal.fire({
				  icon: "error",
				  title: "การบันทึกข้อมูลผิดพลาด",
				  text: "กรุณากรอกอก password",
				  didClose: () => {
					$("#password").focus();
				  }
				});
				return false;
			}
			if($("#cf_passwoerd").val() == ""){
				// alert("รหัสผ่านไม่ตรง");
				// $("#cf_passwoerd").focus();
				Swal.fire({
				  icon: "error",
				  title: "การบันทึกข้อมูลผิดพลาด",
				  text: "รหัสผ่านไม่ตรง",
				  didClose: () => {
					$("#cf_passwoerd").focus();
				  }
				});
				return false;
			}
		}
		$(document).on("blur", "#cf_passwoerd", function () {
			if($("#cf_passwoerd").val() != $("#password").val() && $("#cf_passwoerd").val() != ""){
				// alert("รหัสผ่านไม่ตรง");
				// $("#cf_passwoerd").val("");
				// $("#cf_passwoerd").focus();
				
				Swal.fire({
				  icon: "error",
				  title: "การบันทึกข้อมูลผิดพลาด",
				  text: "รหัสผ่านไม่ตรง",
				  didClose: () => {
					$("#cf_passwoerd").val("");
					$("#cf_passwoerd").focus();
				  }
				});
			}
		});
		
		$(document).on("blur", "#username", function () {
			// check username
			 $.post("<?php echo site_url("Management/check_username");?>",
			{
				username: $("#username").val()
			},
			function(data, status){
				// alert("Data: " + data + "\nStatus: " + status);
				if(data > 0){
					Swal.fire({
					  icon: "error",
					  title: "username ไม่สามารถใช้งานได้",
					  text: "มีพนักงานใช้ username ดังกล่าวแล้ว",
					  didClose: () => {
						$("#username").val("");
						$("#username").focus();
					  }
					});
				}else{
					Swal.fire({
					  icon: "success",
					  title: "username สามารถใช้งานได้",
					});
				}
			});
		});
	</script>
</body>

</html>