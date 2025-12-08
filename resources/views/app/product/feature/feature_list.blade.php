@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">{{$product->title}} Feature</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/product/') }}">Product</a></li>
                        <li class="breadcrumb-item active"><span>Feature</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="main--content">
        <div class="panel">
            <div class="records--header">
                <div class="title fa-wrench">
                    <h3 class="h3">{{$product->title}} Feature </h3>
                    <p>Found Total {{ count($product->features) }} {{$product->title}} Feature(s)</p>
                </div>
                <div class="actions">
                    <a href="{{ url('admin/product/feature/create/'.$product->id) }}" class="btn btn-success">Add
                        New</a>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="records--list" data-title="{{$product->title}} Feature">
                <table id="recordsListView">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Description</th>
                        <th>Sort Order</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th class="not-sortable">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product->features as $feature)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $feature->description }}</td>
                            <td>
                                <input type="text" name="sort_order" id="sort_order_{{$loop->iteration}}" data-extra="id"
                                       data-extra_key="{{$feature->id}}" data-table="ProductFeature"
                                       data-id="{{ $feature->id }}" class="common_sort_order" style="width:25%"
                                       value="{{$feature->sort_order}}">
                            </td>
                            <td><input id="switch-state" type="checkbox" class="status_check" data-size="mini"
                                       title="ProductFeature" ref="{{ $feature->id }}"
                                       @if($feature->status == "Active") checked="checked" @endif ></td>
                            <td>{{ date("d-M-Y", strtotime($feature->created_at)) }}</td>
                            <td>
                                <a href="{{url('admin/product/feature/edit/'.$feature->id)}}" class="mr-3"><i
                                        class="fa fa-pencil-square-o fa-lg"></i></a>
                                <a href="{{url('admin/product/feature/view/'.$feature->id)}}" class="mr-3"><i
                                        class="fa fa-eye fa-lg"></i></a>
                                <a ref="product" res="feature/delete" id="{{ $feature->id }}" href="javascript:void(0);"
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
