<div class="form-group">
    {!! Form::label('status', 'Статус') !!}
    <div class="radio">
        <label>{!! Form::radio('status', 0, isset($status) && !$status, ['class' => 'minimal']) !!} Неопубликовано</label>
    </div>
    <div class="radio">
        <label>{!! Form::radio('status', 1, !isset($status) || $status, ['class' => 'minimal']) !!} Опубликовано</label>
    </div>
</div>