@extends('userDashboard')
@section('content')

    <section class="wt-haslayout wt-dbsectionspace">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 float-left">
                <div class="wt-dashboardbox">
                    <div class="wt-dashboardboxtitle">
                        <h2>DELIVER AGAIN<i class="fas fa-jedi-order"></i></h2>
                    </div>
                    <div class="wt-dashboardboxcontent">
                        <form action="{{route('gigDelivery',$gigSale->id)}}"
                            class="wt-formtheme wt-formprojectinfo wt-formcategory" method="POST">
                            @csrf
                            <fieldset>
                                <div class="form-group">
                                    
                                    <span class="form-group-title">Final Delivery File <span class="text-danger">*</span></span>
                                    <input type="file" name="file" class="form-control mt-2" required
                                        @error('final_delivery_file') is-invalid
                                        
                                    @enderror
                                        placeholder="Final Delivery File" required value="{{ @old('final_delivery_file') }}">
                                    @error('final_delivery_file')
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
                        <h2>ORDER IS DELIVERED</h2>
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
                        </div>
                        <hr>
                        @if (isset($gigDelivery))
                            <div class="row">
                                <div class="col-md-9">
                                        
                                    <h6> Delivery # {{$gigDelivery->delivery_UID}}</h6>
                                </div>
                                <div class="col-md-3">
                                    <h6> Delivery Date: {{$gigDelivery->created_at->format('Y-m-d')}}</h6>
                                </div>
                            </div>
                        @endif
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
                        {{-- <div class="row m-3 d-flex justify-content-center">
                            <div class="card">
                                
                                <div class="card-body p-3">
                                    <h1 id="counter" class="text-center m-5 m-auto p-3 text-black"></h1>
                                </div>
                            </div>
                        </div> --}}
                        
                    </div>
                </div>
            </div>
        </div>
                
        
    </section>
      
   
@endsection
