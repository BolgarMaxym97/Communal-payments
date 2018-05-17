@extends('welcome')

@section('content')

    <a href="{{route('comunals.create')}}" class="btn bg-olive btn-flat margin">Создать</a>
    {{--@widget('filter', ['fields' => ['name' => 'name']])--}}
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Дата</th>
                            <th>Сумма</th>
                            <th>Комментарий</th>
                            <th></th>
                        </tr>
                        @foreach($comunals AS $comunal)
                            <tr>
                                <td>{{ $comunal->created_at }}</td>
                                <td>{{ $comunal->amount }}</td>
                                <td>{{ $comunal->comment }}</td>
                                <td>
                                    <a href="{{route('comunals.edit', ['id' => $comunal->id])}}">
                                        <button type="button" class="btn btn-xs btn-primary"><i class="fa fa-pencil"
                                                                                                aria-hidden="true"></i>
                                        </button>
                                    </a>
                                    <a href="{{route('comunals.delete', ['id' => $comunal->id])}}">
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