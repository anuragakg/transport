<?php

$uri=$_SERVER['REQUEST_URI'];
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$parts = parse_url($url);
$path=$parts['path'];
?>
<nav class="navbar-default navbar-static-side w-bg" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav metismenu" id="side-menu">
			<li class="nav-header">
				<!--<img src="../assets/img/small_logo.jpg">-->
				<div class="dropdown">
					<b class="logged-in-user1 user-info">
						<span id="role_name_sidebar"></span>
						<span id="state_sidebar"></span>
						<span id="district_sidebar"></span>
						<span id="block_sidebar"></span>
					</b>
				</div>
			</li>

			<li> <a href="../auth/dashboard.php"><img src="../assets/img/menuicon/dashboard.png"> <span class="nav-label">Dashboard</span></a></li>
			

			
			<?php 
			if(strpos($path, 'role-management')!==false)
			{
				$role_management='active';
				$role_management_collapse='in';
			}
			?>
			<li class="hidden role <?php echo isset($role_management)?$role_management:'';?>"> <a href="#"><img src="../assets/img/menuicon/user.png"> <span class="nav-label">Role Management</span><span class="fa arrow fa-2"></span></a>
				<ul class="nav nav-second-level collapse">
					<li class="hidden role_view"><a href="../role-management/role-listing.php">View Roles</a></li>
					<li class="hidden role_add"><a href="../role-management/add_role.php">Create Roles</a></li>
					
				</ul>
			</li>
			<?php 
			if(strpos($path, 'permission-management')!==false)
			{
				$permission_mapping='active';
				$permission_mapping_collapse='in';
			}
			?>
			
			

			<li class="hidden user_management"> <a href="#"><img src="../assets/img/menuicon/user_management.png"> <span class="nav-label">User Management</span><span class="fa arrow fa-2"></span></a>
		        <ul class="nav nav-second-level collapse">
		          <li class="hidden user_management_view"><a href="../user/user-listing.php">User Listing</a></li>
		        </ul>
		      </li>


		    
			<?php 
			if(strpos($path, 'masters')!==false)
			{
				$masters='active';
				$masters_collapse='in';
			}
			?>
			<!--<li class="hidden master_management <?php // echo isset($masters)?$masters:'';?>"> <a href="user-listing.html"><img src="../assets/img/menuicon/key.png"> <span class="nav-label">Master Management</span><span class="fa arrow fa-2"></span></a>
				<ul class="nav nav-second-level collapse">
					
					
					<li> <a href="user-listing.html"><span class="nav-label">Area Master</span><span class="fa arrow fa-2"></span></a>
						<ul class="nav nav-third-level collapse">
							<li><a href="../masters/state-master.php">State</a></li>
							<li><a href="../masters/district-master.php">District</a></li>
							<li><a href="../masters/block-master.php">Block/Tehsil</a></li>
							<li><a href="../masters/village-master.php">Village</a></li>
						</ul>
					</li>
					
				</ul>
			</li>-->
    

    		

    <li> <a href="#" onclick="TRIFED.logout();"><img src="../assets/img/menuicon/logout.png"> <span class="nav-label">Log-out</span></a></li>
    </ul>
  </div>
</nav>
