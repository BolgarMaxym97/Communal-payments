@extends('welcome')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Тариф</th>
                            <th>Сумма</th>
                            <th></th>
                        </tr>
                        @foreach($tarifs AS $tarif)
                            <tr>
                                <td>{{ $tarif->slug }}</td>
                                <td>{{ $tarif->value }}</td>
                                <td>
                                    <a href="{{route('tarifs.edit', ['id' => $tarif->id])}}">
                                        <button type="button" class="btn btn-xs btn-primary"><i class="fa fa-pencil"
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