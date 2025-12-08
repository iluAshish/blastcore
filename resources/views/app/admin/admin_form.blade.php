@extends('app.layouts.main')
@section('content')
<section class="page--header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="page--title h5"><?php echo $key. " Admin"?></h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/admin') }}">Admin</a></li>
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
                <h3 class="h3">{{ $key. ' Admin' }} {{ @$admin->name }} </h3>
            </div>
            <div class="panel-content">
                <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Name*</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" required id="name" value="{{ isset($admin)?@$admin->name:'' }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Phone Number*</label>
                            <input type="text" name="phone_number" id="phone_number" placeholder="Phone Number" class="form-control" required autocomplete="off" value="{{ @$admin->phone_number }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Email*</label>
                            <input type="email" name="email" id="email" placeholder="Email ID" class="form-control" autocomplete="off"  required value="{{ @$admin->email }}">
                        </div>
                    </div>
                    @if(@!$admin)
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Username*</label>
                                <input type="text" name="username" id="username" placeholder="Username" class="form-control" autocomplete="off"  required value="{{ @$admin->username }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Password*</label>
                                <input type="password" name="password" id="password" placeholder="Password" required class="form-control" autocomplete="off">
                            </div>
                        </div>
                    @endif
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