@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <p class="display-4">My subscriptions</p>

        
    </div>
    <div class="jumbotron">
            @if(count($subs) > 0)
            Current time: {{\Carbon\Carbon::now()}}
            <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Plan ID</th>
                        <th>ACTIVE UNTIL</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($subs as $sub)
                        @if(\Carbon\Carbon::parse($sub->activeUntil) <= \Carbon\Carbon::now())
                        <tr class='bg-warning'>
                        @else
                        <tr class='bg-success'>
                        @endif
                            <td>{{$sub->planid}}</td>
                            <td>{{$sub->activeUntil}}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            Nothing to show
            @endif
    </div>
</div>
@endsection
