<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Lotere Amnida</title>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet" />
	<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
	<script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.3.2/echarts.min.js"></script>
	<script src="https://use.fontawesome.com/6f05757a67.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand text-decoration-none" href="/">
					LOTERE AMNIDA
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-item">
						<a class="sidebar-link" href="/kandidat">
							<i class="align-middle" data-feather="users"></i>
							<span class="align-middle">Manage Candidate</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="/stats">
							<i class="align-middle" data-feather="bar-chart"></i>
							<span class="align-middle">Statistics</span>
						</a>
					</li>
					@auth
					<li class="sidebar-item">
						<form method="POST" action="{{ route('logout') }}">
							@csrf
							<button class="sidebar-link ms-1" type="submit" name="logout" style="border:none;">
								<i class="align-middle" data-feather="log-out"></i>
								<span class="align-middle">Log Out</span></a>
							</button>
						</form>
					</li>
					@else
					<li class="sidebar-item">
						<a class="sidebar-link" href="/login">
							<i class="align-middle" data-feather="log-in"></i>
							<span class="align-middle">Log In</span>
						</a>
					</li>
					@endauth
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>



				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						@yield('localization')
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="user"></i>
							</a>
							@auth
							<a class="nav-link d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<span class="text-dark">{{ Auth::user()->name }}</span>
								<i class="align-middle" data-feather="chevron-down"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<form method="POST" action="{{ route('logout') }}">
									@csrf
									<button class="dropdown-item" type="submit" name="logout">Log Out</button>
								</form>
							</div>

							@else
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<span class="text-dark">Profile</span>
								<i class="align-middle" data-feather="chevron-down"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="{{ route('login') }}">Log In</a>
							</div>
							@endauth

						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">
					@yield('container')
					<!-- <h1 class="h3 mb-3">Blank Page</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
								</div>
								<div class="card-body">

								</div>
							</div>
						</div>
					</div> -->
				</div>
			</main>

			<footer class="footer">
				<div class="col-6 text-start">
					<p class="mb-0">
						<a class="text-muted"><strong>LOTERE AMNIDA</strong></a>
						&copy;
					</p>
				</div>
			</footer>
		</div>
	</div>
</body>

</html>