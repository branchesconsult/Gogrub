@php
$userMeta= \App\Models\Access\Usermeta\Usermeta::where('user_id',$user->id)->get();
@endphp

<h1>Cnic IMAGES :</h1>
@foreach($userMeta as $key => $value)
@if($value->meta_key=='cnic_image_0' || $value->meta_key=='cnic_image_1')
<a href="{{URL($value->meta_value)}}"><img src="{{URL($value->meta_value)}}" style="width: 30%; height: 50%;"></a>
@endif
@endforeach

<h1>Licence IMAGES :</h1>
@foreach($userMeta as $key => $value)
@if($value->meta_key=='licence_image_0' || $value->meta_key=='licence_image_1')
<a href="{{URL($value->meta_value)}}"><img src="{{URL($value->meta_value)}}" style="width: 30%; height: 50%;"></a>
@endif
@endforeach