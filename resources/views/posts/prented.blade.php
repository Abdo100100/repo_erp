@extends('layouts.master')


@section('content')



<br>
<div class="container">
@include('layouts.flash')



<hr>
@if( $var->count() > 0 )

@foreach($var as $v)
<div class="">
   <div class="card-header">
   	<h3>
   	<a href="show/{{ $v->id }}">   
   		{{ $v->title }} 
    </a>
   	</h3>
   </div>


   <div class="card-footer">
     <span class="badge badge-success">{{ $v->created_at }}</span>




     @if($v->isSave == 2)

       <span class="badge  badge-info">محفوظ لوقت لاحق</span>

      
     @elseif($v->isActive == 2)
 

      <span class="badge  badge-danger">فى قائمه الانتظار</span>


     @elseif($v->isActive == 1)

            <span class="badge  badge-info">Activted</span>

   @elseif($v->isActive == 4)

            <span class="badge  badge-info">فى مرحله الطباعه</span>


 @elseif($v->isActive == 3)

            <span class="badge  badge-danger">Rejected</span>

     @endif




      @if($v->isRated == 1)

            @if($v->rate == 1)
                 <i class='fa fa-star'></i>
            @endif  


            @if($v->rate == 2)
                <i class='fa fa-star'></i><i class='fa fa-star'></i>
            @endif

            @if($v->rate == 3)
                <i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>
            @endif


            @if($v->rate == 4)
                <i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>
            @endif                     

    
            @if($v->rate == 5)
                 <i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>
            @endif              
          
     @endif



 @if($v->isCorrected == 3)

 <a href="{{ url('prented', $v->id  ) }}" class="btn  btn-info">ارشفه المقال</a>

     @endif



   </div>

</div> 
<br>

<hr>

@endforeach





@else
<div class="alert alert-danger" role="alert"><center> لايوجد مقالات </center></div>
</div>

@endif

@endsection
