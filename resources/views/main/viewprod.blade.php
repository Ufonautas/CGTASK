@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @php
        $product = $data['product'];
        $havePaid = $data['havePaid'];
        @endphp
        <p class="display-4">{{$product->name}}</p>

        
    </div>
    <div class="jumbotron row d-flex justify-content-center">
            <div class="text-center card row justify-content-center" style="width:500px" >
                    <img class="card-img-top" src="{{$product->image}}" alt="{{$product->name}} image">
                    <div class="card-body">
                      <h4 class="card-title">{{$product->name}}</h4>
                      <p class="card-text">{{$product->description}}</p>
                      @if($havePaid == false)
                      <form action="../../task/checkout/process/{{$product->id}}" method="POST">
                        {!! csrf_field() !!}
                            <script
                              src="https://checkout.stripe.com/checkout.js"
                              class="stripe-button"
                              data-key="pk_test_vPmApjTrUX2iT7PMzg8VIJwy00NSXNEGQa"
                              data-amount="{{$product->price * 100}}"
                             data-name="{{ config('app.name') }}"
                              data-description="{{$product->name}}"
                              data-image="{{$product->image}}"
                              data-locale="auto">
                            </script>
                          </form>
                        @else
                        YOU ALREADY HAVE AN ACTIVE SUBSCRIPTION
                        @endif
                          
                    </div>
            </div>
    </div>
</div>
@endsection
