@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    @if(Auth::user()->rol_id==1)
        @include('dashboard/dashboard_admin')        
    @endif
    @if(Auth::user()->rol_id==2)
        @include('dashboard/dashboard_profesor')
    @endif
    @if(Auth::user()->rol_id==3)
        @include('dashboard/dashboardd_estudiante')
    @endif
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
