<!--Sidebar-->
<nav class="navbar-default navbar-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav" id="main-menu">
			<li class="text-center">
				<img src="<?php echo base_url();?>assets/img/find_user.png" class="user-image img-responsive">
			</li>
			<!-- <li>
				<a href="../Dashboard"><i class="fa fa-dashboard fa-3x"></i>
				Dashboard</a>
			</li>
			<li>
				<a href="../Anggota"><i class="fa fa-desktop fa-3x"></i>
				Anggota</a>
			</li>
			<li>
				<a href="../Tabarok"><i class="fa fa-table fa-3x"></i>
				Tabarok</a>
			</li>
			<li>
				<a href="../Tarekah"><i class="fa fa-bar-chart-o fa-3x"></i>
				Tarekah</a>
			</li>
			<li>
				<a href="#"><i class="fa fa-sitemap fa-3x"></i>Multi-Level Dropdown<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="#">Secon level link</a>
					</li>
					<li>
						<a href="#">Secon level link</a>
					</li>
				</ul>
			</li> -->
      <li>
				<a href="<?php echo base_url();?>dashboard"><i class="fa fa-exchange fa-2x"></i>
					Dashboard
				</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>anggota"><i class="fa fa-user fa-3x"></i>
				Anggota</a>
			</li>

            <li>
                <a  href="<?php echo base_url();?>Anggota_rekening"><i class="fa fa-credit-card fa-2x"></i>Rekening</a>
            </li>
			<?php
				if ($_SESSION['role'] == 1){
					//khusus role superadmin
			?>

			<li>
				<a href="<?php echo base_url();?>administrator"><i class="fa fa-desktop fa-2x"></i>
					Admin
				</a>
			</li>
			<?php
		}// endhere
			?>
			<li>
				<a href="<?php echo base_url();?>setting"><i class="fa fa-gear fa-3x"></i>
					Setting
				</a>
			</li>
		</ul>
	</div>
</nav>
<!--End of Sidebar-->
