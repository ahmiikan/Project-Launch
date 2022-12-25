@extends('userDashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <h3 class="card-title">Approved Gigs</h3>


                    <div class="table-responsive">
                        <table class="table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Gig Title</th>
                                <th>Gig Category</th>
                                <th>Gig Price</th>
                                <th>Gig Duration</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($approvedGigs as $approvedGig)
                                @if (auth()->user()->freelancers->id == $approvedGig->freelancer_id)

                                    <tr>
                                        <td>{{ $approvedGig->id }}</td>
                                        <td>{{ $approvedGig->title }}</td>
                                        <td>{{ $approvedGig->gigCategory->name }}</td>
                                        <td>{{ $approvedGig->amount."$" }}</td>
                                        <td>{{ $approvedGig->duration." Days" }}</td>

                                        @if ($approvedGig->status == '0')
                                            <td><span class="text-primary">Pending</span></td>
                                        @elseif ($approvedGig->status == '1')
                                            <td><span class="text-success">Apprroved</span></td>
                                        @elseif ($approvedGig->status == '2')
                                            <td><span class="text-danger">Canceled</span></td>
                                        @endif
                                        <td>
                                            <a href="{{route('approvedGigsListShow',$approvedGig->id)}}"
                                               class="btn btn-primary btn-sm p-2 m-1"><i
                                                    class="fa fa-eye mr-2"></i>View</a>

                                        </td>
                                    </tr>
                                @endif

                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
            <div class="wt-rightarea ">
                <a class="wt-btn" href="{{route('freelancerDashboard')}}"><i
                        class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </div>
@endSection
