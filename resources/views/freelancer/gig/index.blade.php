@extends('userDashboard')
@section('content')
    <section class="wt-haslayout wt-dbsectionspace">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
                <div class="wt-dashboardbox">
                    <div class="card">
                        <div class="card-body">
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            <div class="wt-dashboardboxtitle">
                                <h2 class="d-inline">Manage Gigs</h2>
                                <span><a class="btn btn-warning btn-group-sm float-right"
                                         href="{{ route('gigs.create') }}">Create New
                                        Gig</a>

                                    </span>

                            </div>


                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <form class="wt-formtheme wt-formbanner wt-formbannervtwo" method="GET">
                                        <fieldset>
                                            <div class="form-group">
                                                <input type="text" name="search" class="form-control"
                                                       value="{{ request()->get('search') }}"
                                                       placeholder="Search By Title">
                                                <div class="wt-formoptions">
                                                    <button class="wt-searchbtn"><i class="lnr lnr-magnifier"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>


                                    <div class="wt-dashboardboxcontent wt-jobdetailsholder">
                                        <div class="wt-freelancerholder">
                                            <div class="wt-tabscontenttitle">
                                                <h2>Posted Gigs</h2>
                                            </div>
                                            <div class="wt-rightarea mr-3 mb-3">
                                                <a class="wt-btn" href="{{route('freelancerDashboard')}}"><i
                                                        class="fa fa-arrow-left"></i>Back</a>
                                            </div>
                                            <div class="wt-managejobcontent wt-verticalscrollbar">

                                                @foreach ($gigs as $gig)
                                                    {{-- @dd(auth()->user()->freelancers->id == $gig->freelancer_id) --}}
                                                    @if (auth()->user()->freelancers->id == $gig->freelancer_id)
                                                        <div class="wt-userlistinghold wt-featured wt-userlistingvtwo">
                                                            <span class="wt-featuredtag"><img
                                                                    src="{{ asset('assets\images\featured.png') }}"
                                                                    alt="img description" data-tipso="Plus Member"
                                                                    class="template-content tipso_style"></span>
                                                            <figure class="wt-userlistingimg">
                                                                <img
                                                                    src="{{ asset('storage/images/gigImages/' . $gig->image) }}"
                                                                    alt="Freelancer Image"
                                                                    class="mCS_img_loaded">
                                                            </figure>

                                                            <div class="wt-userlistingvtwo">
                                                                <div class="wt-contenthead">
                                                                    <div class="wt-title">
                                                                        <h2>{{ $gig->title }}</h2>
                                                                    </div>
                                                                    <ul
                                                                        class="wt-saveitem-breadcrumb wt-userlisting-breadcrumb">
                                                                        <li><span class="wt-dashboraddoller"><i
                                                                                    class="fa fa-dollar-sign"></i>
                                                                                {{ $gig->amount }}</span></li>
                                                                        <li><span><img
                                                                                    src="{{ asset('assets\images\flag\img-04.png') }}"
                                                                                    alt="Gig Category"> Category:
                                                                                {{ $gig->gigCategory->name }}</span>
                                                                        </li>

                                                                        <li>
                                                                            <span class="wt-dashboradclock">
                                                                                @if ($gig->status == '0')
                                                                                    <i class="fa fa-pause"></i> Status:
                                                                                    Pending
                                                                                @elseif ($gig->status == '1')
                                                                                    <i class="fa fa-thumbs-o-up"></i>
                                                                                    Status:
                                                                                    Aprroved
                                                                                @elseif ($gig->status == '2')
                                                                                    <i class="fa fa-times "></i> Status:
                                                                                    Canceled
                                                                                @endif
                                                                            </span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="wt-rightarea ">
                                                                    <div class=" wt-btnarea">
                                                                        <form
                                                                            action="{{ route('gigs.destroy', $gig->id) }}"
                                                                            method="POST">
                                                                            <a href="{{ route('gigs.show', $gig->id) }}"
                                                                               class="wt-btn"><i class="fa fa-eye"></i>
                                                                                DETAILS</a>
                                                                            <a href="{{ route('gigs.edit', $gig->id) }}"
                                                                               class="btn btn-warning btn-sm wt-btn"><i
                                                                                    class="fa fa-pencil"></i> EDIT</a>
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="wt-btn"><i
                                                                                    class="fa fa-trash"></i> DELETE
                                                                            </button>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
