@if($status == true)
    <a href="#" class="label label-success change-status" data-table="{{ $table }}" data-id="{{ $id }}"><i class="fa fa-check"></i></a>
@else
    <a href="#" class="label label-danger change-status" data-table="{{ $table }}" data-id="{{ $id }}"><i class="fa fa-close"></i></a>
@endif