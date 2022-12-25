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
                                <h2 class="d-inline">Manage Projects</h2>
                                <Span><a class="btn btn-warning btn-group-sm float-right"
                                         href="{{ route('projects.create') }}">Create New
                                        Project</a> </Span>
                            </div>
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
                                                <h2>Posted Projects</h2>
                                            </div>
                                            <div class="wt-rightarea mr-5 mb-3">
                                                <a class="wt-btn" href="{{route('clientDashboard')}}"><i
                                                        class="fa fa-arrow-left"></i>Back</a>
                                            </div>


                                            <div class="wt-managejobcontent wt-verticalscrollbar">

                                                @foreach ($projects as $project)
                                                    @if (auth()->user()->id == $project->user_id)
                                                        <div class="wt-userlistinghold wt-featured wt-userlistingvtwo">
                                                            <span class="wt-featuredtag"><img
                                                                    src="{{ asset('assets\images\featured.png') }}"
                                                                    alt="img description" data-tipso="Plus Member"
                                                                    class="template-content tipso_style"></span>
                                                            <div class="wt-userlistingcontent">
                                                                <div class="wt-contenthead">
                                                                    <div class="wt-title">
                                                                        <h2>{{ $project->title }}</h2>
                                                                    </div>
                                                                    <ul
                                                                        class="wt-saveitem-breadcrumb wt-userlisting-breadcrumb">
                                                                        <li><span class="wt-dashboraddoller"><i
                                                                                    class="fa fa-dollar-sign"></i>
                                                                                {{ $project->budget }}</span></li>
                                                                        <li><span><img
                                                                                    src="{{ asset('assets\images\flag\img-04.png') }}"
                                                                                    alt="Project Category"> Category:
                                                                                {{ $project->category->name }}</span>
                                                                        </li>
                                                                        <li><span class="wt-dashboradclock"><i
                                                                                    class="far fa-clock"></i> Duration:
                                                                                {{ $project->duration }} Days</span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="wt-dashboradclock">
                                                                                @if ($project->status == '0')
                                                                                    <i class="fa fa-pause"></i> Status:
                                                                                    Pending
                                                                                @elseif ($project->status == '1')
                                                                                    <i class="fa fa-thumbs-o-up"></i>
                                                                                    Status:
                                                                                    Aprroved
                                                                                @elseif ($project->status == '2')
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
                                                                            action="{{ route('projects.destroy', $project->id) }}"
                                                                            method="POST">
                                                                            <a href="{{ route('projects.show', $project->id) }}"
                                                                               class="wt-btn"><i class="fa fa-eye"></i>
                                                                                DETAILS</a>
                                                                            <a href="{{ route('projects.edit', $project->id) }}"
                                                                               class="btn btn-warning btn-sm wt-btn"><i
                                                                                    class="fa fa-pencil"></i> EDIT</a>
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="wt-btn"><i
                                                                                    class="fa fa-trash"></i> DELETE
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                    <div class="wt-hireduserstatus">
                                                                        {{--
                                                                                                                                             @if($project->projectProposals->project_id == $project->id )
                                                                                                                                             <h4>{{$project_proposals_count}}</h4>
                                                                                                                                             @endif --}}

                                                                        <a href="{{ route('showProposal', $project->id) }}"
                                                                           class="btn btn-warning btn-sm mt-4"><i
                                                                                class="fa fa-eye"></i>
                                                                            Proposals</a>
                                                                        <ul class="wt-hireduserimgs">
                                                                            <li>
                                                                                <figure><img
                                                                                        src="{{ url('storage/images/profileimages/' . $project->user->image) }}"
                                                                                        alt="img description"></figure>
                                                                            </li>
                                                                        </ul>
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
