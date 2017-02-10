@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
                @can('edit_show')
                    <a href='#'>Edit the Show</a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
