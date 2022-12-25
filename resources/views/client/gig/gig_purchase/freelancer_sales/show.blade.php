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
                        <form action="{{route('gigDelivery',$gigSale->id)}}"
                            class="wt-formtheme wt-formprojectinfo wt-formcategory" method="POST" enctype="multipart/form-data">
                            @csrf
                            <fieldset>
                                <div class="form-group">
                                    
                                    <span class="form-group-title">Final Delivery File <span class="text-danger">*</span></span>
                                    <input type="file" name="attachment" class="form-control mt-2 @error('attachment') is-invalid @enderror" required placeholder="Final Delivery File" required value="{{ @old('attachment') }}" />
                                       
                                    @error('attachment')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <span class="form-group-title">Instructions (Optional)</span>
                                    <textarea name="instructions" class="form-control mt-2"
                                        rows="5"
                                        @error('instructions') is-invalid
                                    @enderror
                                        placeholder="Please give instructions about delivery if necessary" value="{{ @old('instructions') }}"></textarea>
                                    @error('instructions')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group wt-btnarea d-flex justify-content-center mt-3">
                                        <button type="submit" class="wt-btn">Send</a>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
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
                        <h2>ORDER IN PROGRESS DELIVER SOON</h2>
                    </div>
                    <div class="wt-dashboardboxcontent ">
                        <div class="row">
                            <div class="col-md-10">
                                <h3>Order # {{$gigSale->order_UID}}</h3>
                                {{-- <p>{{$gigSale->order_UID}}</p>
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
            $lastDate = $gigSale->created_at->addDays($gigSale->gig->duration);
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
