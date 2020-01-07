@include('layouts.head')
  <!-- Navbar -->
@include('layouts.nav')
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('layouts.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
       @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('layouts.footer')
