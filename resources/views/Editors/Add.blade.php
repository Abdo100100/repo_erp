@extends('layouts.master')



@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
       

            
<div class="card">
     <div class="card-header"><strong> اضافه عضو</strong> </div>
                    <div class="card-body">


@include('layouts.flash')


<form action="store" method="post">
        {{ csrf_field() }}

 <div class="form-group row">
   <label class="col-md-3 col-form-label" for="hf-email">الاسم</label>
   <div class="col-md-9">    
     <input  
         class="form-control" 
         type="text" 
         name="name" >
   </div>
</div>


  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="hf-email">الاميل</label>
    <div class="col-md-9">
      <input 
          class="form-control" 
          type="email" 
          name="email" >
    </div>
</div>




  <div class="form-group row">
    <label class="col-md-3 col-form-label" for="hf-email">التصريح</label>
    <div class="col-md-9">
       <select class="form-control" name="status">
          <option value="1">مدير التحرير</option>
          <option value="2">الصحفى </option>
          <option value="3">المصحح</option>
          <option value="4">سكرتير التحرير</option>

        </select>
    </div>
</div>

 <div class="form-group row">
    <label class="col-md-3 col-form-label" for="hf-email">كلمة المرور</label>
    <div class="col-md-9">
        <input 
             class="form-control" 
             type="password" 
             name="pass" >
    </div>
 </div>

 
<br>
<br>
<hr>
<center>
  <input type="submit" value="حفظ" class=" btn btn-lg  btn-primary">
</center>
</form>
   </div>            

</div>











                    

                  </div>


        </div>
 
@endsection

@push('css')

@endpush

@push('js')

@endpush
