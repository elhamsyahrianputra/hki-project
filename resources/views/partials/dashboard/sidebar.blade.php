<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
	<div class="app-brand demo">
		<a href="{{ route('home') }}" class="app-brand-link">
			<span class="app-brand-logo demo">
				<img src="{{ asset('assets/img/logo/logo-hki-uns.png') }}" alt="HKI UNS Logo" style="height: 45px">
			</span>
		</a>

		<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
			<i class="bx bx-chevron-left bx-sm align-middle"></i>
		</a>
	</div>

	<div class="menu-inner-shadow"></div>

	<ul class="menu-inner py-1">
		<!-- Dashboard -->
		<li class="menu-item {{ Request::is('dashboard') ? 'active open' : '' }}">
			<a href="{{ route('dashboard') }}" class="menu-link">
				<i class="menu-icon tf-icons bx bxs-dashboard"></i>
				<div data-i18n="Analytics">Dashboard</div>
			</a>
		</li>

		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">Permohonan</span>
		</li>

		<!-- Application -->

		<li class="menu-item {{ Request::is('*brands') ? 'active open' : '' }}">
		@role('admin')
			<a href="{{ route('admin.brands.index') }}" class="menu-link">
				<i class="menu-icon tf-icons bx bx-list-ul"></i>
				<div data-i18n="Analytics">Daftar Permohonan</div>
			</a>
			@endrole
			@role('applicant')
			<a href="{{ route('applicant.brands.index') }}" class="menu-link">
				<i class="menu-icon tf-icons bx bx-list-ul"></i>
				<div data-i18n="Analytics">Daftar Permohonan</div>
			</a>
			@endrole 
		</li>
			
		@role('applicant')
		<li class="menu-item  {{ Request::routeIs('applicant.brands.create') ? 'active open' : '' }}">
			<a href="{{ route('applicant.brands.create') }}" class="menu-link">
				<i class="menu-icon tf-icons bx bx-plus"></i>
				<div data-i18n="Layouts">Ajukan Permohonan</div>
			</a>
		</li>
		@endrole 

		@role('admin')
		<!-- Admin Management -->
		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">Manajemen</span>
		</li>

		<li class="menu-item {{ Request::is('admin/users*') ? 'active open' : '' }}">
			<a href="javascript:void(0);" class="menu-link menu-toggle">
				<i class="menu-icon tf-icons bx bxs-user"></i>
				<div data-i18n="Account Settings">User</div>
			</a>
			<ul class="menu-sub">
				<li class="menu-item {{ Request::routeIs('admin.users.index') ? 'active' : '' }}">
					<a href="{{ route('admin.users.index') }}" class="menu-link">
						<div data-i18n="Analytics">Daftar User</div>
					</a>
				</li>
				<li class="menu-item {{ Request::routeIs('admin.users.create') ? 'active' : '' }}">
					<a href="{{ route('admin.users.create') }}" class="menu-link">
						<div data-i18n="Analytics">Tambah User</div>
					</a>
				</li>
			</ul>
		</li>

		<li class="menu-item {{ Request::is('admin/announcements*') ? 'active open' : '' }}">
			<a href="javascript:void(0);" class="menu-link menu-toggle">
				<i class="menu-icon tf-icons fas fa-bullhorn"></i>
				<div data-i18n="Account Settings">Pengumuman</div>
			</a>
			<ul class="menu-sub">
				<li class="menu-item {{ Request::routeIs('admin.announcements.index') ? 'active' : '' }}">
					<a href="{{ route('admin.announcements.index') }}" class="menu-link">
						<div data-i18n="Analytics">Daftar Pengumuman</div>
					</a>
				</li>
				<li class="menu-item {{ Request::routeIs('admin.announcements.create') ? 'active' : '' }}">
					<a href="{{ route('admin.announcements.create') }}" class="menu-link">
						<div data-i18n="Analytics">Tambah Pengumuman</div>
					</a>
				</li>
			</ul>
		</li>
		@endrole

		<!-- Settings -->
		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">Pengaturan</span>
		</li>

		<li class="menu-item {{ Request::routeIs('settings.profile') ? 'active open' : '' }}">
			<a href="{{ route('settings.profile') }}" class="menu-link">
				<i class="menu-icon tf-icons bx bxs-user"></i>
				<div data-i18n="Analytics">Profil</div>
			</a>
		</li>

	</ul>
</aside>