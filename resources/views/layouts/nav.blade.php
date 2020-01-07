<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
     
    </ul>

    <!-- SEARCH FORM -->
  

 
    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto">
      <!-- Messages Dropdown Menu -->
           <li style="margin-left: 200px;"> <a href="">Edit Password </a></li>
 
      <li class="nav-item">

<a href="{{ route('logout') }}"
onclick="event.preventDefault();
         document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i></a>


            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
            </form>


      </li>


    </ul>
  </nav>