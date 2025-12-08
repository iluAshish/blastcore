@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">{{$service->title}} Gallery</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/service/') }}">Service</a></li>
                        <li class="breadcrumb-item active"><span>Gallery</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="main--content">
        <div class="panel">
            <div class="records--header">
                <div class="title fa-wrench">
                    <h3 class="h3">{{$service->title}} Gallery </h3>
                    <p>Found Total {{ count($service->galleries) }} {{$service->title}} Gallery Image(s)/Video(s)</p>
                </div>
                <div class="actions">
                    <a href="{{ url('admin/service/gallery/create/'.$service->id) }}" class="btn btn-success">Add
                        New</a>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="records--list" data-title="{{$service->title}} Gallery">
                <table id="recordsListView">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Video</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th class="not-sortable">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($service->galleries as $gallery)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{asset('uploads/service/gallery/'.$service->id.'/'.$gallery->image)}}"
                                   class="fancy"><img
                                        src="{{asset('uploads/service/gallery/'.$service->id.'/'.$gallery->image)}}"
                                        style="width: 50px"></a></td>
                            <td>@if($gallery->video_url)
                                    <a href="{{ $gallery->video_url }}" target="_blank">
                                        <img src="{{asset('app/img/videobutton.svg')}}" alt="">
                                    </a>
                                @endif
                            </td>
                            <td><input id="switch-state" type="checkbox" class="status_check" data-size="mini"
                                       title="ServiceGallery" ref="{{ $gallery->id }}"
                                       @if($gallery->status == "Active") checked="checked" @endif ></td>
                            <td>{{ date("d-M-Y", strtotime($gallery->created_at)) }}</td>
                            <td>
                                <a href="{{url('admin/service/gallery/edit/'.$gallery->id)}}" class="mr-3"><i
                                        class="fa fa-pencil-square-o fa-lg"></i></a>
                                <a href="{{url('admin/service/gallery/view/'.$gallery->id)}}" class="mr-3"><i
                                        class="fa fa-eye fa-lg"></i></a>
                                <a ref="service" res="gallery/delete" id="{{ $gallery->id }}" href="javascript:void(0);"
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
