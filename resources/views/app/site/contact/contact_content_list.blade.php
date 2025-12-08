@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Contact Information</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><span>Contact Information</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="main--content">
        <div class="panel">
            <div class="records--header">
                <div class="title fa-wrench">
                    <h3 class="h3">Contact Information List </h3>
                    <p>Found Total {{ count($contactContentList) }} Contact Information</p>
                </div>
                <div class="actions">
                    <a href="{{ url('admin/site/contact/create') }}" class="btn btn-success">Add New</a>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="records--list" data-title="Contact Information Listing">
                <table id="recordsListView">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Working Hours</th>
                        <th>Status</th>
                        <th class="not-sortable">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contactContentList as $contactContent)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contactContent->map_title }}</td>
                            <td>{{ $contactContent->address }}</td>
                            <td>{{ $contactContent->email }}</td>
                            <td>{{ $contactContent->phone_number }}</td>
                            <td>{{ $contactContent->working_hours }}</td>
                            <td><input id="switch-state" type="checkbox" class="status_check" data-size="mini"
                                       title="ContactInformation" ref="{{ $contactContent->id }}"
                                       @if($contactContent->status == "Active") checked="checked" @endif></td>
                            <td>
                                <a href="{{url('admin/site/contact/edit/'.$contactContent->id)}}" class="mr-3"><i
                                        class="fa fa-pencil-square-o fa-lg"></i></a>
                                <a href="{{url('admin/site/contact/view/'.$contactContent->id)}}" class="mr-3"><i
                                        class="fa fa-eye fa-lg"></i></a>
                                <a ref="site/contact" res="delete" id="{{ $contactContent->id }}"
                                   href="javascript:void(0);" class="delete_entry"><i class="fa fa-trash fa-lg"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
