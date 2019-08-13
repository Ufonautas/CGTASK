@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <p class="display-4">ADMIN PANEL</p>

        
    </div>
    <div class="jumbotron">
            <a href="/controlpanel/createproduct">Create product</a>
            <br>
            <a href="/controlpanel/viewproducts">View products</a>
    </div>
</div>
@endsection
