<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
	<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
		<a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
			<i class="bx bx-menu bx-sm"></i>
		</a>
	</div>

	<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

		<ul class="navbar-nav flex-row align-items-center ms-auto">
			<!-- User -->
			<li class="nav-item">
				<span>{{ auth()->user()->name }}</span>
			</li>
			<li class="nav-item navbar-d ropdown dropdown-user dropdown">
				<a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
					<div class="avatar">
						<img src="{{ asset( auth()->user()->photo_url) }}" alt class="w-px-40 h-px-40 object-fit-cover rounded-circle" />
					</div>
				</a>
				<ul class="dropdown-menu dropdown-menu-end">
					<li>
						<a class="dropdown-item" href="#">
							<div class="d-flex">
								<div class="flex-shrink-0 me-3">
									<div class="avatar">
										<img src="{{ asset( auth()->user()->photo_url) }}" alt
											class="w-px-40 h-px-40 object-fit-cover rounded-circle" />
									</div>
								</div>
								<div class="d-flex flex-grow-1 align-items-center">
									<span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
									<small class="text-muted"></small>
								</div>
							</div>
						</a>
					</li>
					<li>
						<div class="dropdown-divider"></div>
					</li>
					<li>
						<a class="dropdown-item" href="#">
							<i class="bx bx-user me-2"></i>
							<span class="align-middle">Profil Saya</span>
						</a>
					</li>
					<li>
						<a class="dropdown-item" href="#">
							<i class="bx bx-cog me-2"></i>
							<span class="align-middle">Pengaturan</span>
						</a>
					</li>
					<li>
						<div class="dropdown-divider"></div>
					</li>
					<li>
						<form action="/logout" method="POST">
							@csrf
							<button class="dropdown-item" type="submit">
								<i class="bx bx-power-off me-2"></i>
								<span class="align-middle">Log Out</span>
							</button>
						</form>
					</li>
				</ul>
			</li>
			<!--/ User -->
		</ul>
	</div>
</nav>