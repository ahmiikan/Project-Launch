@extends('userDashboard')
@section('content')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-line-pack: center;
            align-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            min-height: 100vh;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .form-container .field-container:first-of-type {
            grid-area: name;
        }

        .form-container .field-container:nth-of-type(2) {
            grid-area: number;
        }

        .form-container .field-container:nth-of-type(3) {
            grid-area: expirationmonth;
        }

        .form-container .field-container:nth-of-type(4) {
            grid-area: expirationyear;
        }

        .form-container .field-container:nth-of-type(5) {
            grid-area: security;
        }

        .field-container input {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .field-container {
            position: relative;
        }

        .form-container {
            display: grid;
            grid-column-gap: 10px;
            grid-template-columns: auto auto auto;
            grid-template-rows: 90px 90px 100px;
            grid-template-areas: "name name name""number number number""expirationmonth expirationyear security";
            max-width: 400px;
            padding: 2px;
            color: #707070;
        }

        label {
            padding-bottom: 2px;
        }

        input {
            margin-top: 2px;
            padding: 12px;
            font-size: 16px;
            width: 100%;
            border-radius: 3px;
            border: 1px solid #dcdcdc;
        }
    </style>

    <section class="wt-haslayout wt-dbsectionspace wt-proposals">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-7">
                <div class="wt-dashboardbox ">
                    <div class="wt-dashboardboxtitle mb-2">
                        <h2>Confrim & verify</h2>
                    </div>
                    <div class='col-md-9 offset-md-1 d-flex justify-content-center'>

                        <div class="panel panel-default ">
                            <div class="panel-heading">
                                <div class="row text-center">
                                    <h3 class="panel-heading">Payment Details</h3>
                                </div>
                            </div>
                            <div class="panel-body">

                                @if (Session::has('success'))
                                    <div class="alert alert-success text-center">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <p>{{ Session::get('success') }}</p>
                                    </div>
                                @endif
                                <form action="{{ route('gigPaymentStore', $gig->id) }}" method="POST">
                                    @csrf
                                    <div class="form-container">

                                        <div class="field-container">
                                            <label>Card Holder Name</label>
                                            <input type="text" name="card_name" id=""/>
                                        </div>
                                        <div class="field-container">
                                            <label>Card Number</label>
                                            <input id="cardnumber" type="text" name="card_number">
                                        </div>
                                        <div class="field-container">
                                            <label>CVC</label>
                                            <input id="securitycode" type="text" name="card_cvc">
                                        </div>
                                        <div class="field-container">
                                            <label>Exp Month</label>
                                            <input id="expirationmonth" class='card-expiry-month' type="text"
                                                   name="card_exp_month">
                                        </div>
                                        <div class="field-container">
                                            <label>Exp Year</label>
                                            <input id="expirationyear" type="text" name="card_exp_year">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button type="submit" class="btn btn-danger btn-lg btn-block">Pay Now
                                                $ {{ $gig->gig_amount_after_commission }}</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
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
