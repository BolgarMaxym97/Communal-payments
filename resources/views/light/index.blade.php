@extends('welcome')

@section('content')

    <a href="{{ route('light') }}" class="btn bg-olive btn-flat margin">Создать</a>
{{--@widget('filter', ['fields' => ['name' => 'name']])--}}
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>Дата</th>
                        <th>Показатели</th>
                        <th>Тариф</th>
                        <th>Сумма</th>
                        <th></th>
                    </tr>
                    {{--  @foreach($areas AS $area)
                          <tr>
                              <td width="50%">{{ $area->name }}</td>
                              <td width="20%"><a href="{{route('admin.providers-regions.edit', ['id' => $area->shopRegion->id])}}">{{ $area->shopRegion->name }}</a></td>
                              <td width="15%">@widget('listButtons', ['routeBase' => 'providers-areas.', 'id' => $area->id, 'view' => false])</td>
                          </tr>
                      @endforeach--}}
                </table>
            </div>
        </div>
    </div>
</div>
@endsection