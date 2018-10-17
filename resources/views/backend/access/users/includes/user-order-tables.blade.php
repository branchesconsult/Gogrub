<div class="table-responsive data-table-wrapper">
    <table id="{!! $tblId !!}" class="table table-condensed table-hover table-bordered">
        <thead>
        <tr>
            <th>{{ trans('labels.backend.orders.table.id') }}</th>
            <th>Invoice number</th>
            <th>Chef</th>
            <th>Customer</th>
            <th>Status</th>
            <th>{{ trans('labels.backend.orders.table.createdat') }}</th>
            <th>{{ trans('labels.general.actions') }}</th>
        </tr>
        </thead>
        <thead class="transparent-bg">
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
    </table>
</div><!--table-responsive-->