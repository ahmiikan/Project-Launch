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


                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" method="GET">
                                    <form class="wt-formtheme wt-formbanner wt-formbannervtwo">
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
                                                <h2>Gigs</h2>
                                            </div>
                                            <div class="wt-rightarea mr-3 mb-3">
                                                <a class="wt-btn" href="{{route('clientDashboard')}}"><i
                                                        class="fa fa-arrow-left"></i>Back</a>
                                            </div>
                                            <div class="wt-managejobcontent wt-verticalscrollbar">

                                                @foreach ($gigs as $gig)
                                                    <div class="wt-userlistinghold wt-featured wt-userlistingvtwo">
                                                        <span class="wt-featuredtag"><img
                                                                src="{{ asset('assets\images\featured.png') }}"
                                                                alt="img description" data-tipso="Plus Member"
                                                                class="template-content tipso_style"></span>
                                                        <figure class="wt-userlistingimg">
                                                            <img
                                                                src="{{ asset('storage/images/profileimages/' . $gig->freelancers->user->image) }}"
                                                                alt="Gig Image"
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
                                                                            {{ $gig->gigCategory->name }}</span></li>
                                                                    <li><span class="wt-dashboraddoller"><i
                                                                                class="fa fa-clock"></i>
                                                                            {{ $gig->duration }}</span></li>


                                                                </ul>
                                                            </div>
                                                            <div class="wt-rightarea ">
                                                                <div class=" wt-btnarea">
                                                                    <a href="{{ route('gigShow', $gig->id) }}"
                                                                       class="btn wt-btn"><i class="fa fa-eye"></i>
                                                                        Details</a>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <nav class="wt-pagination wt-savepagination">
                                    <ul>
                                        <li> {!! $gigs->links() !!}</li>
                                    </ul>

                                </nav>
                            </div>
                        </div>
                    </div>


                </div>
    </section>
@endsection
