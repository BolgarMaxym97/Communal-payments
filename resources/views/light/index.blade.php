@extends('welcome')

@section('content')

    <a href="{{route('light.create')}}" class="btn bg-olive btn-flat margin">Создать</a>
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
                                <td>{{ $light->additionalCost }} - {{ $light->cost }}</td>
                                <td>{{ $light->amount }}</td>
                                <td>{{ $light->comment }}</td>
                                <td>
                                    <a href="{{route('light.edit', ['id' => $light->id])}}">
                                        <button type="button" class="btn btn-xs btn-primary"><i class="fa fa-pencil"
                                                                                                aria-hidden="true"></i>
                                        </button>
                                    </a>
                                    <a href="{{route('light.delete', ['id' => $light->id])}}">
                                        <button type="button" class="btn btn-xs btn-danger"><i class="fa fa-trash"
                                                                                               aria-hidden="true"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection