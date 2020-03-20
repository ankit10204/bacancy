<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
	<a class="navbar-brand" href="#">Dashboard</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarsExampleDefault">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item {{ (request()->is('home')) ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('home')}}">Home</a>
			</li>
			<li class="nav-item {{ (request()->is('companies*')) ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('companies.index')}}">Companies</a>
			</li>
			<li class="nav-item {{ (request()->is('employees*')) ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('employees.index')}}">Employees</a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0" action="{{ route('logout') }}" method="POST">
			@csrf
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
		</form>
	</div>
</nav>