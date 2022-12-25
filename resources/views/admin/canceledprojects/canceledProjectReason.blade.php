@extends('userDashboard')
@section('content')

    <div class="wt-jobdetails wt-tabsinfo">
        <div class="wt-tabscontenttitle">
            <h2>Project Cancel Description</h2>
        </div>
        <div class="form-group">
            <form action="{{route('projectCanceled',$project->id)}}" method="GET">
                <label for="description">Reason</label>
                <textarea name="message" id="description" minlength="10" maxlength="255"
                          placeholder="Enter Project Cancel Reason "
                          maxlength="255" class="form-control @error('message') is-invalid @enderror" rows="5" required
                          :value="old('message')"></textarea>
                @error('message')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="wt-rightarea ">
            <a class="wt-btn" href="{{url()->previous()}}"><i
                    class="fa fa-arrow-left"></i>Back</a>
        </div>
        <button class="wt-btn mr-4 wt-rightarea">Send</button>
    </div>
@endsection
