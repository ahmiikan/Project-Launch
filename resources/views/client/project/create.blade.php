@extends('userDashboard')

@section('content')
    <section class="wt-haslayout wt-dbsectionspace">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9 float-left">
                <form action="{{ route('projects.store') }}" method="POST"
                      class="wt-formtheme wt-userform wt-userformvtwo"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="wt-dashboardbox">
                        <div class="wt-dashboardboxtitle">
                            <h2>Post a Project</h2>
                        </div>
                        <div class="wt-dashboardboxcontent">
                            <div class="wt-jobdescription wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>Project Details</h2>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" value=""
                                           placeholder="Project Title" required :value="old('title')">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group form-group-half">
                                    <label for="budget">Project Budget</label>
                                    <input type="number" step="0.01" min="1" name="budget"
                                           class="form-control  @error('budget') is-invalid @enderror"
                                           placeholder="Enter Budget" required :value="old('budget')">
                                    @error('budget')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group form-group-half">
                                    <span>
                                        <label for="duration">Duration:</label>
                                        <input type="number" min="1" name="duration"
                                               class="ml-1 form-control @error('duration') is-invalid @enderror"
                                               placeholder="in days" required :value="old('duration')">
                                    </span>
                                    @error('duration')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group form-group-half wt-formwithlabel">
                                    <span class="wt-select" id="category">
                                        <label for="selectoption">Category:</label>
                                        <select name="category" class="@error('category') is-invalid @enderror"
                                                :value="old('category')">

                                            <option value="" disabled selected> Choose Project Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                    @error('category')
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
                                    <h2>Project Description</h2>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                              placeholder="Add Project Detail Here"
                                              name="description" :value="old('description')"></textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wt-updatall">
                        <i class="ti-announcement"></i>
                        <span>Post Project by just clicking on “Post Project Now” button.</span>
                        <button class="wt-btn mr-4">Post Project Now</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>
@endsection
