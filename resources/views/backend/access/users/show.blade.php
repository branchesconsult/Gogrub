@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.view'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small> {!! $user->full_name !!}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.users.view') }}</h3>
            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.user-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

            <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#overview" aria-controls="overview" role="tab"
                           data-toggle="tab">{{ trans('labels.backend.access.users.tabs.titles.overview') }}</a>
                    </li>

                    <li role="presentation">
                        <a href="#history" aria-controls="history" onclick="getOrders('chef')"
                           role="tab" data-toggle="tab">
                            Orders as chef
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#order-as-customer" aria-controls="order-as-customer"
                           onclick="getOrders('customer')"
                           role="tab" data-toggle="tab">
                            Orders as customer
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#earnings-tbl" aria-controls="earnings-tbl"
                           role="tab" data-toggle="tab">
                            Earnings
                        </a>
                    </li>
                      <li role="presentation">
                        <a href="#docs-tbl" aria-controls="docs-tbl"
                           role="tab" data-toggle="tab">
                           Documents
                        </a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane mt-30 active" id="overview">
                        @include('backend.access.show.tabs.overview')
                    </div><!--tab overview profile-->

                    <div role="tabpanel" class="tab-pane mt-30" id="history">
                        @include('backend.access.users.includes.user-order-tables', ['tblId' => 'orders-table'])
                    </div><!--tab panel history-->
                    <div role="tabpanel" class="tab-pane mt-30" id="order-as-customer">
                        @include('backend.access.users.includes.user-order-tables', [
                        'tblId' => 'orders-table-customer'
                        ])
                    </div><!--tab panel history-->
                    <div role="tabpanel" class="tab-pane mt-30" id="earnings-tbl">
                        @include('backend.access.users.includes.user-earnings')
                    </div>
                     <div role="tabpanel" class="tab-pane mt-30" id="docs-tbl">
                        @include('backend.access.users.includes.documents')
                    </div>
                </div><!--tab content-->

            </div><!--tab panel-->

        </div><!-- /.box-body -->
    </div><!--box-->
@endsection
@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}
    <script>
        function getOrders(orderFor) {
            var tableToPopulate;
            if (orderFor == 'customer') {
                tableToPopulate = $("#orders-table-customer");
            }
            if (orderFor == 'chef') {
                tableToPopulate = $("#orders-table");
            }
            var dataTable = tableToPopulate.dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.orders.get") }}',
                    type: 'post',
                    data: function (d) {
                        switch (orderFor) {
                            case 'chef':
                                d.for_user = 'chef';
                                break;
                            default:
                                d.for_user = 'customer';
                        }
                        d.user_id = '{!! $user->id !!}';
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'invoice_num', name: 'invoice_num'},
                    {data: 'chef', name: 'chef'},
                    {data: 'customer', name: 'customer'},
                    {data: 'status.status', name: 'status.status'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "desc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                destroy: true,
                buttons: {
                    buttons: [
                        {extend: 'copy', className: 'copyButton', exportOptions: {columns: [0, 1]}},
                        {extend: 'csv', className: 'csvButton', exportOptions: {columns: [0, 1]}},
                        {extend: 'excel', className: 'excelButton', exportOptions: {columns: [0, 1]}},
                        {extend: 'pdf', className: 'pdfButton', exportOptions: {columns: [0, 1]}},
                        {extend: 'print', className: 'printButton', exportOptions: {columns: [0, 1]}}
                    ]
                }
            });
            //dataTable.ajax.reload();
        }
    </script>
@stop