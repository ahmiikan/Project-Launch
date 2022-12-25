@extends('userDashboard')

@section('content')
    <div class="container contact-form">

        <form action="{{ route('gigs.update', $gig->id) }}" method="post">
            @csrf
            @method('PUT')
            @if ($errors->any())
                {{ implode('', $errors->all('<div>:message</div>')) }}
            @endif
            <section class="wt-haslayout wt-dbsectionspace">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-12 float-left">

                        <div class="wt-dashboardbox">
                            <div class="wt-dashboardboxtitle">
                                <h2>Edit Your Gig Baby</h2>
                            </div>
                            <div class="wt-dashboardboxcontent">
                                <div class="wt-jobdescription wt-tabsinfo">
                                    <div class="wt-tabscontenttitle">
                                        <h2>Gig Details</h2>
                                    </div>

                                    <div class="form-group">
                                        <label for="budget">Gig Title</label>

                                        <input type="text" name="title" minlength="5" maxlength="70"
                                               class="form-control @error('title') is-invalid @enderror"
                                               placeholder="Your Gig Title here" value="{{ $gig->title }}"
                                               :value="old('title')"/>
                                        @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="form-group form-group-full">
                                        <label for="budget">Gig Price</label>
                                        <input type="number" step="0.01" min="1" name="amount"
                                               class="form-control @error('amount') is-invalid @enderror"
                                               placeholder="Enter Your Gig's Price" value="{{ $gig->amount }}"
                                        />
                                        @error('amount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div class="form-group form-group-full">
                                        <label for="duration">Gig Duration</label>
                                        <input type="number" step="1" min="1" name="duration"
                                               class="form-control @error('duration') is-invalid @enderror"
                                               placeholder="Enter Your Gig's Duration" value="{{ $gig->duration }}"
                                               required
                                               :value="old('duration')"/>
                                        @error('duration')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    <div>
                                        <label for="selectoption">Gig Category</label>
                                        <div class="form-group wt-formwithlabel">

                                            <span class="wt-select">
                                                <select class=" @error('category_id') is-invalid @enderror"
                                                        data-live-search="true" name="category_id" id="category">
                                                    <option value="{{ $gigCategory->id }}" selected>{{ $gigCategory->name }}
                                                    </option>
                                                    @foreach ($categories as $category)
                                                        <option
                                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </span>
                                            @error('category_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>

                                        <label for="Attachment">Attachment</label>
                                        <div class="custom-file mb-3">

                                            <input type="file"
                                                   class="custom-file-input @error('image') is-invalid @enderror"
                                                   id="customFile" accept="image/*" name="image"
                                                   value="{{ $gig->image }}">
                                            <label class="custom-file-label" for="customFile">{{ $gig->image }}</label>
                                            @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="wt-jobdetails wt-tabsinfo">
                                        <div class="wt-tabscontenttitle">
                                            <h2>Gig Description</h2>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description"
                                                      placeholder="Your Gig Description Here" minlength="10"
                                                      maxlength="255"
                                                      class="form-control @error('description') is-invalid @enderror"
                                                      rows="5"
                                                      :value="old('description')">{{ $gig->description }}</textarea>
                                            @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wt-updatall">
                                <i class="ti-announcement"></i>
                                <span>Edit Gig by just clicking on "Update" button.</span>
                                <a class="wt-btn" href="{{ route('gigs.index') }}">
                                    Back</a>
                                <button class="wt-btn mr-4">Update</button>

                            </div>

        </form>
    </div>
    </div>
    </div>

    </section>
@endsection
