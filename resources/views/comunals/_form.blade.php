<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="value">Сумма
                        <input type="text" class="form-control" name="amount" value="{{isset($tarif) ? $tarif->value : ''}}">
                    </label>
                </div>
                <div class="form-group">
                    <label> Комментарий
                        <textarea type="text" class="form-control" name="comment" cols="30" rows="7">{{isset($object) ? $object->comment : ''}}</textarea>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
