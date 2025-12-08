@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">{{$product->title}} Image</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product/') }}">Product</a></li>
                        <li class="breadcrumb-item active"><span>Image</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="main--content">
        <div class="panel">
            <div class="records--header">
                <div class="title fa-wrench">
                    <h3 class="h3">{{$product->title}} Image </h3>
                    <p>Found Total {{ count($product->images) }} {{$product->title}} Image(s)</p>
                </div>
                <div class="actions">
                    <a href="{{ url('admin/product/image/create/'.$product->id) }}" class="btn btn-success">Add
                        New</a>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="records--list" data-title="{{$product->title}} Image">
                <table id="recordsListView">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Sort Order</th>
                        <th>Showcase</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th class="not-sortable">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product->images as $image)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{asset('uploads/product/image/'.$product->id.'/'.$image->image)}}"
                                   class="fancy"><img
                                        src="{{asset('uploads/product/image/'.$product->id.'/'.$image->image)}}"
                                        style="width: 50px"></a></td>
                            <td>
                                <input type="text" name="sort_order" id="sort_order_{{$loop->iteration}}"
                                       data-extra="id" data-extra_key="{{$image->id}}" data-table="ProductImage"
                                       data-id="{{ $image->id }}" class="common_sort_order" style="width:25%"
                                       value="{{$image->sort_order}}">
                            </td>
                            <td><input id="switch-state" type="checkbox" class="toggle_state" data-size="mini"
                                       title="ProductImage" ref="{{ $image->id }}" data-field="is_showcased"
                                       @if($image->is_showcased == 1)checked="checked" @endif>
                            </td>
                            <td><input id="switch-state" type="checkbox" class="status_check" data-size="mini"
                                       title="ProductImage" ref="{{ $image->id }}"
                                       @if($image->status == "Active") checked="checked" @endif ></td>
                            <td>{{ date("d-M-Y", strtotime($image->created_at)) }}</td>
                            <td>
                                <a href="{{url('admin/product/image/edit/'.$image->id)}}" class="mr-3"><i
                                        class="fa fa-pencil-square-o fa-lg"></i></a>
                                <a href="{{url('admin/product/image/view/'.$image->id)}}" class="mr-3"><i
                                        class="fa fa-eye fa-lg"></i></a>
                                <a ref="product" res="image/delete" id="{{ $image->id }}" href="javascript:void(0);"
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
