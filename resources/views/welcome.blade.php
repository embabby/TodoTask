@extends('master')
@section('body')

  <navbar></navbar>
  <div class="container">
  	<!-- <todo></todo> -->
  	<todo :auth="{{Auth::user()->id}}"></todo>


  </div>



@stop           
