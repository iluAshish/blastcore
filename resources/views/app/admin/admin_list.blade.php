@extends('app.layouts.main')
@section('content')
<section class="page--header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="page--title h5">Admin</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><span>Admin</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="main--content">
    <div class="panel">
        <div class="records--header">
            <div class="title fa-wrench">
                <h3 class="h3">Admin List </h3>
                <p>Found Total {{ count($adminList)}} Admin(s)</p>
            </div>
            <div class="actions">
                <a href="{{ url('admin/admin/create') }}" class="btn btn-success">Add New</a>
            </div>
        </div>
    </div>
    <div class="panel">
        <div class="records--list" data-title="Admin Listing">
            <table id="recordsListView">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th class="not-sortable">Actions</th>
                    </tr>
                </thead>
                <tbody>
                   @php $i=1 @endphp @foreach($adminList as $user)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->username}}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td><input id="switch-state" type="checkbox" class="status_check" data-size="mini" title="Admin" ref="{{ $user->id}}" <?php if($user->status=="Active"){ ?>checked="checked"<?php }?>></td>
                            <td>{{ date("d-M-Y", strtotime($user->created_at))  }}</td>
                            <td>
                                <a href="{{url('admin/admin/edit/'.$user->id)}}" class="mr-3"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                                <a href="{{url('admin/admin/view/'.$user->id)}}" class="mr-3"><i class="fa fa-eye fa-lg"></i></a>
                                <a ref="admin" res="delete_admin" id="{{ $user->id }}" href="javascript:void(0);" class="delete_entry mr-3"><i class="fa fa-trash fa-lg"></i></a>
                                <a href="{{url('admin/admin/reset_password/'.$user->id)}}" class="mr-3"><i class="fa fa-unlock fa-lg"></i></a>
                            </td>
                        </tr>
                    @php $i++;@endphp@endforeach
                </tbody>
			</table>
        </div>
    </div>
</section>
@endsection
