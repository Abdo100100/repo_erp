@extends('layouts.master')


@section('content')
<div class="container">
    <br>
@include('layouts.flash')

<h1>تعديل المقال</h1>

<form  action="{{ url('posts_updata/'.$post->id ) }}" method="post">

        {{ csrf_field() }}

<div class="form-group">
 <label class="" >عنوان المقال</label>

        <input  
         class="form-control" 
         type="text" 
         name="title" 
         value="{{$post->title}}"

         >
     </div>




  <div class="form-group">
    <label class="" >المحتوى</label>
    <textarea class="ckeditor" name="body" >{{ $post->body }}</textarea>
 </div>






@if(Auth::user()->status != 3)

     <div class="form-group  pull-right">
            

     <input
      type="submit" name="later" class="btn  btn-primary" value="later">

     </div>


     <div       style="margin-right: 30px;"

        class="form-group  pull-right">
            
     <input type="submit" name="Save-later" class="btn  btn-primary" value="Save Now">

     </div>

@endif

      


@if(Auth::user()->status == 3)

<input type="submit" name="save" class="btn  btn-primary" value="publish">

@endif

</form>
</div>
@endsection