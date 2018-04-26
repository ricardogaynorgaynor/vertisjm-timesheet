@extends('layouts.app')

@section('content')





<div class="c-intro-card c-card col-md-10 " style="margin:0 auto;margin-top:10px;">

    <div class="row">

<div class="col-md-7 ">

        @if(count($errors) > 0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
            <li class="list-group-item text-danger">{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    
    
    <form class="c-card__body" method="POST" action="{{ route('employee.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }} 

            <h3 style="">Employee information</h3>
        
        <div class="c-field u-mb-small">
            <label class="c-field__label" for="input1">Full name</label> 
            <input class="c-input" name="name" value="" type="text" placeholder="" required> 
        </div>

        <div class="c-field u-mb-small">
                <label class="c-field__label" for="input1">Email</label> 
        <input class="c-input" type="email" value="" name="email" placeholder="" required> 
        </div>

        <div class="c-field u-mb-medium">
                <label class="c-field__label" for="select3">Single Employee type</label>
                <select class="c-input" required name="employeetype">
                    <option selected disabled>Choose</option>
                    <option value="inoffice">Inoffice</option>
                    <option value="conrtactor">Contractor</option>
                </select>
        </div>

        <div class="c-field u-mb-medium">
                <label class="c-field__label" for="select3">Departmment</label>
                <select class="c-input" required name="department">
                    <option selected disabled>Choose</option>
                    <option value="sales">Sales</option>
                    <option value="marketing">Maketing</option>
                    <option value="hr">HR</option>
                </select>
        </div>



        <br>


        <button class="c-btn c-btn--info " type="submit" name="submit">Save Employee</button>
        


</div>

<div class=" col-md-3 " style="margin-top:40px;">
<h5>Employee Image (optional)</h5>
<img src="{{ asset('images/profile.png') }}" class="img-thumdnail" /><br>
<br>
<input type="file" class="" name="image" /> <br>
</div>

</form>

    </div>



</div>

@endsection