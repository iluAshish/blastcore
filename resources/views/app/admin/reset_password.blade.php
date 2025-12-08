@extends('app.layouts.main')
@section('content')
<section class="page--header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="page--title h5"><?php echo $key ?></h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/admin/') }}">Password Reset</a></li>
                    <li class="breadcrumb-item active"><span><?php echo $key;?></span></li>
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
                <h3 class="h3">{{ $key. ' Password Reset' }} - {{ @$admin->name }} </h3>
            </div>
            <div class="panel-content">
                <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                    <div class="form-group row">
                        <span class="label-text col-md-2 col-form-label text-md-right">Password *</span>
                        <div class="col-md-10">
                           <input type="text" name="password" id="password" placeholder="Password" class="form-control" autocomplete="off" required autocomplete="off">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <span class="label-text col-md-2 col-form-label text-md-right">Confirm Password*</span>
                        <div class="col-md-10">
                             <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <span class="label-text col-md-2 col-form-label text-md-right"></span>
                        <div class="col-md-10">
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