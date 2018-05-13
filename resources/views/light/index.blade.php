@extends('welcome')

@section('content')

    <a href="" class="btn bg-olive btn-flat margin">Создать</a>
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
                        <th>Комментарий</th>
                        <th></th>
                    </tr>
                      @foreach($lights AS $light)
                          <tr>
                              <td>{{ $light->created_at }}</td>
                              <td>{{ $light->value }}</td>
                              <td>{{ $light->cost }}</td>
                              <td>{{ $light->amount }}</td>
                              <td>{{ $light->comment }}</td>
                              <td></td>
                          </tr>
                      @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection