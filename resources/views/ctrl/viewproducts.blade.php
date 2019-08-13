@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <p class="display-4">ADMIN PANEL</p>

        
    </div>
    <div class="jumbotron">

            @if(count($products) <= 0)
                <p>NO PRODUCTS</p>
            
            @else
            <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>PRICE</th>
                        <th>GROUP</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                @foreach($products as $prod)
                <tr>
                    <td>{{$prod->id}}</td>
                    <td>{{$prod->name}}</td>
                    <td>{{$prod->price}}</td>
                    <td>{{$prod->group}}</td>
                    <td><a class='btn btn-danger' href='/controlpanel/viewproducts/destroy/{{$prod->id}}'>DELETE</a>
                </tr>

                
                @endforeach
            @endif
    </div>
</div>
@endsection
