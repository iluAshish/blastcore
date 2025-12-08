@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Why Choose Us</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/about/about_us') }}">About</a></li>
                        <li class="breadcrumb-item active"><span>Why Choose Us</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="main--content">
        <div class="panel">
            <div class="records--header">
                <div class="title fa-wrench">
                    <h3 class="h3">Why Choose Us List </h3>
                    <p>Found Total {{ count($whyChooseUsList) }} Why Choose Us</p>
                </div>
                <div class="actions">
                    <a href="{{ url('admin/about/why_choose_us/create') }}" class="btn btn-success">Add New</a>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="records--list" data-title="Why Choose Us Listing">
                <table id="recordsListView">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Number</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th class="not-sortable">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($whyChooseUsList as $why_choose_us)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $why_choose_us->number }}</td>
                            <td>{{ $why_choose_us->title }}</td>
                            <td><input id="switch-state" type="checkbox" class="status_check" data-size="mini"
                                       title="WhyChooseUs" ref="{{ $why_choose_us->id }}"
                                       @if($why_choose_us->status == "Active") checked="checked" @endif></td>
                            <td>{{ date("d-M-Y", strtotime($why_choose_us->created_at)) }}</td>
                            <td>
                                <a href="{{url('admin/about/why_choose_us/edit/'.$why_choose_us->id)}}" class="mr-3"><i
                                        class="fa fa-pencil-square-o fa-lg"></i></a>
                                <a href="{{url('admin/about/why_choose_us/view/'.$why_choose_us->id)}}" class="mr-3"><i
                                        class="fa fa-eye fa-lg"></i></a>
                                <a ref="about" res="delete_why_choose_us" id="{{ $why_choose_us->id }}"
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
