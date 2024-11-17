<div class="default-sidebar">
	<!-- Begin Side Navbar -->
	<nav class="side-navbar box-scroll sidebar-scroll">
		<!-- Begin Main Navigation -->
		<ul class="list-unstyled">
			<li data-primary-tab="dashboard"><a href="<?= base_url('admin/dashboard') ?>"><i class="la la-dashboard"></i><span>Bảng điều khiển</span></a></li>
			<!-- <li data-primary-tab="profile"><a href="<?= base_url('admin/profile') ?>"><i class="la la-user"></i><span>Hồ sơ cá nhân</span></a></li> -->
		</ul>
		<ul class="list-unstyled">
			<li data-secondary-tab="treatment"><a href="<?= base_url('admin/treatment') ?>"><i class="la la-list"></i>Danh mục chuyên điều trị</a></li>
		</ul>
		<ul class="list-unstyled">
			<li data-primary-tab="doctor"><a href="#dropdown-doctor" aria-expanded="false" data-toggle="collapse"><i class="la la-medkit"></i><span>Đội ngũ bác sĩ</span></a>
				<ul id="dropdown-doctor" class="collapse list-unstyled pt-0">
					<li data-secondary-tab="doctor_list"><a href="<?= base_url('admin/doctor') ?>">Danh sách đội ngũ bác sĩ</a></li>
					<li data-secondary-tab="doctor_create"><a href="<?= base_url('admin/doctor/new') ?>">Thêm đội ngũ bác sĩ</a></li>
				</ul>
			</li>
		</ul>

		<ul class="list-unstyled">
			<li data-primary-tab="news"><a href="#dropdown-news" aria-expanded="false" data-toggle="collapse"><i class="la la-file-text"></i><span>Bài viết</span></a>
				<ul id="dropdown-news" class="collapse list-unstyled pt-0">
					<li data-secondary-tab="category_list"><a href="<?= base_url('admin/news/categories') ?>">Danh mục bài viết</a></li>
					<li data-secondary-tab="category_create"><a href="<?= base_url('admin/news/category/new') ?>">Thêm danh mục bài viết</a></li>
					<li data-secondary-tab="news_list"><a href="<?= base_url('admin/news') ?>">Danh sách bài viết</a></li>
					<li data-secondary-tab="news_create"><a href="<?= base_url('admin/news/new') ?>">Thêm bài viết mới</a></li>
				</ul>
			</li>
		</ul>
		<span class="heading">Cài đặt</span>

		<ul class="list-unstyled">
			<li data-primary-tab="slideshow"><a href="#dropdown-slideshow" aria-expanded="false" data-toggle="collapse"><i class="la la-clone"></i><span>Slideshow</span></a>
				<ul id="dropdown-slideshow" class="collapse list-unstyled pt-0">
					<li data-secondary-tab="slideshow_list"><a href="<?= base_url('admin/slideshow') ?>">Danh sách Slideshow</a></li>
					<li data-secondary-tab="slideshow_create"><a href="<?= base_url('admin/slideshow/new') ?>">Thêm Slideshow mới</a></li>
				</ul>
			</li>
			<!-- <li data-secondary-tab="security_list"><a href="<?= base_url('admin/security') ?>"><i class="la la-newspaper-o" aria-hidden="true"></i>Chính sách bảo mật</a></li> -->
			<!-- <li data-primary-tab="menu"><a href="#dropdown-menu" aria-expanded="false" data-toggle="collapse"><i class="la la-bars"></i><span>Menu</span></a>
				<ul id="dropdown-menu" class="collapse list-unstyled pt-0">
					
				</ul>
			</li> -->
			<li data-primary-tab="menu_header_list"><a href="<?= base_url('admin/menu/header') ?>"><i class="la la-bars"></i>Menu Chính</a></li>
			<li data-primary-tab="filemanager"><a href="<?= base_url('filemanager/dialog.php?type=0') ?>"><i class="la la-folder-open-o"></i><span>File managers</span></a></li>
			<!-- Website -->
			<li data-primary-tab="config"><a href="#dropdown-website" aria-expanded="false" data-toggle="collapse"><i class="la la-at"></i><span>Website</span></a>
				<ul id="dropdown-website" class="collapse list-unstyled pt-0">
					<li data-secondary-tab="config_contact"><a href="<?= base_url('admin/config/contact') ?>">Thông tin</a></li>
					<li data-secondary-tab="config_logo"><a href="<?= base_url('admin/config/logo') ?>">Logo</a></li>
					<li data-secondary-tab="config_seo"><a href="<?= base_url('admin/config/seo') ?>">SEO</a></li>
					<li data-secondary-tab="config_view_gui"><a href="<?= base_url() ?>">Xem giao diện</a></li>
				</ul>
			</li>
			<!-- Website -->
		</ul>
		<!-- End Main Navigation -->
	</nav>
	<!-- End Side Navbar -->
</div>
<!-- End Left Sidebar -->