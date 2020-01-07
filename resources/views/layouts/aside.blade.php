  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('dashboard') }}" class="brand-link">
      <img src="{{ asset('adminlte/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">جريدة التيار</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div>
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="https://secure.gravatar.com/avatar/5ffa2a1ffeb767c60ab7e1052e385d5c?s=52&d=mm&r=g" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->




                 

  


@if(Auth::user()->status ==0  || Auth::user()->status ==1)

@if(Auth::user()->status !=1)



  <li class="nav-item">
              <a href="{{ url('per') }}" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>

المقالات الجديده  
<span class="badge badge-users right">2</span>
                </p>
              </a>
            </li>



<li class="nav-item">
              <a href="{{ url('sper') }}" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>

المقالات المجازة
               <span class="badge badge-users right"></span>
                </p>
              </a>
            </li>





            <li class="nav-item">
              <a href="{{ url('corrA') }}" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                  صندوق التصحيح 
                  <span class="badge badge-users right">2</span>
                </p>
              </a>
            </li>



            <li class="nav-item">
              <a href="{{ url('corrA') }}" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                  المقالات المصححه
                  <span class="badge badge-users right">2</span>
                </p>
              </a>
            </li>



  <li class="nav-item">
              <a href="{{ url('prented') }}" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                  الجاهز للطباعه  
                  <span class="badge badge-users right">2</span>
                </p>
              </a>
            </li>




          <li class="nav-item">
              <a href="{{ url('Tasks') }}" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                  المهام 
                  <span class="badge badge-users right">2</span>
                </p>
              </a>
            </li>

            

            <li class="nav-item">
              <a href="{{ url('Managers') }}" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                  ادارة الاعضاء
                  <span class="badge badge-users right">2</span>
                </p>
              </a>
            </li>



   <li class="nav-item">
              <a href="{{ url('categories') }}" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                الفئات الرئيسية
                  <span class="badge badge-users right">2</span>
                </p>
              </a>
            </li>

       <li class="nav-item">
              <a href="{{ url('sub_cat') }}" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>

الفئات الفرعيه 
                  <span class="badge badge-users right">2</span>
                </p>
              </a>
            </li>


           

            <li class="nav-item">
              <a href="{{ url('thper') }}" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
المقالات المرفوضه
              <span class="badge badge-users right"></span>
                </p>
              </a>
            </li>


@endif




 








@elseif(Auth::user()->status ==3 )

            <li class="nav-item">
              <a href="{{ url('posts') }}" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                  صندوق التصحيح 
                  <span class="badge badge-users right">2</span>
                </p>
              </a>
            </li>



 <li class="nav-item">
              <a href="{{ url('corr') }}" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                  صندوقي
                  <span class="badge badge-users right">2</span>
                </p>
              </a>
            </li>




@elseif(Auth::user()->status ==4 )


<li class="nav-item">
              <a href="{{ url('sper') }}" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>

المقالات المجازة
               <span class="badge badge-users right"></span>
                </p>
              </a>
            </li>

            
  <li class="nav-item">
              <a href="{{ url('posts') }}" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                  ص صندوق المقالات تحت التصحيح
                  <span class="badge badge-users right"></span>
                </p>
              </a>
            </li>


  <li class="nav-item">
              <a href="{{ url('corrected') }}" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>

المقالات المصححه                  <span class="badge badge-users right">2</span>
                </p>
              </a>
            </li>



<li class="nav-item">
              <a href="{{ url('prented') }}" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>

الطباعه                  <span class="badge badge-users right">2</span>
                </p>
              </a>
            </li>



 <li class="nav-item">
              <a href="{{ url('backchive') }}" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                 ارشيف
                  <span class="badge badge-users right">2</span>
                </p>
              </a>
            </li>
    
@endif

         


                   @if(Auth::user()->status == 2 || Auth::user()->status == 0 ||Auth::user()->status == 3 || Auth::user()->status == 1)
            <li class="nav-item">
              <a href="{{ url('backchive') }}" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                ارشيف
                  <span class="badge badge-users right">2</span>
                </p>
              </a>
            </li>
           @endif


          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>
