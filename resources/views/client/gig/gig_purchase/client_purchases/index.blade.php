@extends('userDashboard')
@section('content')
    <section class="wt-haslayout wt-dbsectionspace">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-12">
                <div class="wt-dashboardbox">
                    <div class="card">
                        <div class="card-body">
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            <div class="wt-dashboardboxtitle">
                                <h2 class="d-inline align-content-center">Manage Orders</h2>
                                <Span><a class="btn btn-warning btn-lg float-right"
                                        href="{{ url()->previous() }}">Back</a> </Span>
                            </div>

                            {{-- <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" method="GET">
                                    <form class="wt-formtheme wt-formbanner wt-formbannervtwo">
                                        <fieldset>
                                            <div class="form-group">
                                                <input type="text" name="search" class="form-control"
                                                    value="{{ request()->get('search') }}" placeholder="Search By Title">
                                                <div class="wt-formoptions">
                                                    <button class="wt-searchbtn"><i class="lnr lnr-magnifier"></i></button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form> --}}


                                <div class="card">
                                    
                                    <div class="card-body">

                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">ACTIVE</button>
                                                <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">DELIVERED</button>
                                                <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">COMPLETED</button>
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                {{-- table --}}
                                                <div class="wt-dashboardboxcontent wt-jobdetailsholder">
                                                    <div class="wt-freelancerholder">
                                                        <div class="wt-tabscontenttitle">
                                                            <h2>ACTIVE ORDERS</h2>
                                                        </div>

                                                        <div class="table-responsive">
                                                            <table class="table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sr. #</th>
                                                                        <th>Freelancer</th>
                                                                        <th>Gig title</th>
                                                                        <th>Gig amount</th>
                                                                        <th>Due on</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @for($i = 0; $i < count($gigPurchases) && $i < count($gigs); $i++) 
                                                                        <tr>
                                                                            @if ($gigPurchases[$i]->purchase_status == 1)
                                                                                <td>{{ $a++ }}</td>
                                                                                
                                                                                <td>{{ $gigs[$i]->freelancers->user->first_name }}</td>
                                                                                <td class="wt-title">{{ $gigs[$i]->title }}</td>
                                                                                <td >{{ $gigs[$i]->amount }}</td>
                                                                                <td >{{ $gigs[$i]->duration . ' days' }}</td>
                                                                                <td> In progress </td>
                                                                                <td>
                                                                                    <a  href="{{ route('gigPurchaseView', $gigPurchases[$i]->id) }}"  class="btn btn-danger text-white btn-sm"><i class="lnr lnr-eye"></i> <span> view <span> </a>
                                                                                </td>
                                                                            @endif
                                                                        </tr>
                                                                    @endfor
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>
                                                </div>
                                                {{-- table --}}

                                            </div>
                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                 {{-- table --}}
                                                <div class="wt-dashboardboxcontent wt-jobdetailsholder">
                                                    <div class="wt-freelancerholder">
                                                        <div class="wt-tabscontenttitle">
                                                            <h2>DELIVERED ORDERS</h2>
                                                        </div>

                                                        <div class="table-responsive">
                                                            <table class="table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sr. #</th>
                                                                        <th>Client</th>
                                                                        <th>Gig title</th>
                                                                        <th>Due on</th>
                                                                        <th>Delivered at</th>
                                                                        <th>Gig amount</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @for($i = 0; $i < count($gigPurchases) && $i < count($gigs); $i++) 
                                                                    <tr>
                                                                        @if ($gigPurchases[$i]->purchase_status == 2)

                                                                            <td>{{ $a++ }}</td>
                                                                            
                                                                            <td>{{  $gigs[$i]->freelancers->user->first_name }}</td>
                                                                            <td class="wt-title">{{ $gigs[$i]->title }}</td>
                                                                            <td >{{ $gigPurchases[$i]->created_at->addDays($gigs[$i]->duration)->format('Y-m-d H:i:s') }}</td>
                                                                            <td >
                                                                                {{-- {{ $gigSales[$i]->$gig_deliveries[$i]->created_at->format('Y-m-d H:i:s')  }} --}}
                                                                            </td>
                                                                            <td >{{ $gigs[$i]->amount }}</td>
                                                                            <td>Delivered</td>
                                                                            <td>
                                                                                <a  href="{{ route('gigDeliveredView', $gigPurchases[$i]->id) }}"  class="btn btn-danger text-white btn-sm"><i class="lnr lnr-eye"></i> <span> view <span> </a>
                                                                            </td>
                                                                        @endif
                                                                    </tr>
                                                                    @endfor
                                    
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>
                                                </div>
                                                {{-- table --}}
                                            </div>
                                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                 {{-- table --}}
                                                 <div class="wt-dashboardboxcontent wt-jobdetailsholder">
                                                    <div class="wt-freelancerholder">
                                                        <div class="wt-tabscontenttitle">
                                                            <h2>COMPLETED ORDERS</h2>
                                                        </div>

                                                        <div class="table-responsive">
                                                            <table class="table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sr. #</th>
                                                                        <th>Client</th>
                                                                        <th>Gig title</th>
                                                                        <th>Due on</th>
                                                                        <th>Delivered at</th>
                                                                        <th>Gig Amount</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @for($i = 0; $i < count($gigPurchases) && $i < count($gigs); $i++) 
                                                                    <tr>
                                                                        @if ($gigPurchases[$i]->purchase_status == 3)

                                                                            <td>{{ $a++ }}</td>
                                                                            
                                                                            <td>{{  $gigs[$i]->freelancers->user->first_name }}</td>
                                                                            <td class="wt-title">{{ $gigs[$i]->title }}</td>
                                                                            <td >{{ $gigPurchases[$i]->created_at->addDays($gigs[$i]->duration)->format('Y-m-d H:i:s') }}</td>
                                                                            <td >
                                                                                {{ $gigPurchases[$i]->gigDelivery[$i]->created_at->format('Y-m-d H:i:s')  }}
                                                                            </td>
                                                                            <td >{{ $gigs[$i]->amount }}</td>
                                                                            <td>Completed</td>
                                                                            <td>
                                                                                <a  href="{{ route('gigCompletedView', $gigPurchases[$i]->id) }}"  class="btn btn-danger text-white btn-sm"><i class="lnr lnr-eye"></i> <span> view <span> </a>
                                                                            </td>
                                                                        @endif
                                                                    </tr>
                                                                    @endfor
                                    
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>
                                                </div>
                                                {{-- table --}}
                                            </div>
                                        </div>

                                    </div>
                                        
                                </div>
                            </div>

                            {{-- </div> --}}
                        </div>
                    </div> 
                </div> 
            </div>
    </section>
@endsection