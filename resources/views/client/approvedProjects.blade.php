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
                    <h3 class="card-title">Approved Projects</h3>


                    <div class="table-responsive">
                        <table class="table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Project Title</th>
                                <th>Project Category</th>
                                <th>Project Budget</th>
                                <th>Project Duration</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($approvedProjects as $approvedProject)
                                <tr>
                                    @if (auth()->user()->id == $approvedProject->user_id)

                                        <td>{{ $approvedProject->id }}</td>
                                        <td>{{ $approvedProject->title }}</td>
                                        <td>{{ $approvedProject->category->name }}</td>
                                        <td>{{ $approvedProject->budget . "$" }}</td>
                                        <td>{{ $approvedProject->duration . " Days" }}</td>

                                        @if ($approvedProject->status == '0')
                                            <td><span class="text-primary">Pending</span></td>
                                        @elseif ($approvedProject->status == '1')
                                            <td><span class="text-success">Apprroved</span></td>
                                        @elseif ($approvedProject->status == '2')
                                            <td><span class="text-danger">Canceled</span></td>
                                        @endif
                                        <td>
                                            <div>
                                                <a href="{{route('approvedProjectListShow',$approvedProject->id)}}"
                                                   class="btn btn-primary btn-sm p-2 m-1"><i
                                                        class="fa fa-eye mr-2"></i>View</a>

                                            </div>
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
                <a class="wt-btn" href="{{route('clientDashboard')}}"><i
                        class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </div>
    {{-- pagination --}}
@endSection
