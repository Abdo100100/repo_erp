@extends('layouts.master')


@section('content')


<form method="POST" action="{{ route('sub_cat.store') }}">

        {{ csrf_field() }}

  <input type="text" name="name">

  <input type="submit" name="Add" value="Add">

</form>


@endsection