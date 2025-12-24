@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Gallery</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
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
                    <h3 class="h3">Gallery List </h3>
                    <p>Found Total {{ count($galleryLists) }} Gallery(s)</p>
                </div>
                <div class="actions">
                    <a href="{{ url('admin/home/gallery/create') }}" class="btn btn-success">Add New</a>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="records--list" data-title="Slider Listing">
                <table id="recordsListView">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Sort Order</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th class="not-sortable">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($galleryLists as $gallery)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <input type="text" name="sort_order" id="sort_order_{{$loop->iteration}}" data-extra="id"
                                       data-extra_key="{{$gallery->id}}" data-table="HomeGallery"
                                       data-id="{{ $gallery->id }}" class="common_sort_order" style="width:25%"
                                       value="{{$gallery->sort_order}}">
                            </td>
                            <td><input id="switch-state" type="checkbox" class="status_check" data-size="mini"
                                       title="HomeGallery" ref="{{ $gallery->id }}"
                                       @if($gallery->status == "Active") checked="checked" @endif></td>
                            <td>{{ date("d-M-Y", strtotime($gallery->created_at)) }}</td>
                            <td>
                                <a href="{{url('admin/home/gallery/edit/'.$gallery->id)}}" class="mr-3"><i
                                        class="fa fa-pencil-square-o fa-lg"></i></a>
                                
                                <a ref="home" res="delete_gallery" id="{{ $gallery->id }}" href="javascript:void(0);"
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
