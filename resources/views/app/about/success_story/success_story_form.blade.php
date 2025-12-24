@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--client_name h5">{{ $key }} Success Story</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/about/about_us') }}">About</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/about/success_story/list') }}">Success Story</a>
                        </li>
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
                        <h3 class="h3">Success Story</h3>
                    </div>
                    <div class="panel-content">
                        <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data"
                              method="post">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="year">Year*</label>
                                    <input type="text" required class="form-control" name="year" placeholder="Year"
                                           id="year" value="{{ isset($successStory)?$successStory->year:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="title">Title*</label>
                                    <input type="text" required class="form-control" name="title"
                                           placeholder="Title" id="title"
                                           value="{{ isset($successStory)?$successStory->title:'' }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description">Description*</label>
                                    <textarea class="form-control textarea" required name="description" placeholder="Description*"
                                              id="description">{{ isset($successStory)?$successStory->description:'' }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="submit" class="btn btn-success form_submit_btn" value="Submit">
                                    <input type="reset" class="btn btn-default" value="Reset">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
