<div class="form-group ">
    <label for="name">اسم التصنيف</label>
    {!!  Form::text('name',null,[
        'class'=>'form-control text-right',"value"=>"{{old('name')}}"
    ]) !!}

</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit">حفظ</button>
</div>