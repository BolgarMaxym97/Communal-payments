@extends('welcome')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-money"></i>

                    <h3 class="box-title">Суммы платежей за все время: <span style="color: red"><?= $total ?> грн.</span>
                    </h3>
                </div>
                <div class="box-body" style="margin: auto;">
                    <div class="row ">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-2 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?= $totalSums['water']?> грн.</h3>

                                    <p><span class="badge bg-black-active color-palette">Вода</span></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-tint"></i>
                                </div>
                                <a href="{{route('water.index')}}" class="small-box-footer">Перейти <i
                                            class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-2 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3><?= $totalSums['comunal']?> грн.</h3>
                                    <p><span class="badge bg-black-active color-palette">ЖЭК</span></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-fw fa-truck "></i>
                                </div>
                                <a href="{{route('comunals.index')}}" class="small-box-footer">Перейти <i
                                            class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-2 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?= $totalSums['gas']?> грн.</h3>
                                    <p><span class="badge bg-black-active color-palette">Газ</span></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-fw fa-fire "></i>
                                </div>
                                <a href="{{route('gas.index')}}" class="small-box-footer">Перейти <i
                                            class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-2 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3><?= $totalSums['warm']?> грн.</h3>
                                    <p><span class="badge bg-black-active color-palette">Отопление</span></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-fw fa-snowflake-o "></i>
                                </div>
                                <a href="{{route('warms.index')}}" class="small-box-footer">Перейти <i
                                            class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-2 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-olive">
                                <div class="inner">
                                    <h3><?= $totalSums['light']?> грн.</h3>
                                    <p><span class="badge bg-black-active color-palette">Свет</span></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-fw fa-lightbulb-o"></i>
                                </div>
                                <a href="{{route('light.index')}}" class="small-box-footer">Перейти <i
                                            class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-money"></i>

                    <h3 class="box-title">Последние платежи: <span style="color: red"><?= $totalMouth; ?> грн.</span>
                    </h3>
                </div>
                <div class="box-body" style="margin: auto;">
                    <div class="row ">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-2 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?= $last['water']?> грн.</h3>

                                    <p><span class="badge bg-black-active color-palette">Вода</span></p>
                                    <p>Текущие: <?= $last['waterLastValue']?></p>
                                    <p>Предыдущие: <?= $last['waterPrevValue']?></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-fw fa-tint"></i>
                                </div>
                                <a href="{{route('water.index')}}" class="small-box-footer">Перейти <i
                                            class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-2 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3><?= $last['comunal']?> грн.</h3>

                                    <p><span class="badge bg-black-active color-palette">ЖЭК</span></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-fw fa-truck"></i>
                                </div>
                                <a href="{{route('comunals.index')}}" class="small-box-footer">Перейти <i
                                            class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-2 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?= $last['gas']?> грн.</h3>

                                    <p><span class="badge bg-black-active color-palette">Газ</span></p>
                                    <p>Текущие: <?= $last['gasLastValue']?></p>
                                    <p>Предыдущие: <?= $last['gasPrevValue']?></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-fw fa-fire"></i>
                                </div>
                                <a href="{{route('gas.index')}}" class="small-box-footer">Перейти <i
                                            class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-2 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3><?= $last['warm']?> грн.</h3>

                                    <p><span class="badge bg-black-active color-palette">Отопление</span></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-fw fa-snowflake-o"></i>
                                </div>
                                <a href="{{route('warms.index')}}" class="small-box-footer">Перейти <i
                                            class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-2 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-olive">
                                <div class="inner">
                                    <h3><?= $last['light']?> грн.</h3>

                                    <p><span class="badge bg-black-active color-palette">Свет</span></p>
                                    <p>Текущие: <?= $last['lightLastValue']?></p>
                                    <p>Предыдущие: <?= $last['lightPrevValue']?></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-fw fa-lightbulb-o "></i>
                                </div>
                                <a href="{{route('light.index')}}" class="small-box-footer">Перейти <i
                                            class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop