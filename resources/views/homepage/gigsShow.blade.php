<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Gigs - Project Launch</title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="57">

<style>
    .navbar {
        background-color: #F05F40 !important;
    }

    .navbar a {
        color: white !important;
    }

    .mainContainer {
        margin: 100px;
    }

    .cardHeading {
        color: #f05f40;
    }

    .cardBtn a {
        text-decoration: none;
        color: white;
    }

    .cardBtn a:hover {
        text-decoration: none;
        color: white;
    }

    .card {
        background-color: white;
        box-shadow: inset 0 -3em 3em rgba(0, 0, 0, 0),
        0 0 0 2px rgb(255, 255, 255),
        0.3em 0.3em 1em rgba(0, 0, 0, 0.5);
        height: 830px;
    }

</style>

<nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
    <div class="container"><a class="navbar-brand" href="{{ route('home') }}">PROJECT LAUNCH</a>
        <button
            data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right"
            type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i
                class="fa fa-align-justify"></i></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('homeProjectsShow') }}">Projects</a></li>
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

<div class="mainContainer">
    <div class="mt-5">
        <div class="row">
            <h1 class="cardHeading col-sm-6">Our Latest Gigs</h1>
            <h1 class="cardHeading col-sm-6 text-end"><a href="{{ url()->previous() }}" class="text-right">Back</a></h1>
        </div>

        <div class="row">
            @foreach ($gigs as $gig)
                @if ($gig->status == '1')
                    <div class="card-deck col-lg-4 mb-5">
                        <div class="card p-0 border-0">
                            <img class="card-img-top" src="{{ asset('storage/images/gigImages/' . $gig->image) }}"
                                 alt="Card Image">
                            <div class="card-body">
                                <h4 class="card-title text-center cardHeading">{{ $gig->title }}</h4>

                                <table class="table table-striped mt-5 mb-5">
                                    <tr>
                                        <td>Amount:</td>
                                        <td>{{ $gig->amount }} $</td>
                                    </tr>
                                    <tr>
                                        <td>Duration:</td>
                                        <td>{{ $gig->duration }} Days</td>
                                    </tr>
                                    <tr>
                                        <td>Category:</td>
                                        <td>{{ $gig->gigCategory->name }}</td>
                                    </tr>
                                </table>
                                <p class="card-text mt-5">{{ $gig->description }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
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
