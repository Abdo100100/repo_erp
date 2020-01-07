 @extends('layouts.master')

 @section('content')
   

       
  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">الصفحة الرئيسيه</h1>
          </div><!-- /.col -->
   
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">


      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          

@if(auth()->user()->status == 2)

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $c }}</h3>

                <p>ادارة المقالات</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ url('posts') }}" class="small-box-footer">تصفح المقالات<i class="fa fa-arrow-circle-left"></i></a>
            </div>
          </div>
          <!-- ./col -->

       <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $t }}</h3>

                <p>المهام الجديده</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('corrA') }}" class="small-box-footer">تصفح المقالات <i class="fa fa-arrow-circle-left"></i></a>
            </div>
          </div>




@endif

@if(auth()->user()->status == 0 || auth()->user()->status == 1)
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $c }}</h3>

                <p>المقالات الجديده</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ url('per') }}" class="small-box-footer">تصفح المقالات<i class="fa fa-arrow-circle-left"></i></a>
            </div>
          </div>
          <!-- ./col -->




          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $n }}</h3>

                <p>المقالات المجازة</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ url('sper') }}" class="small-box-footer">تصفح المقالات <i class="fa fa-arrow-circle-left"></i></a>
            </div>
          </div>
          <!-- ./col -->



          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $t }}</h3>

                <p>صندوق  التصحيح</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('corrA') }}" class="small-box-footer">تصفح المقالات <i class="fa fa-arrow-circle-left"></i></a>
            </div>
          </div>


          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $r }}</h3>

                <p>المقالات المرفوضه</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ url('thper') }}" class="small-box-footer">تصفح المقالات <i class="fa fa-arrow-circle-left"></i></a>
            </div>
          </div>

@endif



@if(auth()->user()->status == 4)

 <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $c }}</h3>

                <p>المقالات تحت التصحيح</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ url('corrA') }}" class="small-box-footer">تصفح المقالات<i class="fa fa-arrow-circle-left"></i></a>
            </div>
          </div>
          <!-- ./col -->




          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $n }}</h3>

                <p>المقالات المصححه</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ url('corrected') }}" class="small-box-footer">تصفح المقالات <i class="fa fa-arrow-circle-left"></i></a>
            </div>
          </div>
          <!-- ./col -->

    <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $r }}</h3>

                <p>المطبوعات</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ url('prented') }}" class="small-box-footer">تصفح المقالات <i class="fa fa-arrow-circle-left"></i></a>
            </div>
          </div>



@endif   



@if(auth()->user()->status == 3)

 <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $c }}</h3>

                <p>مقالات التصحيح الخاصه بى</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ url('corr') }}" class="small-box-footer">تصفح المقالات<i class="fa fa-arrow-circle-left"></i></a>
            </div>
          </div>
          <!-- ./col -->




          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $n }}</h3>

                <p>المقالات المصححه</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ url('cooo') }}" class="small-box-footer">تصفح المقالات <i class="fa fa-arrow-circle-left"></i></a>
            </div>
          </div>
          <!-- ./col -->



@endif
          <!-- ./col -->
        </div>
        <!-- /.row -->
  





     <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">المهام</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="display: block;">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>رقم المهمه</th>
                      <th> عنوان المهمه</th>
                      <th>الشرح </th>
                      <th>الاعضاء </th>
                      <th>التحكم</th>
                    </tr>
                    </thead>
                    <tbody>
                   
@foreach($tasks as $v)      
    
                    <tr>
                      <td>{{ $v->id }}</td>
                      <td>{{ $v->title }}</td>
                      <td> <p>{{ $v->body }}</p></td>
                      <td> 
                        @foreach ($v->user_tasks as $user_tasks)
                        <p>{{ $user_tasks->name }} ,</p>
                        
                        @endforeach
                      </td>
                      <td>
@if(Auth::user()->status != 0 && $v->status == 0)

       <button href="fin/{{ $v->id }}" class="btn  btn-primary" > انهاء </button>
@elseif($v->status == 0)

        <span class="badge  badge-warning">غير منتهيه </span>

<form action="{{ url('delete_task/'.$v->id) }}" method="post" style="display: inline;">
      {{ csrf_field() }}

<button  type="submit" class="delete-user btn  btn-danger" >Delete</button>
</form>


@elseif($v->status == 1)
    <span class="badge  badge-success">منتهيه </span>

@endif

                      </td>
                    </tr>
@endforeach








                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix" style="display: block;">
               

              </div>
              <!-- /.card-footer -->
            </div>








        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
@endsection    