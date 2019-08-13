@extends('layouts.app')

@section('content')
<link href="{{ asset('css/bootstrap.min/css') }} rel="stylesheet"/>
<div class="container">
    <div class="row justify-content-center">
        <p class="display-4">OUR COURSES</p>

        
    </div>
    <div class="jumbotron">

    <!-- Nav tabs -->
    <ul class="nav nav-pills" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="pill" href="#cg">CG</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#programming">PROGRAMMING</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#craft">CRAFT</a>
        </li>
      </ul>
      
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane container active" id="cg"><br>
                @if(count($data['cg']) > 0)
                <table class="table table-hover">
                <thead>
                    <tr>
                    <th>NAME</th>
                    <th>PRICE</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data['cg'] as $cg)
                <tr>
                <td>{{$cg->name}}</td>
                <td>{{$cg->price}}</td>
                <td><a class='btn btn-light' href='../task/viewproduct/{{$cg->id}}'>VIEW</a></td>
    
                </tr>
                    
                @endforeach
                @else
                We're sorry, we don't have products for this category yet.
                @endif
                </tbody>
            </table>
        </div>
        <div class="tab-pane container fade" id="programming"><br>
            @if(count($data['programming']) > 0)
            <table class="table table-hover">
            <thead>
                <tr>
                <th>NAME</th>
                <th>PRICE</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($data['programming'] as $programming)
            <tr>
            <td>{{$programming->name}}</td>
            <td>{{$programming->price}}</td>
            <td><a class='btn btn-light' href='../task/viewproduct/{{$programming->id}}'>VIEW</a></td>

            </tr>
                
            @endforeach
            @else
            We're sorry, we don't have products for this category yet.
            @endif
        </tbody>
    </table>
        </div>
        <div class="tab-pane container fade" id="craft"><br>
                @if(count($data['craft']) > 0)
                <table class="table table-hover">
                <thead>
                    <tr>
                    <th>NAME</th>
                    <th>PRICE</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data['craft'] as $craft)
                <tr>
                <td>{{$craft->name}}</td>
                <td>{{$craft->price}}</td>
                <td><a class='btn btn-light' href='../task/viewproduct/{{$craft->id}}'>VIEW</a></td>
    
                </tr>
                    
                @endforeach
                @else
                We're sorry, we don't have products for this category yet.
                @endif
            </tbody>
        </table>
        </div>
      </div>

</div>
@endsection
