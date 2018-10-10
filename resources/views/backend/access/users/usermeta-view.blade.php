@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.edit'))

@section('page-header')
    <h1>
        Chef meta
        <small>{!! $user->full_name .' - '.$user->phone  !!}</small>
    </h1>
@endsection

@section('content')
    <div class="box-body">
        <div class="panel panel-default">
            <div class="panel-heading">CNIC</div>
            <div class="panel-body">
                @foreach($meta_array['cnic_image']  as $key => $val)
                    <div class="col-md-6">
                        <img src="{!! $val !!}" class="img-responsive img-thumbnail img-preview"/>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Kitchen images</div>
            <div class="panel-body">
                @foreach($meta_array['kitchen_image']  as $key => $val)
                    <div class="col-md-6">
                        <img src="{!! $val !!}" class="img-responsive img-thumbnail img-preview"/>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection