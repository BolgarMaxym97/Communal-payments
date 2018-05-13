@if($trashed === false && ($view || $delete || $edit))
    @if($view)
        <a type="href" href="{{ route('admin.' . $routeBase . 'show', ['id' => $id]) }}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
    @endif
    @if($edit)
        <a type="href" href="{{ route('admin.' . $routeBase . 'edit', ['id' => $id]) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
    @endif
    @if($delete && Route::has('admin.' . $routeBase . 'destroy'))
        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.' . $routeBase . 'destroy', 'id' => $id], 'accept-charset' => 'UTF-8', 'style' => 'display: inline-block;']) !!}
            <a type="submit" class="btn btn-xs btn-danger confirmation-window" data-message="Вы действительно хотите удалить этот элемент?"><i class="fa fa-trash"></i></a>
        {!! Form::close() !!}
    @endif
@elseif($trashed && Route::has('admin.' . $routeBase . 'restore'))
    {!! Form::open(['method' => 'PUT', 'route' => ['admin.' . $routeBase . 'restore', 'id' => $id], 'accept-charset' => 'UTF-8', 'style' => 'display: inline-block;']) !!}
        <a type="submit" class="btn btn-xs btn-success confirmation-window" data-message="Вы действительно хотите восстановить этот элемент?"><i class="fa fa-mail-reply-all"></i></a>
    {!! Form::close() !!}
    @if(Route::has('admin.' . $routeBase . 'force-delete'))
        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.' . $routeBase . 'force-delete', 'id' => $id], 'accept-charset' => 'UTF-8', 'style' => 'display: inline-block;']) !!}
            <a type="submit" class="btn btn-xs btn-danger confirmation-window" data-message="Вы действительно хотите окончательно удалить этот элемент? Все упоменания о нем будут стерты без возможности восстановить!"><i class="fa fa-trash"></i></a>
        {!! Form::close() !!}
    @endif
@endif