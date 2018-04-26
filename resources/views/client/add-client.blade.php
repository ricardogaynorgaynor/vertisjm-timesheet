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
    
    
    <form class="c-card__body" method="POST" action="{{ route('client.register') }}" enctype="multipart/form-data">
                {{ csrf_field() }} 

            <h3 style="">Client information</h3>
        
        <div class="c-field u-mb-small">
            <label class="c-field__label" for="input1">Full name</label> 
            <input class="c-input" name="name" value="" type="text" placeholder="" required> 
        </div>

        <div class="c-field u-mb-small">
                <label class="c-field__label" for="input1">Email</label> 
        <input class="c-input" type="email" value="" name="email" placeholder="" required> 
        </div>

        <div class="c-field u-mb-small">
                <label class="c-field__label" for="input1">Company name (optional)</label> 
                <input class="c-input" value="" type="text" name="company" placeholder="" required> 
        </div>

        <div class="c-field u-mb-small">
            <label class="c-field__label" for="input1">Address line 1</label> 
            <input class="c-input" value="" type="text" name="address1" placeholder="" required>
        </div>

        <div class="c-field u-mb-small">
            <label class="c-field__label" for="input1">Address line 2 (optional)</label> 
            <input class="c-input" value="" type="text" name="address2" placeholder="" >
        </div>

        <div class="c-field u-mb-small">
            <label class="c-field__label" for="input1">Country</label> 
            <input class="c-input" value="" type="text" name="country" placeholder="" required>
        </div>

        <div class="c-field u-mb-small">
            <label class="c-field__label" for="input1">Zip code (Optional)</label> 
            <input class="c-input" value="" type="text" name="zipcode" placeholder="" required>
        </div>


        <div class="c-field u-mb-small">
            <label class="c-field__label" for="input1">Home telephone (Optional)</label> 
            <input class="c-input" value="" type="text" name="hometelephone" placeholder="" >
        </div>


        <div class="c-field u-mb-small">
            <label class="c-field__label" for="input1">Work telephone (Optional)</label> 
            <input class="c-input" value="" type="text" name="worktelephone" placeholder="" required> 
    </div>

    <div class="c-field u-mb-small">
        <label class="c-field__label" for="input1">Mobile number (Optional)</label> 
        <input class="c-input" value="" type="text" name="mobile" placeholder="" required>
    </div>



        <br>


        <button class="c-btn c-btn--info " type="submit" name="submit">Save client</button>
        


</div>

<div class=" col-md-3 " style="margin-top:40px;">
<h5>Client Image (optional)</h5>
<img src="{{ asset('images/profile.png') }}" class="img-thumdnail" /><br>
<br>
<input type="file" class="" name="image" /> <br>
</div>

</form>

    </div>



</div>

@endsection