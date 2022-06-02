<?php
	session_start();
	if(isset($_SESSION['username'])){
		$name = $_SESSION['username'];
		// get ID admin
		require('libs/db.php');
		$sqlAd = "SELECT * from user WHERE username = '$name' AND userType=99";
		$resultAd = mysqli_query($link, $sqlAd);
		if(mysqli_num_rows($resultAd) > 0){
			$rowAd = mysqli_fetch_assoc($resultAd);
		}
		else {
			header("Location:index.php");
		}
		
?>

	<nav class="navbar" role="navigation">
		<div class="navbar-header" style="flex: 1">
			<a class="navbar-brand" href="index.php">
				<img src="../images/logo.png" alt="logo" class="logo"/>
			</a>
		</div>
		<div style="flex: 1">
			<form class="navbar-search">
				<input type="text" placeholder="Tìm kiếm" class="form-control border-0">
			</form>
		</div>
		<div style="flex: 1; display: flex; justify-content: flex-end" class="h-100">
			<ul class="nav navbar-nav h-100">
				<li class="divider-vertical"></li>
				<li class="dropdown user-dropdown h-100">
					<a href="#" class="text-white dropdown-toggle d-block h-100" data-toggle="dropdown">
						<i class="fa fa-user mr-1"></i> <?php echo $_SESSION['username'];?>
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo "editUser.php?id=". $rowAd["ID"]?>"> <i class="fa fa-user"></i> Profile</a>
						</li>
						<li>
							<form method="post" action="">
								<a> <button id="logout" name="log_out" class="cursor-pointer" style="cursor: pointer;"> 
									<i class="fa fa-power-off mr-2"></i>Đăng xuất</button> 
								</a>
							</form>
						</li>
					</ul>
				</li>
			</ul>
		</div>
			<style>
				#logout{
					width: 100%; 
					border: none; 
					color: white; 
					text-align: left; 
					padding-left: 20px;
				}
			</style>
			<?php
				if(isset($_POST["log_out"])){
					unset($_SESSION['username']);
					session_unset(); 
					session_destroy();
					header('Location:../index.php');
				}
			?>
		</div>
	</nav>
	<ul id="active" class="side-nav">
				<li>
					<a href="index.php">
						<i class="fa fa-bullseye"></i> Dashboard</a>
				</li>
				<li>
					<a href="addFilm.php">
					<i class="fa fa-plus"></i></i> Thêm phim</a>
				</li>
				<li>
					<a href="addEpisode.php">
					<i class="fa fa-plus"></i></i> Thêm tập</a>
				</li>
				<li>
					<a href="manageFilm.php">
					<i class="fa fa-tasks"></i> Quản lý phim</a>
				</li>
				<li>
					<a href="addUser.php">
						<i class="fa fa-user-plus"></i> Thêm người dùng</a>
				</li>
				<li>
					<a href="manageUser.php">
						<i class="fa fa-edit"></i>Quản lý người dùng</a>
				</li>
			</ul>
	</div>
<div>
<?php
	} else {
		header('Location:../index.php');
	}
?>
