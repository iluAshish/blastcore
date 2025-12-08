@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">{{ $key }} Highlight</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/home/highlight') }}">Highlight</a></li>
                        <li class="breadcrumb-item active"><span>{{ $key }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="main--content">
        <div class="row gutter-20">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="h3">{{ $key. ' Highlight Information' }} </h3>
                    </div>
                    <div class="panel-content">
                        <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data"
                              method="post">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_number">First Number</label>
                                    <input type="text" name="first_number" id="first_number" placeholder="First Number"
                                           class="form-control" autocomplete="off"
                                           value="{{ !empty($highlight)?$highlight->first_number:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="first_title">First Title</label>
                                    <input type="text" name="first_title" id="first_title" placeholder="First Title"
                                           class="form-control" autocomplete="off"
                                           value="{{ !empty($highlight)?$highlight->first_title:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="second_number">Second Number</label>
                                    <input type="text" name="second_number" id="second_number" placeholder="Second Number"
                                           class="form-control" autocomplete="off"
                                           value="{{ !empty($highlight)?$highlight->second_number:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="second_title">Second Title</label>
                                    <input type="text" name="second_title" id="second_title" placeholder="Second Title"
                                           class="form-control" autocomplete="off"
                                           value="{{ !empty($highlight)?$highlight->second_title:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="third_number">Third Number</label>
                                    <input type="text" name="third_number" id="third_number" placeholder="Third Number"
                                           class="form-control" autocomplete="off"
                                           value="{{ !empty($highlight)?$highlight->third_number:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="third_title">Third Title</label>
                                    <input type="text" name="third_title" id="third_title" placeholder="Third Title"
                                           class="form-control" autocomplete="off"
                                           value="{{ !empty($highlight)?$highlight->third_title:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="submit" class="btn btn-rounded btn-success form_submit_btn"
                                           value="Submit">
                                    <input type="hidden" name="id" id="id" value="{{ !empty($highlight)?$highlight->id:'0' }}">
                                    <input type="reset" class="btn btn-rounded btn-default" value="Reset">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
