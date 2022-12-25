@extends('userDashboard')
@section('content')
    <section class="wt-haslayout wt-dbsectionspace">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-12 float-left">
                <form action="{{ route('store-proposal') }}" method="POST"
                      class="wt-formtheme wt-userform wt-userformvtwo"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $project_id }}" name="project_id">

                    <div class="wt-dashboardbox">
                        <div class="wt-dashboardboxtitle">
                            <h2>Send Your Proposal Baby</h2>
                        </div>
                        <div class="wt-dashboardboxcontent">
                            <div class="wt-jobdescription wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>Proposal Details</h2>
                                </div>
                                <div class="form-group form-group-full">
                                    <label for="budget">Price $</label>
                                    <input type="number" step="0.01" min="1" name="price"
                                           class="form-control @error('price') is-invalid @enderror"
                                           placeholder="Enter Your Gig's Price" value="" required
                                           :value="old('price')"/>
                                    @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="form-group form-group-full">
                                    <span>
                                        <label for="duration">Duration (Days)</label>
                                        <input type="number" min="1" name="days"
                                               class="form-control @error('days') is-invalid @enderror"
                                               placeholder="in days"
                                               required :value="old('days')">
                                    </span>
                                    @error('days')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group form-group-full">
                                    <label for="Attachment">Attachment</label>
                                    <div class="custom-file mb-3">
                                        <input type="file"
                                               class="h-100 custom-file-input @error('attachment') is-invalid @enderror"
                                               id="customFile" accept="application/pdf" name="attachment" required
                                               :value="old('attachment')">
                                        <label class="custom-file-label" for="customFile">Attachment</label>
                                        @error('attachment')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="wt-jobdetails wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>Proposal Description</h2>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description"
                                              placeholder="Your Gig Description Here" minlength="10" maxlength="255"
                                              class="form-control @error('description') is-invalid @enderror" rows="5"
                                              required :value="old('description')"></textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wt-updatall">
                        <i class="ti-announcement"></i>
                        <span>Send Proposal by just clicking on “Send” button.</span>

                        <button class="wt-btn mr-4">Send</button>
                        <span>
                            <a href="{{ route('projectList') }}" class="btn btn-primary ml-5"><i
                                    class="fa fa-arrow-left"></i>
                                Back</a>
                        </span>

                    </div>
                </form>

            </div>
        </div>

    </section>
@endsection
