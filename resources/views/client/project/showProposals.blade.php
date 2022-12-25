@extends('userDashboard')
@section('content')
    <section class="wt-haslayout wt-dbsectionspace wt-proposals">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">
                <div class="wt-dashboardbox">
                    <div class="wt-dashboardboxtitle">
                        <h2>Manage Jobs</h2>
                    </div>
                    <div class="wt-dashboardboxcontent wt-rcvproposala">
                        <div class="wt-userlistinghold wt-featured wt-userlistingvtwo">
                            <span class="wt-featuredtag wt-featuredtagcolor3"><img
                                    src="{{ asset('assets/images/featured.png') }}" alt="img description"
                                    data-tipso="Plus Member" class="template-content tipso_style mCS_img_loaded"></span>
                            <figure class="wt-userlistingimg">
                                <img src="{{ asset('storage/images/profileimages/' . $project->user->image) }}"
                                     alt="Gig Image" class="mCS_img_loaded">
                            </figure>
                            <div class="wt-userlistingcontent">
                                <div class="wt-contenthead">
                                    <div class="wt-title">
                                        <h2>{{ $project->user->first_name . ' ' . $project->user->last_name }}</h2>
                                    </div>
                                    <ul class="wt-saveitem-breadcrumb wt-userlisting-breadcrumb">
                                        <li><span class="wt-dashboraddoller"><i class="fa fa-dollar-sign"></i>
                                                {{ $project->budget }}</span></li>
                                        <li><span><img src="{{ asset('assets\images\flag\img-04.png') }}"
                                                       alt="Project Category"> Category: {{ $project->category_id }}</span>
                                        </li>
                                        <li><span class="wt-dashboradclock"><i class="far fa-clock"></i> Duration:
                                                {{ $project->duration }} Days</span></li>
                                        <li>
                                            <span class="wt-dashboradclock">
                                                @if ($project->status == '0')
                                                    <i class="fa fa-pause"></i> Status: Pending
                                                @elseif ($project->status == '1')
                                                    <i class="fa fa-thumbs-o-up"></i> Status: Aprroved
                                                @elseif ($project->status == '2')
                                                    <i class="fa fa-times "></i> Status: Canceled
                                                @endif
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="wt-rightarea">
                                    <div class="wt-hireduserstatus">
                                        <h4> {{ $project_proposals_count }} </h4><span>Proposals Received</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wt-freelancerholder wt-rcvproposalholder">
                            <div class="wt-tabscontenttitle">
                                <h2>Received Proposals</h2>
                            </div>
                            <div class="wt-managejobcontent">

                                @foreach ($project_proposals as $proposal)
                                    <div class="wt-userlistinghold wt-featured wt-proposalitem">
                                        <span class="wt-featuredtag"><img
                                                src="{{ asset('assets/images/featured.png') }}"
                                                alt="img description" data-tipso="Plus Member"
                                                class="template-content tipso_style mCS_img_loaded"></span>
                                        <figure class="wt-userlistingimg">
                                            <img
                                                src="{{ url('storage/images/profileimages/' . $proposal->freelancers->user->image) }}"
                                                alt="Freelancer Image" class="mCS_img_loaded">
                                        </figure>

                                        <div class="wt-proposaldetails">
                                            <div class="wt-contenthead">
                                                <div class="wt-title">
                                                    <h2>{{ $proposal->freelancers->user->first_name . ' ' . $proposal->freelancers->user->last_name }}
                                                    </h2>
                                                </div>
                                                <div class="wt-title">
                                                    <h2>{{ $proposal->title }}</h2>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="wt-proposalfeedback mt-3">
                                            <p>{{ $proposal->description }}</p>

                                        </div>
                                        <div class="wt-rightarea">
                                            <div class="wt-btnarea">
                                                <a href="{{ route('showHiredFreelancer', [$proposal->freelancer_id, $proposal->project_id]) }}"
                                                   class="wt-btn">Hire Now</a>
                                            </div>
                                            <div class="wt-hireduserstatus">
                                                <h5>&#36;{{ $proposal->price }}</h5>
                                                <span> {{ 'In ' . $proposal->days . ' Days' }} </span>
                                            </div>
                                            <div class="wt-hireduserstatus">
                                                <a href="{{ route('downloadProposal', $proposal->attachment) }}">
                                                    <i class="fa fa-paperclip"></i>
                                                    <span>Download attached file</span> </a>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                    <nav class="wt-pagination wt-savepagination">
                        <ul>

                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </section>
@endsection
