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
                <form class="wt-formtheme wt-formbanner wt-formbannervtwo wt-rightarea" method="GET">
                    <fieldset>
                        <div class="form-group">
                            <input type="text" name="search" class="form-control"
                                   value="{{ request()->get('search') }}" placeholder="Search By Title">
                            <div class="wt-formoptions">
                                <button class="wt-searchbtn"><i class="lnr lnr-magnifier"></i></button>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Country</th>
                        <th>Role</th>
                        <th>Delete</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->country->name }}</td>
                            @foreach ($user->roles as $role)
                                <td><label>{{ $role->role_name }}</label></td>
                            @endforeach
                            <td>
                                <form action="{{ route('deleteUserbyAdmin', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure to delete this user?')">Delete
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
                <li> {!! $users->links() !!}</li>
            </ul>

        </nav>

        <div class="wt-rightarea ">
            <a class="wt-btn" href="{{route('adminDashboard')}}"><i
                    class="fa fa-arrow-left"></i>Back</a>
        </div>
    </div>

    <hr>
@endsection
