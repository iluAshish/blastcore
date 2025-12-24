@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Success Story</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/about/about_us') }}">About</a></li>
                        <li class="breadcrumb-item active"><span>Success Story</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="main--content">
        <div class="panel">
            <div class="records--header">
                <div class="title fa-wrench">
                    <h3 class="h3">Success Story List </h3>
                    <p>Found Total {{ count($successStory) }} Success Story</p>
                </div>
                <div class="actions">
                    <a href="{{ url('admin/about/success_story/create') }}" class="btn btn-success">Add New</a>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="records--list" data-title="Success Story Listing">
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
                    @foreach($successStory as $success_story)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $success_story->title }}</td>
                            <td><input id="switch-state" type="checkbox" class="status_check" data-size="mini"
                                       title="SuccessStory" ref="{{ $success_story->id }}"
                                       @if($success_story->status == "Active") checked="checked" @endif></td>
                            <td>{{ date("d-M-Y", strtotime($success_story->created_at)) }}</td>
                            <td>
                                <a href="{{url('admin/about/success_story/edit/'.$success_story->id)}}" class="mr-3"><i
                                        class="fa fa-pencil-square-o fa-lg"></i></a>
                                <a href="{{url('admin/about/success_story/view/'.$success_story->id)}}" class="mr-3"><i
                                        class="fa fa-eye fa-lg"></i></a>
                                <a ref="about" res="delete_success_story" id="{{ $success_story->id }}"
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
