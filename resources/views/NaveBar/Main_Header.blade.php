<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="{{asset('CSS/BootStrap/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('CSS/BootStrap/mdb.min.css')}}">
	<link rel="stylesheet" href="{{asset('CSS/Style.css')}}">
	<link rel="stylesheet" href="{{asset('cssadmin/Styleadmin.css')}}">
	<link rel="stylesheet" href="{{asset('CSS/Login.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('./slick/slick.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('./slick/slick-theme.css')}}">
	<link href="{{asset('fonts/css/all.css')}}" rel="stylesheet">
	@yield('css')
</head>

<body>
<section class="mb-5 pb-5">
		<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
			<div class="navbar-brand">
				<img src="{{asset('Image/Logo2.png')}}" style="height: 10vh;"></img>
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
					</li>
					@if(!Auth::check())
					<li class="nav-item">
						<a class="nav-link" href="#"
							onclick="document.getElementById('id01').style.display='block' , document.getElementById('id02').style.display='none'">Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"
							onclick="document.getElementById('id02').style.display='block' , document.getElementById('id01').style.display='none'">SignUp
							<span class="sr-only">(current)</span></a>
					</li>
					@else	
					<li class="nav-item dropdown ml-5">
						<img class="nav-Item dropdown-toggle" id="imagelogpro" data-toggle="dropdown"
							src="../Image/profile.png" style="height: 10vh;" role="button" aria-haspopup="true"
							aria-expanded="false"><label for="imagelogpro" data-toggle="dropdown"
							role="button">{{ Auth::user()->email}}</label></img>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="{{route('profile',Auth::user()->id)}}">Profile</a>
							<a class="dropdown-item" href="../Edite Page/Edite Page.html">Add new think</a>
							@if(Auth::check() && Auth::user()->Position == 0)
							<a class="dropdown-item" href="#">Setting</a>
							@endif
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                             </form>
						</div>
					</li>
                          @endif
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div>
		</nav>
	</section>
	<section>
		<div id="id01" class="modal">
			<form class="modal-content animate" action="{{route('login')}}" method="post">
			@csrf
				<div class="imgcontainer">
					<span onclick="document.getElementById('id01').style.display='none'" class="close"
						style="right: 10vw;" title="Close Modal">&times;</span>
					<img src="Image/download.png" alt="Avatar"
						style="height: 30vh;width: 18vw; border-radius: 100%; border: 5px solid #9C9492;"
						class="avatar">
				</div>
				<div class="containerLog">
					<label for="uname"><b>Username</b></label>
					<input type="text" placeholder="Enter Username" name="email" required>

					<label for="psw"><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="password" required>
					<label>
						<input type="checkbox" checked="checked" name="remember"> Remember me
					</label>
					<button class="login" type="submit">Login</button>
				</div>
				<div class="containerLog login" style="background-color:#f1f1f1">
					<button type="button" onclick="document.getElementById('id01').style.display='none'"
						class="cancelbtn">Cancel</button>
					<!--<span class="psw">Forgot <a href="#">password?</a></span>-->
				</div>
			</form>
		</div>

		<div id="id02" class="modal signupfont">
			<form class="modal-content animate" action="{{route('register')}}" method="post">
			@csrf
				<div class="containerLog">
					<div class="imgcontainer">
						<span onclick="document.getElementById('id02').style.display='none'" class="close"
							title="Close Modal">&times;</span>
						<img src="Image/download.png" alt="Avatar"
							style="height: 30vh;width: 18vw; border-radius: 100%; border: 5px solid #9C9492;"
							class="avatar">
					</div>
					<h1 style="text-align: center;">Register</h1>
					<p>Please fill in this form to create an account.</p>
					<hr>
					<label for="uname"><b>Name</b></label>
					<input type="text" placeholder="Enter Username" name="Name" required>

					<label for="uname"><b>Address</b></label>
					<input type="text" placeholder="Enter Username" name="Address" required>

					<label for="email"><b>Email</b></label>
					<input type="email" placeholder="Enter Email" name="email" id="email" required email>

					<label for="psw"><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="psw" id="psw" required>

					<label for="psw-repeat"><b>Repeat Password</b></label>
					<input type="password" placeholder="Repeat Password" name="psw_confirmation" id="psw-repeat" required>
					<hr>
					<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

					<button type="submit" class="registerbtn">Register</button>
				</div>

				<div class="containerLog signin">
					<p>Already have an account? <a class="reg" href="#"
							onclick="document.getElementById('id01').style.display='block' , document.getElementById('id02').style.display='none'">Sign
							in</a>.</p>
				</div>
			</form>
		</div>
	</section>