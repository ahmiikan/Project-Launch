@extends('userDashboard')
@section('content')
    <div class="card mb-3" style="max-width: 800px;">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-body">
                        <h3><label for="price">Price</label></h3>
                        <hr>

                        <h5 class="card-title">{{ $proposal->price . " $" }}</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <h3><label for="description">Description</label></h3>
                        <hr>
                        <p>{{ $proposal->description }}</p>
                        <hr>

                        <h3><label for="duration">Duration</label></h3>
                        <hr>

                        <h5 class="card-title">{{ $proposal->days . ' Days' }}</h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
