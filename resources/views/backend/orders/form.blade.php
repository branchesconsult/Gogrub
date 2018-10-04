<div class="box-body">
    <div class="form-group">
        <!-- Create Your Field Label Here -->
        <!-- Look Below Example for reference -->
        {{ Form::label('name', 'Status', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            <select name="orderstatus_id" id="orderstatus_id" class="form-control">
                <option value="">--Select</option>
                @foreach($order_statuses as $key => $val)
                    <option {!! ($val->id == $order->orderstatus_id) ? 'selected':'' !!} value="{!! $val->id !!}">
                        {!! $val->status !!}
                    </option>
                @endforeach
            </select>
        </div><!--col-lg-10-->
    </div><!--form-group-->
</div><!--box-body-->

@section("after-scripts")
    <script type="text/javascript">
        $(document).ready(function () {

        });
    </script>
@endsection
