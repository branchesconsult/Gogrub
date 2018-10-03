<div class="box-body">
    <div class="form-group">
        <!-- Create Your Field Label Here -->
        <!-- Look Below Example for reference -->
        {{ Form::label('name', 'Status', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            <select name="orderstatus_id" id="orderstatus_id" class="form-control">
                <option value="">--Select</option>
                @foreach($order_statuses as $key => $val)
                    <option value="{!! $val->id !!}">{!! $val->status !!}</option>
                @endforeach
            </select>
        </div><!--col-lg-10-->
    </div><!--form-group-->
</div><!--box-body-->

@section("after-scripts")
    <script type="text/javascript">
        //Put your javascript needs in here.
        //Don't forget to put `@`parent exactly after `@`section("after-scripts"),
        //if your create or edit blade contains javascript of its own
        $(document).ready(function () {
            //Everything in here would execute after the DOM is ready to manipulated.
        });
    </script>
@endsection
