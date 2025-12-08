@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Services</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><span>Services</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="main--content">
        <div class="panel">
            <div class="records--header">
                <div class="title fa-wrench">
                    <h3 class="h3">Services List </h3>
                    <p>Found Total {{ count($services) }} Services(s)</p>
                </div>
                <div class="actions">
                    <a href="{{ url('admin/service/create/') }}" class="btn btn-success">Add New</a>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="records--list" data-title="Services Listing">
                <table id="recordsListView">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Gallery</th>
                        <th>Featured</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th class="not-sortable">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $service->title }}</td>
                            <td><i class="fa fa-image fa-lg"></i> {{count($service->galleries)}} Images/Videos
                                <a href="{{ url('admin/service/gallery/'.$service->id) }}"
                                   class="btn btn-success btn-sm ml-5">
                                    <i class="fa fa-plus fa-lg"></i> Add Image/Video</a></td>
                            <td><input id="switch-state" type="checkbox" class="toggle_state" data-size="mini"
                                       title="Service" ref="{{ $service->id }}" data-field="is_featured"
                                       @if($service->is_featured == 1)checked="checked" @endif>
                            </td>
                            <td><input id="switch-state" type="checkbox" class="status_check" data-size="mini"
                                       title="Service" ref="{{ $service->id }}"
                                       @if($service->status == "Active")checked="checked" @endif>
                            </td>
                            <td>{{ date("d-M-Y", strtotime($service->created_at)) }}</td>
                            <td>
                                <a href="{{url('admin/service/edit/'.$service->id)}}" class="mr-3"><i
                                        class="fa fa-pencil-square-o fa-lg"></i></a>
                                <a href="{{url('admin/service/view/'.$service->id)}}" class="mr-3"><i
                                        class="fa fa-eye fa-lg"></i></a>
                                <a ref="service" res="delete" id="{{ $service->id }}" href="javascript:void(0);"
                                   class="delete_entry"><i class="fa fa-trash fa-lg"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
