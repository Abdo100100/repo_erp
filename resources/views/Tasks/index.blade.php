@extends('layouts.master')


@section('content')



<br>
<div class="container">
@include('layouts.flash')

<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">اضافه مهمه جديده</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form"  action="{{ url('store_task') }}" method="post">
                              {{ csrf_field() }}

                  <!-- text input -->
                  <div class="form-group">
                    <label>عنوان المهمه</label>
                    <input name="tit" type="text" class="form-control" >
                  </div>
                

                  <!-- textarea -->
                  <div class="form-group">
                    <label>وصف المهمه </label>
                    <textarea name="desk" class="form-control" rows="3" placeholder="برجاء كتابه وصف مختصر"></textarea>
                  </div>
                 

                  <!-- input states -->
          
                  <div class="form-group has-warning">
                    <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> برجاء اختيار الاشخاص لهذه المهمه</label>
              
<br>
<select multiple name="users[]">
@foreach($var as $v)
  <option value="{{ $v->id }}">{{ $v->name }}</option>

@endforeach
</select>




                    

             
                  </div>


<br>
     <div class="form-group  pull-right">
            

     <input
      type="submit" name="later" class="btn  btn-primary" value="ارسال المهمه">

     </div>
         

                </form>
              </div>
              <!-- /.card-body -->
            </div>

            @endsection