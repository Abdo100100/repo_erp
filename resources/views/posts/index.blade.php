@extends('layouts.master')


@section('content')



<br>
<div class="container">
@include('layouts.flash')

@if(Auth::user()->status == 2 )
<a  href="{{ url('create_post') }}" class="btn btn-info" > + انشاء مقال جديد</a>
@endif

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


     <span class="badge  badge-warning"> 
@if($v->user->id == Auth::user()->id )
      by : Me

@else
by : {{ $v->user->name }}

@endif
    </span>







     @if($v->isSave == 2)

       <span class="badge  badge-info">محفوظ لوقت لاحق</span>

      
     @elseif($v->isActive == 2)
 

      <span class="badge  badge-danger">فى قائمه الانتظار</span>


     @elseif($v->isActive == 1)

            <span class="badge  badge-info">Activted</span>

   @elseif($v->isActive == 4)

            <span class="badge  badge-info">تم  التصحيح والنشر</span>


 @elseif($v->isActive == 3)

            <span class="badge  badge-danger">Rejected</span>

     @endif
     <span class="badge  badge-primary">{{ $v->category }}</span>



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

@if(Auth::user()->status == 3  && $v->cor_id == 0)
<a href="correct/{{ $v->id }}" class="btn btn-primary">تصحيح</a>
@endif

@if(Auth::user()->status == 3  && $v->cor_id != 0)

يتم التصحيح بواسطه  : {{ $v->user->name }}

@endif

</div>



</div> 
<br>

<hr>

@endforeach


{{--  --}}


@else
<div class="alert alert-danger" role="alert"><center> OOPS No Posts ...  ! </center></div>
</div>

@endif

@endsection
