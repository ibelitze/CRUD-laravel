<!DOCTYPE html>
<html>
<head>
	<title>CPanel - @yield('title')</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>

	<!-- MENU NAVBAR -->

	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Tabla Productos</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
	      <ul class="nav navbar-nav">
	        <li class=""><a href="/dashboard">Productos <span class="sr-only">(actual)</span></a></li>
	        <li><a href="/producto">Nuevo producto</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	            <li class="divider"></li>
	            <li><a href="#">One more separated link</a></li>
	          </ul>
	        </li>
	      </ul>
	      <form class="navbar-form navbar-left" role="search">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Search">
	        </div>
	        <button type="submit" class="btn btn-default">Submit</button>
	      </form>
					<div class="collapse navbar-collapse" id="app-navbar-collapse">
							<!-- Left Side Of Navbar -->
							<ul class="nav navbar-nav">
									&nbsp;
							</ul>

							<!-- Right Side Of Navbar -->
							<ul class="nav navbar-nav navbar-right">
									<!-- Authentication Links -->
									@if (Auth::guest())
											<li><a href="{{ url('/login') }}">Login</a></li>
											<li><a href="{{ url('/register') }}">Register</a></li>
									@else
											<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
															{{ Auth::user()->name }}
													</a>


															<li>
																	<a href="{{ url('/logout') }}"
																			onclick="event.preventDefault();
																							 document.getElementById('logout-form').submit();">
																			Logout
																	</a>
																	<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
																			{{ csrf_field() }}
																	</form>
															</li>
											</li>
									@endif
							</ul>
					</div>
	    </div>
	  </div>
	</nav>

		  @include('CRUD.mensajes')

  <div class="container">
      @yield('content')
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
</body>
</html>
