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
                    <h3 class="card-title">Rejected Gigs</h3>


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
                            @foreach ($canceledGigs as $canceledGig)
                                @if (auth()->user()->freelancers->id == $canceledGig->freelancer_id)

                                    <tr>
                                        <td>{{ $canceledGig->id }}</td>
                                        <td>{{ $canceledGig->title }}</td>
                                        <td>{{ $canceledGig->gigCategory->name }}</td>
                                        <td>{{ $canceledGig->amount. "$" }}</td>
                                        <td>{{ $canceledGig->duration. " Days" }}</td>

                                        @if ($canceledGig->status == '0')
                                            <td><span class="text-primary">Pending</span></td>
                                        @elseif ($canceledGig->status == '1')
                                            <td><span class="text-success">Apprroved</span></td>
                                        @elseif ($canceledGig->status == '2')
                                            <td><span class="text-danger">Canceled</span></td>
                                        @endif
                                        <td>
                                            <div class="btn-group " role="group" aria-label="Button group example">
                                                <a href="{{route('canceledGigsListShow',$canceledGig->id)}}"
                                                   class="btn btn-primary btn-sm p-2 m-1"><i
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
                        class="fa fa-arrow-left"></i>Back</a>
            </div>
        </div>
    </div>
    {{-- pagination --}}
@endSection
