@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">404</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><span>404</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="main--content">
        <div class="col-xs-12" style="text-align:center">
            <img src="{{ url('app/img/404.png') }}">
        </div>
        <div class="col-xs-12" style="text-align:center;padding-top:20px;">
            <button class="btn btn-danger" id="back_to">Back to page</button>
        </div>
    </section>
@endsection
