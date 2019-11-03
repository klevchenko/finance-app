@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">

        @include('errors')

            <div class="panel panel-default">
                <div class="panel-heading">Home page</div>

                <div class="panel-body">

                @include('transaction.add')
                <span class="sep"></span>
                @include('transaction.all')

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
