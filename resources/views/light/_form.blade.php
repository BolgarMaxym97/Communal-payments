<?php
/** @var \App\Models\News $object */
$object = isset($staff) ? $staff : null;
?>
<div class="row">
    <div class="col-md-7">
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.widgets.form.input', ['name' => 'name', 'label' => 'Имя', 'object' => $object, 'options' => ['required',]])

                @include('admin.widgets.form.tiny', ['name' => 'text', 'label' => 'Контент', 'object' => $object])
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="box box-warning">
            <div class="box-body">
                @include('admin.widgets.form.status', ['status' => old('status', isset($object) ? $object->status : 0)])

                @if(isset($object) && $object->image && $object->imageExists('small'))
                    @include('admin.widgets.form.image', ['big' => $object->showImage('original', null, true), 'preview' => $object->showImage('small', null, true), 'id' => $staff->id, 'model' => $staff->getMorphClass()])
                @else
                    @include('admin.widgets.form.image')
                @endif
            </div>
        </div>
    </div>
</div>
