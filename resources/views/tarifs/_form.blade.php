<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="value">Сумма
                        <input type="text" class="form-control" name="value" value="{{isset($object) ? $object->value : ''}}">
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
