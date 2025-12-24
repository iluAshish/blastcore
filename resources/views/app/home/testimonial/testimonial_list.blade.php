@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Testimonial</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><span>Testimonial</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="main--content">
        <div class="panel">
            <div class="records--header">
                <div class="title fa-wrench">
                    <h3 class="h3">Testimonial List </h3>
                    <p>Found Total {{ count($testimonialLists) }} Testimonial(s)</p>
                </div>
                <div class="actions">
                    <a href="{{ url('admin/home/testimonial/create') }}" class="btn btn-success">Add New</a>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="records--list" data-title="Testimonial Listing">
                <table id="recordsListView">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th class="not-sortable">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($testimonialLists as $testimonial)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{!! $testimonial->name !!}</td>
                            
                            <td><input id="switch-state" type="checkbox" class="status_check" data-size="mini"
                                       title="HomeBanner" ref="{{ $testimonial->id }}"
                                       @if($testimonial->status == "Active") checked="checked" @endif></td>
                            <td>{{ date("d-M-Y", strtotime($testimonial->created_at)) }}</td>
                            <td>
                                <a href="{{url('admin/home/testimonial/edit/'.$testimonial->id)}}" class="mr-3"><i
                                        class="fa fa-pencil-square-o fa-lg"></i></a>
                                <a href="{{url('admin/home/testimonial/view/'.$testimonial->id)}}" class="mr-3"><i
                                        class="fa fa-eye fa-lg"></i></a>
                                <a ref="home" res="delete_testimonial" id="{{ $testimonial->id }}" href="javascript:void(0);"
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
