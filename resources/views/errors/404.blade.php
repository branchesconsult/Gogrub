@extends('frontend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ trans('http.404.title') }}</h1>
                <p>{{ trans('http.404.description') }}</p>
            </div>
        </div>
    </div>
@stop
<!-- IE needs 512+ bytes: http://blogs.msdn.com/b/ieinternals/archive/2010/08/19/http-error-pages-in-internet-explorer.aspx -->