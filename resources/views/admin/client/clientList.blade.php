@extends('userDashboard')
@section('content')
    <style>
        .cardHeading {
            color: #f05f40;
        }
    </style>

    <div class="m-5">
        <h2 class="cardHeading m-4">List of All Users</h2>
        <div class="row">
            <div class="col-lg-12">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @elseif(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Client Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Country</th>
                        <th>Delete</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->first_name . ' ' . $client->last_name }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->gender }}</td>
                            <td>{{ $client->country->name }}</td>

                            <td>
                                <form action="{{ route('deleteUserbyAdmin', $client->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure to Delete this user?')">Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <nav class="wt-pagination wt-savepagination">
            <ul>
                <li> {!! $clients->links() !!}</li>
            </ul>

        </nav>
        <div class="wt-rightarea ">
            <a class="wt-btn" href="{{route('adminDashboard')}}"><i
                    class="fa fa-arrow-left"></i>Back</a>
        </div>

    </div>

    <hr>
@endsection
