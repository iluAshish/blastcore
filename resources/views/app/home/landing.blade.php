@extends('app.layouts.main')
@section('content')
<section class="page--header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="page--title h5">Dashboard</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><span>Dashboard</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="main--content">
    <div class="panel text-center p-5">
        <img src="{{asset('app/img/Logo.png')}}" style="height: 200px;">
    </div>
</section>
@endsection
