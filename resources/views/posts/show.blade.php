@extends('layouts.master')


@section('content')
   <div class="container">
   	<br>
   	@include('layouts.flash')

   	<br>
<h3>
   		{{ $post->title }} 

</h3>
<p> {!! $post->body !!} </p>

<hr>

@if($post->afile != '' )


<p> حمل الملف المرفق من هنا :</p><a href="{{asset('storage/files/'.$post->afile)}}" download>{{ $post->afile }}</a>




@endif


<!--  check if admin and post is panding -->
@if(Auth::user()->status == 0 && $post->isActive == 2)

<a href="{{ url('posts_active', $post->id  ) }}" class="btn  btn-success">قبول</a>
<br>


<form  action="{{ url('posts_reject') }}" method="post">
	            {{ csrf_field() }}

<label>سبب الرفض</label>
<input type="hidden" name="regcase" value="{{ $post->id }}">
<input type="text" name="case">
<input type="submit" class="btn  btn-danger"  value="رفض"> 
</form>



<br>

 <a href="{{ url('posts_edit', $post->id  ) }}" class="btn  btn-info">تعديل</a>

 
@endif


<!--  check if editor and post is panding -->
@if(Auth::user()->status == 0 && $post->isActive == 3)

<a href="{{ url('posts_active', $post->id  ) }}" class="btn  btn-success">قبول</a>
<br>

 <a href="{{ url('posts_edit', $post->id  ) }}" class="btn  btn-info">تعديل</a>


@endif


<!--  check if editor and post is panding -->
@if(Auth::user()->status == 0 && $post->isActive == 1)


 <a href="{{ url('posts_edit', $post->id  ) }}" class="btn  btn-info">تعديل</a>

<form action="{{ url('delete_post/'.$post->id) }}" method="post" style="display: inline;">
<button  type="submit" class="delete-user btn  btn-danger" >Delete</button>
</form>
@endif



<!--  check if corrector and post is Active -->
<!--  &&$post->isActive == 1
 -->

@if(Auth::user()->status == 2  && $post->isActive != 1)

 <a href="{{ url('posts_edit', $post->id  ) }}" class="btn  btn-info">Edit</a>

<form action="{{ url('delete_post/'.$post->id) }}" method="post" style="display: inline;">
<button  type="submit" class="delete-user btn  btn-danger" >Delete</button>
</form>
@endif




@if(Auth::user()->status == 3  && $post->cor_id != 0)

 <a href="{{ url('posts_edit', $post->id  ) }}" class="btn  btn-info">Edit</a>
<br>

@endif








@if($post->isRated != 1 )

@if(Auth::user()->status == 0 )
@if(Auth::user()->status != 2 )
<div class="col-md-12">
	<div class="form-group">
		<div class="form-group has-success has-feedback">
		    <label for="name">تعليق  :</label>
		    <input type="text" class="form-control" id="name">		    
	  	</div>

		    <input type="hidden" class="form-control" id="id" value="{{$post->id}}">		    
	

	  	<div class='starrr' id='rating-student'></div> 	<br>
	  	<input type="button" id="submit" class="btn btn-success" value="Save Rating">
	  	<div class="msg"></div>
	</div>	
</div>
@endif
@endif

@else

<h2>Retad Details</h2>
<table class="table table-condensed">
	<thead>
	  <tr>
	    <th>Comment</th>
	    <th>Rating</th>
	  </tr>
	</thead>
	<tbody>
	
		<tr>
		  <td>{{$post->comment}}</td>				

		  	@if( $post->rate == 1)
                 <td><i class='fa fa-star'></i></td>
		  	@endif	


		  	@if($post->rate == 2)
                <td><i class='fa fa-star'></i><i class='fa fa-star'></i></td>
		  	@endif

		  	@if($post->rate == 3)
                 <td><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></td>
		  	@endif


		  	@if($post->rate == 4)
                <td><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></td>
		  	@endif		  			  			 

 		
  	        @if($post->rate == 5)
                 <td><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></td>
		  	@endif			  	 		
					
					
	</tbody>
</table>
	
</div>

@endif

 @if($post->isActive == 3)

{{ $post->caser }}
@endif


</div>
@endsection