<!DOCTYPE html>
<html>
  <head>
	<title>Edulearn Education Category Bootstrap Responsive Website Template </title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Edulearn Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

	<!-- Custom-Files -->
	<!-- Bootstrap-Core-Css -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Testimonials-Css -->
	<link href="{{asset('css/mislider.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/mislider-custom.css')}}" rel="stylesheet" type="text/css" />
	<!-- Style-Css -->
	<link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" media="all" />
	<!-- Font-Awesome-Icons-Css -->
	<link rel="stylesheet" href="{{asset('css/fontawesome-all.css')}}">
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	 rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<!-- //Web-Fonts -->
     @livewireStyles
</head>
<body>
     <header>
		<!-- top header -->
		<div class="top-head-w3ls py-2 bg-dark">
			<div class="container">
				<div class="row">
					<h1 class="text-capitalize text-white col-7">
						<i class="fas fa-book text-dark bg-white p-2 rounded-circle mr-3"></i>welcome to edulearn</h1>
					<!-- social icons -->
					<div class="social-icons text-right col-5">
						<ul class="list-unstyled">
							<li>
								<a href="#" class="fab fa-facebook-f icon-border facebook rounded-circle"> </a>
							</li>
							<li class="mx-2">
								<a href="#" class="fab fa-twitter icon-border twitter rounded-circle"> </a>
							</li>
							<li>
								<a href="#" class="fab fa-google-plus-g icon-border googleplus rounded-circle"> </a>
							</li>
							<li class="ml-2">
								<a href="#" class="fas fa-rss icon-border rss rounded-circle"> </a>
							</li>
						</ul>
					</div>
					<!-- //social icons -->
				</div>
			</div>
		</div>
		<!-- //top header -->
		<!-- middle header -->
		<div class="middle-w3ls-nav py-2">
			<div class="container">
				<div class="row">
					<a class="logo font-italic font-weight-bold col-lg-4 text-lg-left text-center" href="index.html">Edulearn</a>
					<div class="col-lg-8 right-info-agiles mt-lg-0 mt-sm-3 mt-1">
						<div class="row">
							<div class="col-sm-4 nav-middle">
								<i class="far fa-envelope-open text-center mr-md-4 mr-sm-2 mr-4"></i>
								<div class="agile-addresmk">
									<p>
										<span class="font-weight-bold text-dark">Mail Us</span>
										<a href="mailto:mail@example.com">info@example.com</a>
									</p>
								</div>
							</div>
							<div class="col-sm-4 col-6 nav-middle mt-sm-0 mt-2">
								<i class="fas fa-phone-volume text-center mr-md-4 mr-sm-2 mr-4"></i>
								<div class="agile-addresmk">
									<p>
										<span class="font-weight-bold text-dark">Call Us</span>
										+1234-567-890
									</p>
								</div>
							</div>
                            @if(Auth::guard('web')->check())
                                @if(Route::has('dashboard.Login'))
              
                                 @auth
                                   <a href="{{route('dashboard.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" Style="color:red; margin-left:70px;">logout</a>
                                   <form action="{{route('dashboard.logout')}}" method="post" class="d-none" id="logout-form">@csrf</form>
                                    <a href="/dashboard/Home/profile/{{Auth::guard('web')->user()->profile->id}}" class="text-sm text-gray-700 dark:text-gray-500 underline" style="margin-left:600px; margin-top:5px;">profile</a>   
                                   <div style="width:50px; height:50px; border-radius:50%; margin-left:530px; position: absolute; top:60px;">
                                          <img src="{{Auth::guard('web')->user()->profile->imageprofile()}}" width="50px" height="50px" style="border-radius:50%;">
                                   </div>
                     
                                @else
                                     <li><a class="nav-link" href="{{route('dashboard.Login')}}">login</a></li>
                                   @if(Route::has('dashboard.register'))
                                      <li><a class="nav-link" href="{{route('dashboard.register')}}">register</a></li>
                                   @endif
                                 @endauth
                               @endif
                           @endif
                            @if(Auth::guard('teacher')->check())
                                @if(Route::has('dashboard.Login'))
              
                                 @auth
                                   <a href="{{route('dashboard.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" Style="color:red; margin-left:70px;">logout</a>
                                   <form action="{{route('dashboard.logout')}}" method="post" class="d-none" id="logout-form">@csrf</form>
                                 
                                    <a href="/dashboard/Home/profile/{{Auth::guard('teacher')->user()->profile->id}}" class="text-sm text-gray-700 dark:text-gray-500 underline" style="margin-left:600px; margin-top:1px;">profile</a>   
                                   <div style="width:50px; height:50px; border-radius:50%; margin-left:530px; position: absolute; top:60px;">
                                          <img src="{{Auth::guard('teacher')->user()->profile->imageprofile()}}" width="50px" height="50px" style="border-radius:50%;">
                                   </div>
                                           <div class="dropdown">
                                              <a class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                 notification <span class="badge bg-danger">{{count(auth()->user()->unreadNotifications)}}</span>
                                              </a>
                                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                @foreach(auth()->user()->unreadNotifications as $notification)
                                                 
                                                  <li><a class="dropdown-item" href="#">{{$notification->data['name']}}</a></li>
                                                @endforeach
                                               </ul>
                                           </div>
                                @else
                                     <li><a class="nav-link" href="{{route('dashboard.Login')}}">login</a></li>
                                   @if(Route::has('dashboard.register'))
                                      <li><a class="nav-link" href="{{route('dashboard.register')}}">register</a></li>
                                   @endif
                                 @endauth
                               @endif
                           @endif
                              
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- //middle header -->
	</header>
	<!-- //header -->
    <main>

        @yield('content')

    </main>



        

    <footer>
		<div class="container py-4">
			<div class="row py-xl-5 py-sm-3">
				<div class="col-lg-6 map">
					<h2 class="contact-title text-capitalize text-white font-weight-light mb-sm-4 mb-3">our
						<span class="font-weight-bold">directions</span>
					</h2>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.495758873587!2d-74.0005340845242!3d40.72911557933012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25991b7473067%3A0x59fbd02f7b519ce8!2s550+LaGuardia+Pl%2C+New+York%2C+NY+10012%2C+USA!5e0!3m2!1sen!2sin!4v1516166447283"></iframe>
					<div class="conta-posi-w3ls p-4 rounded">
						<h5 class="text-white font-weight-bold mb-3">Address</h5>
						<p>25095 Blue Ravine Rd,
							<span>Diamonds street,</span> California, USA</p>
					</div>
				</div>
				<div class="col-lg-6 contact-agileits-w3layouts mt-lg-0 mt-4">
					<h4 class="contact-title text-capitalize text-white font-weight-light mb-sm-4 mb-3">get in
						<span class="font-weight-bold">touch</span>
					</h4>
					<p class="conta-para-style border-left pl-4">If you have any questions about the services we provide simply use the form below. We try and respond to all queries
						and comments within 24 hours.</p>
					<div class="subscribe-w3ls my-xl-5 my-4">
						<h6 class="text-white text-capitalize mb-4">subscribe our newsletter</h6>
						<form action="#" method="post" class="subscribe_form">
							<input class="form-control" type="email" name="email" placeholder="Enter your email..." required="">
							<button type="submit" class="btn btn-primary submit">Submit</button>
						</form>
					</div>
					<p class="para-agileits-w3layouts text-white">
						<i class="fas fa-map-marker pr-3"></i>25095 Blue Ravine Rd,USA</p>
					<p class="para-agileits-w3layouts text-white my-sm-3 my-2">
						<i class="fas fa-phone pr-3"></i>032 625 4592</p>
					<p class="para-agileits-w3layouts">
						<i class="far fa-envelope-open pr-2"></i>
						<a href="mailto:mail@example.com" class=" text-white">info@example.com</a>
					</p>
				</div>
			</div>
		</div>
		<div class="copyright-agiles py-3">
			<div class="container">
				<div class="row">
					<p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">© 2018 Edulearn. All Rights Reserved | Design by
						<a href="https://w3layouts.com/" target="_blank">W3layouts</a>
					</p>
					<!-- social icons -->
					<div class="social-icons text-lg-right text-center col-lg-4 mt-lg-0 mt-3">
						<ul class="list-unstyled">
							<li>
								<a href="#" class="fab fa-facebook-f icon-border facebook rounded-circle"> </a>
							</li>
							<li class="mx-2">
								<a href="#" class="fab fa-twitter icon-border twitter rounded-circle"> </a>
							</li>
							<li>
								<a href="#" class="fab fa-google-plus-g icon-border googleplus rounded-circle"> </a>
							</li>
							<li class="ml-2">
								<a href="#" class="fas fa-rss icon-border rss rounded-circle"> </a>
							</li>
						</ul>
					</div>
					<!-- //social icons -->
				</div>
			</div>
		</div>
	</footer>
	<!-- //footer -->


	<!-- Js files -->
	<!-- JavaScript -->
	<script src="{{asset('js/jquery-2.2.3.min.js')}}"></script>
	<!-- Default-JavaScript-File -->
	<script src="{{asset('js/bootstrap.js')}}"></script>
	<!-- Necessary-JavaScript-File-For-Bootstrap -->
     <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
     <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
	<!-- banner slider -->
	<script src="{{asset('js/slider.js')}}"></script>
	<!-- //banner slider -->

	<!-- testimonial-plugin -->
	<script src="{{asset('js/mislider.js')}}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
	<script>
		jQuery(function ($) {
			var slider = $('.mis-stage').miSlider({
				//  The height of the stage in px. Options: false or positive integer. false = height is calculated using maximum slide heights. Default: false
				stageHeight: 320,
				//  Number of slides visible at one time. Options: false or positive integer. false = Fit as many as possible.  Default: 1
				slidesOnStage: false,
				//  The location of the current slide on the stage. Options: 'left', 'right', 'center'. Defualt: 'left'
				slidePosition: 'center',
				//  The slide to start on. Options: 'beg', 'mid', 'end' or slide number starting at 1 - '1','2','3', etc. Defualt: 'beg'
				slideStart: 'mid',
				//  The relative percentage scaling factor of the current slide - other slides are scaled down. Options: positive number 100 or higher. 100 = No scaling. Defualt: 100
				slideScaling: 150,
				//  The vertical offset of the slide center as a percentage of slide height. Options:  positive or negative number. Neg value = up. Pos value = down. 0 = No offset. Default: 0
				offsetV: -5,
				//  Center slide contents vertically - Boolean. Default: false
				centerV: true,
				//  Opacity of the prev and next button navigation when not transitioning. Options: Number between 0 and 1. 0 (transparent) - 1 (opaque). Default: .5
				navButtonsOpacity: 1,
			});
		});
	</script>
	<!-- //testimonial-plugin -->

	<!-- numscroller-js-file -->
	<script src="{{asset('js/numscroller-1.0.js')}}"></script>
	<!-- //numscroller-js-file -->

	<!-- smooth scrolling -->
	<script src="{{asset('js/SmoothScroll.min.js')}}"></script>
	<!-- //smooth scrolling -->

	<!-- move-top -->
	<script src="{{asset('js/move-top.js')}}"></script>
	<!-- easing -->
	<script src="{{asset('js/easing.js')}}"></script>
	<!--  necessary snippets for few javascript files -->
	<script src="{{asset('js/edulearn.js')}}"></script>

	<!-- //Js files -->
     @livewireScripts
</body>
</html>
