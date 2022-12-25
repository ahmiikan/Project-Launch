@extends('userDashboard')
@section('content')

    <section class="wt-haslayout wt-dbsectionspace">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 float-left">
                <div class="wt-dashboardbox">
                    <div class="wt-dashboardboxtitle">
                        <h2>ORDER COMPLETED<i class="fas fa-jedi-order"></i></h2>
                    </div>
                    <div class="wt-dashboardboxcontent">
                        
                            <fieldset>
                                <div class="form-group">
                                    
                                    <span class="form-group-title">Final Delivery File <span class="text-danger">*</span></span>
                                    {{-- show attachment with downloadable button --}}
                                    @if (isset($gigSale->final_delivery_file))
                                        
                                    <div class="form-group">
                                        <a href="{{route('downloadDelivery', $gigDelivery->file)}}" 
                                            class="btn btn-primary" download>Download Attachment</a>
                                        </div>
                                    </div>
                                    @else
                                        <div class="alert alert-danger">Your Order Delivery will be sent soon, work in progress </div>
                                    @endif
                            </fieldset>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-8 float-right">
                <div class="wt-dashboardbox wt-categorys">
                    <div class="wt-dashboardboxtitle">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <h2>ORDER COMPLETED</h2>
                    </div>
                    <div class="wt-dashboardboxcontent ">
                        <div class="row">
                            <div class="col-md-10">
                                <h3>Order # {{$gigPurchase->order_UID}}</h3>
                                {{-- <p>{{$gigSale->order_UID}}</p>
                                <p>{{$gigSale->status}}</p>
                                <p>{{$gigSale->created_at}}</p>
                                <p>{{$gigSale->updated_at}}</p> --}}
                            </div>
                            <div class="col-md-2">
                                <h3> $ {{$gigPurchase->gig->amount}}</h3>
                            </div>
                            {{-- <div class="col-md-3">
                                <h3>Order Status</h3>
                                <p>{{$gigSale->purchase_status}}</p>
                            </div> --}}

                        </div>
                        <table class="wt-tablecategories">
                            <thead>
                                <tr>
                                    <th>Gig Title</th>
                                    <th>Duration</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $gigPurchase->gig->title }}</td>
                                    <td>{{ $gigPurchase->gig->duration }} days</td>
                                    <td>$ {{ $gigPurchase->gig->amount }}</td>
                                </tr>

                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
                
        
    </section>

    
   
@endsection
