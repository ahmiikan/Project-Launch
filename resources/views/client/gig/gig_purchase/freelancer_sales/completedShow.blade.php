@extends('userDashboard')
@section('content')

    <section class="wt-haslayout wt-dbsectionspace">
        <div class="row d-flex justify-content-center align-content-center">
            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10 ">
                <div class="wt-dashboardbox wt-categorys">
                    <div class="wt-dashboardboxtitle">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <h2>ORDER IS COMPLETED</h2>
                    </div>
                    <div class="wt-dashboardboxcontent ">
                        <div class="row">
                            <div class="col-md-10">
                                <h3>Order # {{$gigSale->order_UID}}</h3>
                                {{-- <p>{{ $gigSale[$i]->first_name }} --}}
                                {{-- 
                                <p>{{$gigSale->status}}</p>
                                <p>{{$gigSale->created_at}}</p>
                                <p>{{$gigSale->updated_at}}</p> --}}
                            </div>
                            <div class="col-md-2">
                                <h3> $ {{$gigSale->gig->amount}}</h3>
                            </div>
                            {{-- <div class="col-md-3">
                                <h3>Order Status</h3>
                                <p>{{$gigSale->purchase_status}}</p>
                            </div> --}}

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-9">
                                <h6> Delivery # {{$gigDelivery->delivery_UID}}</h6>
                            </div>
                            <div class="col-md-3">
                                <h6> Delivery Date: {{$gigDelivery->created_at->format('Y-m-d')}}</h6>
                            </div>
                        </div>
                        <hr>
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
                                    <td>{{ $gigSale->gig->title }}</td>
                                    <td>{{ $gigSale->gig->duration }} days</td>
                                    <td>$ {{ $gigSale->gig->amount }}</td>
                                </tr>

                               
                            </tbody>
                        </table>
                      
                        
                    </div>
                </div>
            </div>
        </div>
                
        
    </section>
      
   
@endsection
