@extends('userDashboard')
@section('content')

    <style>
        .cardHeading {
            color: #F05F40;
            margin-bottom: 20px;
        }

        .cardBtn {
            background-color: #f05f40;
            color: white;
        }

        .cardBtn:hover {
            background-color: #cb4829;
            color: white;
        }

        .cardBtn a {
            text-decoration: none;
            color: white;
        }

        .cardBtn a:hover {
            text-decoration: none;
            color: white;
        }

        .card-text {
            font-size: 25px;
        }

        .card-text i {
            color: #f05f40;
            margin-right: 10px;
            font-size: 30px;
        }

        .card {
            background-color: white;
            box-shadow: inset 0 -3em 3em rgba(0, 0, 0, 0),
            0 0 0 2px rgb(255, 255, 255),
            0.3em 0.3em 1em rgba(0, 0, 0, 0.5);
        }
    </style>

    <div class="w-100">
        <div class="ms-3 me-3 mb-5">
            <h3 class="cardHeading">Gigs Management</h3>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card p-2 border-0">
                        <div class="card-body">
                            <h4 class="card-title cardHeading mb-4">Approved Gigs</h4>
                            <p class="card-text"><i class="bi bi-reception-2"></i>{{$aGigs}}</p>
                        </div>
                        <div class="card-footer cardBtn p-0 w-100">
                            <a href="{{route('approvedGigsList')}}" class="btn m-0 w-100">Check List</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card p-2 border-0">
                        <div class="card-body">
                            <h4 class="card-title cardHeading mb-4">Pending Gigs</h4>
                            <p class="card-text"><i class="bi bi-hourglass-split"></i>{{$pGigs}}</p>
                        </div>
                        <div class="card-footer cardBtn p-0 w-100">
                            <a href="{{route('pendingGigsList')}}" class="btn m-0 w-100">Check List</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card p-2 border-0">
                        <div class="card-body">
                            <h4 class="card-title cardHeading mb-4">Rejected Gigs</h4>
                            <p class="card-text"><i class="bi bi-hourglass-split"></i>{{$cGigs}}</p>
                        </div>
                        <div class="card-footer cardBtn p-0 w-100">
                            <a href="{{route('canceledGigsList')}}" class="btn m-0 w-100">Check List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="ms-3 mt-5 me-3 mb-5">
            <h3 class="cardHeading">Check Projects</h3>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card p-2 border-0">
                        <div class="card-body">
                            <h4 class="card-title cardHeading mb-4">Clients Projects</h4>
                            <p class="card-text"><i class="bi bi-reception-2"></i>{{$cProjects}}</p>
                        </div>
                        <div class="card-footer cardBtn p-0 w-100">
                            <a href="{{route('projectList')}}" class="btn m-0 w-100">Check List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
