@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Product Categories</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product') }}">Product</a></li>
                        <li class="breadcrumb-item active"><span>Product Categories</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="main--content">
        <div class="panel">
            <div class="records--header">
                <div class="title fa-wrench">
                    <h3 class="h3">Product Categories List </h3>
                    <p>Found Total {{ count($productCategories) }} Product Categories</p>
                </div>
                <div class="actions">
                    <a href="{{ url('admin/product/category/create/') }}" class="btn btn-success">Add New</a>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="records--list" data-title="Product Categories Listing">
                <table id="recordsListView">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Parent Category</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th class="not-sortable">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productCategories as $productCategory)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $productCategory->title }}</td>
                            @if(isset($productCategory->parent))
                                <td>{{ $productCategory->parent->title}}</td>@else
                                <td></td>@endif
                            <td><input id="switch-state" type="checkbox" class="status_check" data-size="mini"
                                       title="ProductCategory" ref="{{ $productCategory->id }}"
                                       @if($productCategory->status == "Active")checked="checked" @endif>
                            </td>
                            <td>{{ date("d-M-Y", strtotime($productCategory->created_at)) }}</td>
                            <td>
                                <a href="{{url('admin/product/category/edit/'.$productCategory->id)}}" class="mr-3"><i
                                        class="fa fa-pencil-square-o fa-lg"></i></a>
                                <a href="{{url('admin/product/category/view/'.$productCategory->id)}}" class="mr-3"><i
                                        class="fa fa-eye fa-lg"></i></a>
                                <a ref="product/category" res="delete" id="{{ $productCategory->id }}"
                                   href="javascript:void(0);"
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
