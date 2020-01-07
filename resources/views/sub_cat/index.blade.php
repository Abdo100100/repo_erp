@extends('layouts.master')


@section('content')


@include('layouts.flash')


<center>
  <br>
<form method="POST" action="{{ route('sub_cat.store') }}">

        {{ csrf_field() }}

  <input type="text" name="name">

  <input type="submit" name="Add" value="اضافة">

</form>
  
  <br>

  <br>
<div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">الفئات الفرعيه</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>الاسم </th>
                      <th style="width: 40px">التحكم</th>
                    </tr>
                  </thead>
                  <tbody>
@foreach($var as $r)

                    <tr>
                      <td>{{ $r->id }}.</td>
                      <td>{{ $r->sub_cat_name }}</td>
                      <td>



    <form method="POST" action="{{route('sub_cat.destroy',$r->id)}}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
                        <input class="btn btn-danger" type="submit" name="" value="حذف">
                      </form></td>

                    </tr>
@endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
             
            </div>
            <!-- /.card -->



          </div>
</center>
            @endsection