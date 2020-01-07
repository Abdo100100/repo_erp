@extends('layouts.master')


@section('content')
<div class="container">
    @include('layouts.flash')

<h1>انشاء مقال </h1>

<form action="{{ url('store_post') }}" method="post" enctype="multipart/form-data">


            {{ csrf_field() }}


<div class="form-group">
   <label class="" >عنوان المقال</label>

        <input  
         class="form-control" 
         type="text" 
         name="name" >    
 </div>



<div class="form-group">

<label class="" >الفئه الرئيسيه </label>
<select name="category">
<option> اختار </option>

@foreach($var as $v)
    <option>{{ $v->cat_name }}</option>
@endforeach

</select>
   
</div>




<div class="form-group">

<label class="" >الفئه الفرعيه </label>
<select name="sub_category">


    <option> اختار </option>

@foreach($vu as $vs)
    <option>{{ $vs->sub_cat_name }}</option>
@endforeach

</select>
   
 </div>





<div class="form-group">
   <label class="" >ارفاق ملف </label>

        <input  
         class="form-control" 
         type="file" 
         name="fi" >    
 </div>




     <div class="form-group">
             <label class="" >المحتوى</label>

    <textarea class="ckeditor" name="content"  id="editor"></textarea>

     </div>




     <div class="form-group  pull-right">
            

     <input
      type="submit" name="later" class="btn  btn-primary" value="later">

     </div>


     <div       style="margin-right: 30px;"

        class="form-group  pull-right">
            
     <input type="submit" name="Save-later" class="btn  btn-primary" value="Send Now">

     </div>

</form>
<br>
</div>
@endsection