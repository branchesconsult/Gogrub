<!--Action Button-->
@if( Active::checkUriPattern( 'admin/locations' ) )
    <div class="btn-group">
        <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">Export
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li id="copyButton"><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
            <li id="csvButton"><a href="#"><i class="fa fa-file-text-o"></i> CSV</a></li>
            <li id="excelButton"><a href="#"><i class="fa fa-file-excel-o"></i> Excel</a></li>
            <li id="pdfButton"><a href="#"><i class="fa fa-file-pdf-o"></i> PDF</a></li>
            <li id="printButton"><a href="#"><i class="fa fa-print"></i> Print</a></li>
        </ul>
    </div>
@endif
<!--Action Button-->
<div class="btn-group">
    <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown">Action
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{ route( 'admin.locations.index' ) }}">
                <i class="fa fa-list-ul"></i> {{ trans( 'menus.backend.locations.all' ) }}
            </a>
        </li>
        @if(!$hasLocation)
            @permission( 'create-location' )
            <li>
                <a href="{{ route( 'admin.locations.create' ) }}?chef_id={!! request()->chef_id !!}">
                    <i class="fa fa-plus"></i> {{ trans( 'menus.backend.locations.create' ) }}
                </a>
            </li>
            @endauth
        @endif
    </ul>
</div>
<div class="clearfix"></div>
