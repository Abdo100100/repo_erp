@extends('layouts.master')



@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="">

            <div class="card-body">
 
@include('layouts.flash')
    

                    <div class="card-header">
                      
                        <i class="fa fa-align-justify"></i>  All Users
                        <a  href="{{ url('Add') }}">+ Add New </a>

                    </div>

                    <div class="card-body">


                      <table class="table table-responsive-sm table-bordered table-striped table-sm">
                        <thead>
                          <tr>
                            <th>الاسم </th>
                            <th>البريد الالكترونى</th>
                            <th>تاريخ الاضافه</th>
                            <th> عدد المقالات</th>
                            <th> التقييم العام</th>
                            <th>الصلاحيه</th>
                            <th>تحكم</th>
                          </tr>
                        </thead>
                        <tbody>

@foreach($var as $v)
        <tr>
                            <td>{{ $v->name }}</td>
                            <td>{{ $v->email }}</td>

                            <td>{{ $v->created_at}}</td>
                            <td>{{ $v->posts_count }}</td>
                            <td>*****</td>


                @if($v->status ==0)
                <td><span class="badge badge-success">المدير</span></td>


                @elseif($v->status ==1)
                <td><span class="badge  badge-warning">مدير التحرير</span></td>


                @elseif($v->status ==2)
                <td><span class="badge badge-secondary">الصحفى</span></td>


                @elseif($v->status ==3)
                <td><span class="badge badge-info">المصحح</span></td>
                

                @elseif($v->status ==4)
                <td><span class="badge badge-dark">سكرتير التحرير</span></td>
                @endif


                            <td>
                                
<a class="btn btn-success" href="#">
<i class="fa fa-search-plus"></i>
</a>

<a class="btn btn-info" href="{{ url('edit/'.$v->id) }}">
<i class="fa fa-edit"></i>
</a>

<a class="btn btn-danger" href="{{ url('delete/'.$v->id) }}">
<i class="fa fa-trash-o"></i>
</a>



</td>

                          </tr>




@endforeach

                  
                         
                    
                        </tbody>
                      </table>


                      {{  $var->links() }}

                    </div>
                  </div>
                </div>
                <!-- /.col-->
              </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('css')

@endpush

@push('js')

@endpush
