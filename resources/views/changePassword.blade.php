@extends('userDashboard')

@section('content')
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Change Password</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('changepassword') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control" id="current_password"
                                           name="current_password" placeholder="Current Password"
                                           placeholder="Current Password">
                                    <br>
                                    @error('current_password')
                                    <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password"
                                           placeholder="New Password">
                                    @error('new_password')
                                    <div class="alert alert-danger">{{ $message }} </div>
                                    @enderror

                                    @if (session()->has('danger'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('danger') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="new_password_confirmation">Confirm New Password</label>
                                    <input type="password" class="form-control" id="new_password_confirmation"
                                           name="new_password_confirmation" placeholder="Confirm New Password">
                                    @error('new_password_confirmation')
                                    <small class="alert alert-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
