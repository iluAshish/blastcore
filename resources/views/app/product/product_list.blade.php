@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Products</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><span>Products</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="main--content">
        <div class="panel">
            <div class="records--header">
                <div class="title fa-wrench">
                    <h3 class="h3">Products List </h3>
                    <p>Found Total {{ count($products) }} Products(s)</p>
                </div>
                <div class="actions">
                    <a href="{{ url('admin/product/create/') }}" class="btn btn-success">Add New</a>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="records--list" data-title="Products Listing">
                <table id="recordsListView">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Images</th>
                        <th>Features</th>
                        <th>Gallery</th>
                        <th>Featured</th>
                        <th>Latest</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th class="not-sortable">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->title }}</td>
                            <td><i class="fa fa-image fa-lg"></i> {{count($product->images)}} Image(s)
                                <a href="{{ url('admin/product/image/'.$product->id) }}"
                                   class="btn btn-success btn-sm ml-5">
                                    <i class="fa fa-plus fa-lg"></i> Add</a></td>
                            <td>{{count($product->features)}} Feature(s)
                                <a href="{{ url('admin/product/feature/'.$product->id) }}"
                                   class="btn btn-success btn-sm ml-5">
                                    <i class="fa fa-plus fa-lg"></i> Add</a></td>
                            <td><i class="fa fa-image fa-lg"></i> {{count($product->galleries)}} File(s)
                                <a href="{{ url('admin/product/gallery/'.$product->id) }}"
                                   class="btn btn-success btn-sm ml-5">
                                    <i class="fa fa-plus fa-lg"></i> Add</a></td>
                            <td><input id="switch-state" type="checkbox" class="toggle_state" data-size="mini"
                                       title="Product" ref="{{ $product->id }}" data-field="is_featured"
                                       @if($product->is_featured == 1)checked="checked" @endif>
                            </td>
                            <td><input id="switch-state" type="checkbox" class="toggle_state" data-size="mini"
                                       title="Product" ref="{{ $product->id }}" data-field="is_latest"
                                       @if($product->is_latest == 1)checked="checked" @endif>
                            </td>
                            <td><input id="switch-state" type="checkbox" class="status_check" data-size="mini"
                                       title="Product" ref="{{ $product->id }}"
                                       @if($product->status == "Active")checked="checked" @endif>
                            </td>
                            <td>{{ date("d-M-Y", strtotime($product->created_at)) }}</td>
                            <td>
                                <a href="{{url('admin/product/edit/'.$product->id)}}" class="mr-3"><i
                                        class="fa fa-pencil-square-o fa-lg"></i></a>
                                <a href="{{url('admin/product/view/'.$product->id)}}" class="mr-3"><i
                                        class="fa fa-eye fa-lg"></i></a>
                                <a ref="product" res="delete" id="{{ $product->id }}" href="javascript:void(0);"
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
