@extends('layouts.master')


@section('content')

<br>
<br>
<br>
<center><form method="POST" action="">

        {{ csrf_field() }}

  <input type="text" name="mainpass">
  <input type="hidden" name="pass">


  <input type="submit" name="Add" value="تغيير الباسورد">

</form>

</center>


@endsection