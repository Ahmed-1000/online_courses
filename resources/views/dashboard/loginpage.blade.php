@extends('header.header')

@section('content')

     <div class="banner-agile-2">
		<!-- navigation -->
		<div class="navigation-w3ls">
			<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-nav">
				<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				 aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
					<ul class="navbar-nav justify-content-center">
						<li class="nav-item">
							<a class="nav-link text-white" href="{{route('dashboard.Home')}}">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="about.html">About Us</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Courses
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="language.html">Language</a>
								<a class="dropdown-item" href="communication.html">Communication</a>
								<a class="dropdown-item" href="business.html">Business</a>
								<a class="dropdown-item" href="software.html">Software</a>
								<a class="dropdown-item" href="social_media.html">Social Media</a>
								<a class="dropdown-item" href="photography.html">Photography</a>
								<a class="dropdown-item" href="course_details.html">Course Details</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="form.html">Apply Now</a>
							</div>
						</li>
						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Pages
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="about.html">Instructors</a>
								<a class="dropdown-item" href="index.html">What We Do</a>
								<a class="dropdown-item active" href="{{route('login')}}">Login</a>
								<a class="dropdown-item" href="{{route('register')}}">Register</a>
								<a class="dropdown-item" href="404.html">404 Page</a>
								<a class="dropdown-item" href="coming_soon.html">Coming Soon</a>
								<a class="dropdown-item" href="form.html">Admission Form</a>
								<a class="dropdown-item" href="faq.html">Faq</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="blog.html">Blog</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="gallery.html">Gallery</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="contact.html">Contact Us</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<!-- //navigation -->
	</div>
	<!-- breadcrumb -->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.html">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Login Form</li>
		</ol>
	</nav>
	<!-- breadcrumb -->
	<!-- //banner -->

	<!-- login -->
	<div class="login-w3ls py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">Login
				<span class="font-weight-bold">now</span>
			</h3>
			<!-- content -->
			<div class="sub-main-w3 pt-md-4">
				<form action="{{route('dashboard.check')}}" method="post">
                  @if(Session::get('fail'))
                  <div class="alert alert-danger">
          
                        {{ Session::get('fail') }}
               
                   </div>

                  @endif
                  @csrf
                    <div class="form-style-agile form-group">
						<label>
							role
							
						</label>
						<select class="form-control" name="role">
                            <option value="student">student</option>
                             <option value="teacher">teacher</option>
                        </select>
                           <span class="text-danger">@error('role'){{ $message }} @enderror</span>
					</div>
					<div class="form-style-agile form-group">
						<label>
							Username or Email
							<i class="fas fa-user"></i>
						</label>
						<input placeholder="Username or Email" class="form-control" name="name" type="text">
                           <span class="text-danger">@error('name'){{ $message }} @enderror</span>
					</div>
					<div class="form-style-agile form-group">
						<label>
							Password
							<i class="fas fa-unlock-alt"></i>
						</label>
						<input placeholder="Password" class="form-control" name="password" type="password">
                           <span class="text-danger">@error('password'){{ $message }} @enderror</span>
					</div>
					<!-- switch -->
					<ul class="list-unstyled list-login">
						<li class="switch-agileits float-left">
							<label class="switch  text-capitalize">
								<input type="checkbox">
								<span class="slider-switch round"></span>
								keep me signed in
							</label>
						</li>
						<li class="float-right">
							<a href="#" class="text-right text-white text-capitalize">forgot password?</a>
						</li>
					</ul>
					<!-- //switch -->
					<input type="submit" value="Log In">
					<p class="text-center dont-do mt-4 text-white">Don't have an account?
						<a href="{{url('/dashboard/register')}}" class="text-white  font-weight-bold">
							Register Now</a>
					</p>
                    <a href="{{ route('google.login')}}" class="btn btn-google btn-user btn-block">
                        <i class="fab fa-google fa-fw"></i> Login with google
                    </a>
				</form>
			</div>
			<!-- //content -->
		</div>
	</div>
	<!-- //login -->

	<!-- brands -->
	<div class="brands-w3ls py-md-5 py-4">
		<div class="container py-xl-3">
			<ul class="list-unstyled">
				<li>
					<i class="fab fa-supple"></i>
				</li>
				<li>
					<i class="fab fa-angrycreative"></i>
				</li>
				<li>
					<i class="fab fa-aviato"></i>
				</li>
				<li>
					<i class="fab fa-aws"></i>
				</li>
				<li>
					<i class="fab fa-cpanel"></i>
				</li>
				<li>
					<i class="fab fa-hooli"></i>
				</li>
				<li>
					<i class="fab fa-node"></i>
				</li>
			</ul>
		</div>
	</div>
	<!-- //brands -->




@endsection
