@extends('userDashboard')
@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">
        <div class="wt-freelancerholder wt-rcvproposalholder">
            <div class="wt-tabscontenttitle">
                <h2>Gig Details</h2>
            </div>
            <div class="wt-managejobcontent">
                <div class="wt-userlistinghold wt-featured wt-proposalitem">
                    <span class="wt-featuredtag"><img src="{{ asset('assets/images/featured.png') }}"
                                                      alt="img description"
                                                      data-tipso="Plus Member"
                                                      class="template-content tipso_style mCS_img_loaded"></span>
                    <figure class="wt-userlistingimg">
                        <img src="{{ asset('storage/images/gigimages/' . $gig->image) }}" alt="Gig Image"
                             class="mCS_img_loaded">
                    </figure>

                    <div class="wt-userlistingvtwo">
                        <div class="wt-contenthead" style="margin: -25px; margin-left:6px">
                            <div class="wt-title">
                                <h2>{{ $gig->freelancers->user->first_name }}</h2>
                            </div>
                            <div class="wt-title">
                                <h2>{{ $gig->title }}</h2>
                            </div>
                            <ul class="wt-saveitem-breadcrumb wt-userlisting-breadcrumb">
                                <li><span class="wt-dashboraddoller"><i class="fa fa-dollar-sign"></i>
                                        {{ $gig->amount }}</span></li>
                                <li><span><img src="{{ asset('assets\images\flag\img-04.png') }}"
                                               alt="Project Category">
                                        Category: {{ $gig->gigCategory->name }}</span></li>
                                <li><span class="wt-dashboradclock"><i class="far fa-clock"></i> Duration:
                                        {{ $gig->duration }} Days</span></li>
                                <li>
                                    <span class="wt-dashboradclock">
                                        @if ($gig->status == '0')
                                            <i class="fa fa-pause"></i> Status: Pending
                                        @elseif ($gig->status == '1')
                                            <i class="fa fa-thumbs-o-up"></i> Status: Aprroved
                                        @elseif ($gig->status == '2')
                                            <i class="fa fa-times "></i> Status: Canceled
                                        @endif
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="wt-proposaldetails">
                    </div>
                    <div class="wt-proposalfeedback mt-3">
                        <p>{{ $gig->description }}</p>

                    </div>

                    <div>
                        <a href="{{ route('gigPayment', $gig->id) }}" class="wt-btn" style="margin-left: 70%"><i
                                class="fa fa-eye"></i> Purchase Gig</a>

                    </div>
                    <div>
                        <a href="{{ route('gigView', $gig->id) }}" class="wt-btn"
                           style="margin-left: 73%; margin-top:2%"><i
                                class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>

            </div>

        </div>
@endsection
