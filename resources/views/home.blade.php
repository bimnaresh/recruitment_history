@extends('index')


@section('content')
<div id="page-wrapper">
    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <!-- /.row -->
    <!-- /.row -->
</div>
@endsection
