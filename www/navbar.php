<?php
session_start();
if (!isset($_SESSION['userLogin'])) {
?>
	<script>
		location.href = "/login/login.php"
	</script>
<?php
} else {
?>
	<?php
	$tick = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="green"><path d="M17.28 9.28a.75.75 0 00-1.06-1.06l-5.97 5.97-2.47-2.47a.75.75 0 00-1.06 1.06l3 3a.75.75 0 001.06 0l6.5-6.5z"></path><path fill-rule="evenodd" d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zM2.5 12a9.5 9.5 0 1119 0 9.5 9.5 0 01-19 0z"></path></svg>';
	$bin = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="red"><path fill-rule="evenodd" d="M16 1.75V3h5.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75zm-6.5 0a.25.25 0 01.25-.25h4.5a.25.25 0 01.25.25V3h-5V1.75z"></path><path d="M4.997 6.178a.75.75 0 10-1.493.144L4.916 20.92a1.75 1.75 0 001.742 1.58h10.684a1.75 1.75 0 001.742-1.581l1.413-14.597a.75.75 0 00-1.494-.144l-1.412 14.596a.25.25 0 01-.249.226H6.658a.25.25 0 01-.249-.226L4.997 6.178z"></path><path d="M9.206 7.501a.75.75 0 01.793.705l.5 8.5A.75.75 0 119 16.794l-.5-8.5a.75.75 0 01.705-.793zm6.293.793A.75.75 0 1014 8.206l-.5 8.5a.75.75 0 001.498.088l.5-8.5z"></path></svg>';
	?>

	<head>
		<!-- Custom styles for this template -->
		<link href="../resources/navbarStyle/dashboard.css" rel="stylesheet">
		<link rel="shortcut icon" href="../media/logo.png" type="image/x-icon">
		<style>
			/* body{
      background-color: #e9eae1;
    } */
			body {
				font-size: 0.9rem !important;
			}
		</style>
	</head>


	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
		<div class="container-fluid">
			<a class="navbar-brand bg-dark border-0 fw-bold" href="#" tabindex="-1">Palasdeo Grampanchayat</a>
			<button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-bars"></i>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">

					<!-- Link -->
					<li class="nav-item my-0">
						<a class="nav-link" href="../1birth/add.php" id="birthAdd" tabindex="-1">Birth Certificate </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../2marriage/add.php" id="marriageAdd" tabindex="-1">Marriage Certificate</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../3death/add.php" id="deathAdd" tabindex="-1">Death Certificate</a>
					</li>
				</ul>
				<ul class="navbar-nav d-flex flex-row me-1">
					<li class="nav-item me-3 me-lg-0">
						<a class="nav-link" href="../logout.php" id="deathAdd" tabindex="-1">Log Out</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Navbar -->

	<div class="container-fluid shadow-5">
		<div class="row">
			<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="z-index: 0; padding-left :0; padding-right:0px">
				<div class="position-sticky pt-3">
					<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
						<span>Operations</span>
					</h6>
					<ul class="nav flex-column mb-2" style="height:91%">
						<li class="nav-item">
							<a class="nav-link" href="add.php" id="addDetails" tabindex="-1">
								Add Details
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="displayDetails.php" id="displayDetails" tabindex="-1">
								Edit Details
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="printCertificate.php" id="printCertificate" tabindex="-1">
								Print Certificate
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="searchDetails.php" id="searchDetails" tabindex="-1">
								Search Details
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="seeQr.php" id="seeQr" tabindex="-1">
								See QR
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="deleteDetails.php" id="deleteDetails" tabindex="-1">
								Delete Details
							</a>
						</li>
						<li class="nav-item mt-auto">
							<a class="nav-link" href="recoverDetails.php" id="recover" tabindex="-1">
								Recover Details
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>

	<script src="../resources/navbarStyle/dashboard.js"></script>
<?php
}
?>