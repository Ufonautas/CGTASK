@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <p class="display-4">ADMIN PANEL</p>

        
    </div>
    <div class="jumbotron">
        {{ Form::open(['action' => 'adminController@store', 'method' => 'PUT']) }}
            <div class="form-group">
                {{Form::label('name', 'name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'MY-PRODUCT'])}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'description')}}
                {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'THIS IS MY PRODUCT'])}}
            </div>
            <div class="form-group">
                {{Form::label('imgUrl', 'image url')}}
                {{Form::text('imgUrl', '', ['class' => 'form-control', 'placeholder' => 'https://placekitten.com/200/300'])}}
            </div>
            <div class="form-group">
                {{Form::label('price', 'price')}}
                {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => '123.45'])}}
            </div>     
            <div class="form-group">
                {{Form::label('group', 'group')}}
                {{Form::select('group', array('CG' => 'CG', 'PROGRAMMING' => 'PROGRAMMING', 'CRAFT' => 'CRAFT'))}}
            </div>
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
                {{ Form::close() }}
    </div>
</div>

@endsection
