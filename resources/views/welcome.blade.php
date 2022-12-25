<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Project Launch</title>
    <link rel="stylesheet" href="{{ url('css/welcomeStyles.css') }}">
    <link rel="stylesheet" href="{{ url('css/welcomeBootstrap.min.css') }}">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="57">
<nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
    <div class="container"><a class="navbar-brand" href="{{ route('home') }}">PROJECT LAUNCH</a>
        <button
            data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right"
            type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i
                class="fa fa-align-justify"></i></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('homeProjectsShow') }}">Projects</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('homeGigsShow') }}">Gigs</a></li>
                @if (Route::has('login'))
                    @auth
                        @if (Auth::user()->hasRole('Admin'))
                            <li class="nav-item"><a class="nav-link" href="{{ url('/admin/dashboard') }}">Dashboard</a>
                        @elseif(Auth::user()->hasRole('Client'))
                            <li class="nav-item"><a class="nav-link" href="{{ url('/client/dashboard') }}">Dashboard</a>
                        @elseif(Auth::user()->hasRole('Freelancer'))
                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ url('/freelancer/dashboard') }}">Dashboard</a>
                        @endif
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Sign In</a></li>
                        @if (Route::has('register'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Sign Up</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
<header class="text-center text-white d-flex masthead">
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-10 col-xl-11 mx-auto">
                <h1 class="text-uppercase"><strong>Your Favorite Source of Finding clients and freelancers</strong>
                </h1>
                <hr>
            </div>
        </div>
        <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">We help clients getting their work done by one of the best skilled
                freelancers available on our platform and help freelancers getting work from the huge quantity of
                clients and awesome projects</p><a class="btn btn-primary btn-xl" role="button"
                                                   href="#services">Find Out More</a>
        </div>
    </div>
</header>
<section id="about" class="bg-primary">
    <div class="container">
        <div class="row">
            <div class="col offset-lg-8 text-center mx-auto">
                <h2 class="text-white section-heading">We've got what you need!</h2>
                <hr class="light my-4">
                <p class="text-faded mb-4">Project Launch has everything you need to get your own ides into real
                    time running and updated projects. We have a huge community who loves to interact with peoples
                    worldwide and getting work done in no time.</p><a class="btn btn-light btn-xl" role="button"
                                                                      href="#services">Get Started!</a>
            </div>
        </div>
    </div>
</section>
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">At Your Service</h2>
                <hr class="my-4">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 text-center">
                <div class="mx-auto service-box mt-5"><i class="fa fa-diamond fa-4x text-primary mb-3 sr-icons"
                                                         data-aos="zoom-in" data-aos-duration="200"
                                                         data-aos-once="true"></i>
                    <h3 class="mb-3">Elite Community</h3>
                    <p class="text-muted mb-0">Our Community is one of the best community worldwide</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 text-center">
                <div class="mx-auto service-box mt-5"><i
                        class="fa fa-paper-plane fa-4x text-primary mb-3 sr-icons" data-aos="zoom-in"
                        data-aos-duration="200" data-aos-delay="200" data-aos-once="true"></i>
                    <h3 class="mb-3">World Wide</h3>
                    <p class="text-muted mb-0">You have worldwide access There is no limitation</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 text-center">
                <div class="mx-auto service-box mt-5"><i
                        class="fa fa-newspaper-o fa-4x text-primary mb-3 sr-icons" data-aos="zoom-in"
                        data-aos-duration="200" data-aos-delay="400" data-aos-once="true"></i>
                    <h3 class="mb-3">Up to Date</h3>
                    <p class="text-muted mb-0">Our Freelancers are updated to the latest Technologies</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 text-center">
                <div class="mx-auto service-box mt-5"><i class="fa fa-heart fa-4x text-primary mb-3 sr-icons"
                                                         data-aos="fade" data-aos-duration="200" data-aos-delay="600"
                                                         data-aos-once="true"></i>
                    <h3 class="mb-3">Made with Love</h3>
                    <p class="text-muted mb-0">We have people who love to work with new persons and teams</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="portfolio" class="p-0">
    <div class="container-fluid p-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Latest Listings</h2>
                    <hr class="my-4">
                </div>
            </div>
        </div>
        <div class="row g-0 popup-gallery">
            @foreach ($gigs as $gig)
                @if ($gig->status == '1')
                    <div class="col-sm-6 col-lg-4"><a class="portfolio-box"
                                                      href="{{ route('homeGigShow', $gig->id) }}"><img class="img-fluid"
                                                                                                       style="width:100%; height:350px; object-fit:fill"
                                                                                                       src="{{ asset('storage/images/gigImages/' . $gig->image) }}">

                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded"><span>Category</span></div>
                                    <div class="project-name"><span>{{ $gig->gigCategory->name }}</span></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
<section class="text-white bg-dark">
    <div class="container text-center">
        <h2 class="mb-4">Want to Know the Procedure?</h2><a class="btn btn-light btn-xl sr-button"
                                                            role="button" data-aos="zoom-in" data-aos-duration="400"
                                                            data-aos-once="true"
                                                            href="#">Download Demo!</a>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 text-center mx-auto">
                <h2 class="section-heading">Let's Get In Touch!</h2>
                <hr class="my-4">
                <p class="mb-5">Ready to start your next project with us? That's great! <br>Sign Up on our
                    platform and start exploring the world with us.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 text-center ms-auto"><i class="fa fa-phone fa-3x mb-3 sr-contact"
                                                         data-aos="zoom-in" data-aos-duration="300"
                                                         data-aos-once="true"></i>
                <p>042-99201505</p>
            </div>
            <div class="col-lg-4 text-center me-auto"><i class="fa fa-envelope-o fa-3x mb-3 sr-contact"
                                                         data-aos="zoom-in" data-aos-duration="300" data-aos-delay="300"
                                                         data-aos-once="true"></i>
                <p><a href="mailto:Ajlal4444@gmail.com">Admin@projectlaunch.com</a></p>
            </div>
        </div>
    </div>
</section>
<div class="row w-100 m-0 p-0">
    <div class="col footer-main">
        <div class="container d-flex d-sm-flex flex-column footer-wrapper">
            <div class="p-3">
                <div class="row w-100 m-0 p-0">
                    <div
                        class="col d-flex flex-column justify-content-center align-items-start justify-content-sm-center align-items-sm-start justify-content-md-center align-items-md-start p-2 footer-info">
                        <p>Virtual University Of Pakistan</p><small>Lawrence Road 41-D</small><small>Tel:
                            042-99201505<br></small><small>E-Mail: Admin@projectlaunch.com</small>
                    </div>
                    <div
                        class="col d-flex flex-row justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center p-2">
                        <a class="footer-icons" href="https://instagram.com/" target="_blank"><i
                                class="icon ion-social-instagram"></i></a><a class="footer-icons"
                                                                             href="https://twitter.com/"
                                                                             target="_blank"><i
                                class="icon ion-social-twitter"></i></a><a class="footer-icons"
                                                                           href="https://youtube.com/"
                                                                           target="_blank"><i
                                class="icon ion-social-youtube"></i></a><a class="footer-icons"
                                                                           href="https://mail.google.com/"
                                                                           target="_blank"><i
                                class="icon ion-android-mail"></i></a></div>
                    <div
                        class="col d-flex flex-column justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center p-2">
                        <div class="d-flex flex-column"><a href="index.html">Mr. Rizwan Waheed</a><a
                                href="login.html">Mr. Arslan Sabir</a><a
                                href="https://www.facebook.com/TigeRKinG4444/" target="_blank">Mr. Ahmad</a></div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-lg-center justify-content-xl-center align-items-xl-center">
                <p class="cc-footer">© 2022 Copyright: Project Launch<br></p>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('js/welcomeJs.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
<script src="{{ url('js/welcome-init.js') }}"></script>
</body>

</html>
