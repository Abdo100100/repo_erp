               @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif





  
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">

@if($errors->any())

<div class="alert alert-danger" role="alert">
@foreach($errors->all() as $error)

<li>  {{ $error }} </li>

@endforeach
</div>



@endif


 @if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
    @endif