<!--Begin Header -->
<header class="header">
	<nav class="navbar fixed-top">
		<!-- Begin Search Box-->
		<div class="search-box">
			<button class="dismiss"><i class="ion-close-round"></i></button>
			<form id="searchForm" action="#" role="search">
				<input type="search" placeholder="Search something ..." class="form-control">
			</form>
		</div>
		<!-- End Search Box-->
		<!-- Begin Topbar -->
		<div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
			<!-- Begin Logo -->
			<div class="navbar-header">
				<a href="<?= base_url('admin') ?>" class="navbar-brand">
					<div class="brand-image brand-big">
						<img src="<?= base_url('public/backend/assets/img/logo-pdh.png') ?>" alt="logo" class="logo-big">
					</div>
					<div class="brand-image brand-small">
						<img src="<?= base_url('public/backend/assets/img/logo-pdh.png') ?>" alt="logo" class="logo-small">
					</div>
				</a>
				<!-- Toggle Button -->
				<a id="toggle-btn" href="#" class="menu-btn active">
					<span></span>
					<span></span>
					<span></span>
				</a>
				<!-- End Toggle -->
			</div>
			<!-- End Logo -->
			<!-- Begin Navbar Menu -->
			<ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
				<!-- User -->
				<li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><img src="<?= base_url($this->session->userdata('avatar')) ?>" alt="..." class="avatar rounded-circle"></a>
					<ul aria-labelledby="user" class="user-size dropdown-menu">
						<li><a rel="nofollow" href="<?= base_url('admin/logout') ?>" class="dropdown-item logout text-center"><i class="ti-power-off"></i></a></li>
					</ul>
				</li>
				<!-- End User -->
				<!-- Begin Quick Actions -->

				<!-- End Quick Actions -->
			</ul>
			<!-- End Navbar Menu -->
		</div>
		<!-- End Topbar -->
	</nav>
</header>
<!-- End Header