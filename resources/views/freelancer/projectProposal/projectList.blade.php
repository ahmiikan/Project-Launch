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
                    <h4 class="card-title">Projects</h4>
                    <a class="btn btn-primary btn-group-sm float-right" href="{{ route('create-proposal') }}">Create New
                        Project</a>
                    <h6 class="card-subtitle">List of all Proposals</h6>
                    <div class="table-responsive">
                        <table class="table color-table info-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Project Budget</th>
                                <th>Project Duration</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->budget . "$" }}</td>
                                    <td>{{ $project->duration . '_Days' }}</td>
                                    <td>
                                        <a href="{{ route('showProjectList', $project->id) }}"
                                           class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
