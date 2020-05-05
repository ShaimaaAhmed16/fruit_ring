<div class="form-group ">
    <label for="full_name">اسم المستخدم </label>
    {!!  Form::text('full_name',null,[
        'class'=>'form-control text-right',"value"=>"{{old('full_name')}}"
    ]) !!}
    <label for="phone">رقم الهاتف</label>
    {!!  Form::text('phone',null,[
        'class'=>'form-control text-right',"value"=>"{{old('phone')}}"
    ]) !!}

    <label for="email">البريد</label>
    {!!  Form::text('email',null,[
        'class'=>'form-control text-right',"value"=>"{{old('email')}}"
    ]) !!}

    <label for="password">كلمه السر</label>
    <input type="password" name="password" class="form-control text-right" >
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit">حفظ</button>
</div>