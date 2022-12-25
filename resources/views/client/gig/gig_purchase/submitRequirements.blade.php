@extends('userDashboard')
@section('content')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <section class="wt-haslayout wt-dbsectionspace wt-proposals">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-7">
                <div class="wt-dashboardbox ">
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('error') }}</p>
                        </div>
                    @endif

                    <div class="wt-dashboardboxtitle mb-2">
                        <h2>Purchase Gig</h2>
                    </div>
                    <div class="panel panel-default ">
                        <div class="panel-heading">
                            <div class="row text-center">
                                <h3 class="panel-heading">Submit Requirements</h3>
                            </div>
                        </div>
                        <div class="panel-body">

                            <form action="{{ route('gigRequirements', $o_UID ) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class='form-row row'>
                                    <div class='col-xs-9 form-group required'>


                                        <h4>Please give some details about requirements </h4>

                                        <label class='control-label'>Requirements</label><br>
                                        <textarea name="requirements" id="" cols="65" rows="20"></textarea>
                                    </div>
                                </div>
                                <div class="form-group form-group-half">
                                    <label for="Attachment">Attachment</label>
                                    <div class="custom-file mb-3">
                                        <input type="file"
                                               class="h-100 custom-file-input @error('attachment') is-invalid @enderror"
                                               id="customFile" accept="application/pdf" name="attachment" required>
                                        <label class="custom-file-label" for="customFile">Attachment</label>
                                        @error('attachment')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xs-12">
                                        <button type="submit" class="btn btn-danger btn-lg ">Place Order</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-5 col-xl-5">
                <aside id="wt-sidebar" class="wt-sidebar wt-dashboardsave">
                    <div class="wt-managejobcontent">
                        <div class="wt-userlistinghold wt-featured wt-proposalitem">
                            <span class="wt-featuredtag"><img src="{{ asset('assets/images/featured.png') }}"
                                                              alt="img description" data-tipso="Plus Member"
                                                              class="template-content tipso_style mCS_img_loaded"></span>
                            <figure class="wt-userlistingimg">
                                <img src="{{ asset('assets/images/user/userlisting/img-02.jpg') }}"
                                     alt="Freelancer Image"
                                     class="mCS_img_loaded">

                            </figure>
                            <h5>
                                {{ $gig->title }}
                            </h5>

                            <div class="wt-proposalfeedback mt-3">
                                <div class="container-fluid">
                                    <div class="row mt-3">
                                        <span class="col-4 ml-5 mr-5 "><label>Gig Price</label></span>
                                        <span class="col-4 ml-5"><label>$ {{ $gig->amount }}</label></span>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <span class="col-4 ml-5 mr-5 "><label>Service Fee <i
                                                    class="fa fa-question-circle template-content tipso_style mCS_img_loaded"
                                                    aria-hidden="true" data-tipso="10% Service Fee"></i></label></span>
                                        <span class="col-4 ml-5"><label>{{ $gig->gig_commission }} % </label></span>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <span class="col-4 ml-5 mr-5 ">
                                            <h5><label>Total</label></h5>
                                        </span>
                                        <span class="col-4 ml-5">
                                            <h5><label>$ {{ $gig->gig_amount_after_commission }}</label></h5>
                                        </span>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <span class="col-4 ml-5 mr-5 "><label>Delivery Time</label></span>
                                        <span class="col-4 ml-5"><label>{{ $gig->duration }} Days</label></span>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>


    </section>
@endsection
