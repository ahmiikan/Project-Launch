@extends('userDashboard')
@section('content')

    <section class="wt-haslayout wt-dbsectionspace">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 float-left">
                <div class="wt-dashboardbox">
                    <div class="wt-dashboardboxtitle">
                        <h2>DELIVER YOUR ORDER<i class="fas fa-jedi-order"></i></h2>
                    </div>
                    <div class="wt-dashboardboxcontent">
                        
                            <fieldset>
                                <div class="form-group">
                                    
                                    <span class="form-group-title">Final Delivery File <span class="text-danger">*</span></span>
                                    {{-- show attachment with downloadable button --}}
                                    @if (isset($gigPurchase->final_delivery_file))
                                        
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
                        <h2>ORDER IN PLACED</h2>
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
                        <div class="row m-3 d-flex justify-content-center">
                            <div class="card">
                                
                                <div class="card-body p-3">
                                    <h1 id="counter" class="text-center m-5 m-auto p-3 text-black"></h1>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
                
        
    </section>

    <!-- Script -->
    <script>
        <?php
            $lastDate = $gigPurchase->created_at->addDays($gigPurchase->gig->duration);
            $lastDate = $lastDate->format('Y-m-d H:i:s');
            $lastDate = strtotime($lastDate);
            $now = strtotime(date('Y-m-d H:i:s'));
            $difference = $lastDate - $now;
            $days = floor($difference / (60*60*24) );
            $hours = floor(($difference - $days*60*60*24) / (60*60) );
            $minutes = floor(($difference - $days*60*60*24 - $hours*60*60)/60);
            $seconds = floor(($difference - $days*60*60*24 - $hours*60*60 - $minutes*60));
        ?>
        var days = {{$days}};
        var hours = {{$hours}};
        var minutes = {{$minutes}};
        var seconds = {{$seconds}};
        var counter = document.getElementById("counter");
        var interval = setInterval(function() {
            counter.innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
            seconds--;
            if (seconds < 0) {
                seconds = 59;
                minutes--;
                if (minutes < 0) {
                    minutes = 59;
                    hours--;
                    if (hours < 0) {
                        hours = 23;
                        days--;
                        if (days < 0) {
                            clearInterval(interval);
                            counter.innerHTML = "EXPIRED";
                            return;
                        }
                    }
                }
            }
        }, 1000);
    </script>

   
@endsection
