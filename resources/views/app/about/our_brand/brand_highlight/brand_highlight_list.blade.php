@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Brand Highlight</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/about/about_us') }}">About</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('admin/about/our_brand') }}">Our Brand</a></li>
                        <li class="breadcrumb-item active"><span>Brand Highlight</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="main--content">
        <div class="panel">
            <div class="records--header">
                <div class="title fa-wrench">
                    <h3 class="h3">Brand Highlight List </h3>
                    <p>Found Total {{ count($brandHighlightList) }} Brand Highlight(s)</p>
                </div>
                <div class="actions">
                    <a href="{{ url('admin/about/our_brand/brand_highlight/create') }}" class="btn btn-success">Add New</a>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="records--list" data-title="Brand Highlight Listing">
                <table id="recordsListView">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Sort Order</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th class="not-sortable">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brandHighlightList as $brandHighlight)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{!! $brandHighlight->title !!}</td>
                            <td>
                                <input type="number" name="sort_order" id="sort_order_{{$loop->iteration}}" data-extra="id"
                                       data-extra_key="{{$brandHighlight->id}}" data-table="AboutBrandHighlight"
                                       data-id="{{ $brandHighlight->id }}" class="common_sort_order" style="width:25%"
                                       value="{{$brandHighlight->sort_order}}">
                            </td>
                            <td><input id="switch-state" type="checkbox" class="status_check" data-size="mini"
                                       title="AboutBrandHighlight" ref="{{ $brandHighlight->id }}"
                                       @if($brandHighlight->status == "Active") checked="checked" @endif></td>
                            <td>{{ date("d-M-Y", strtotime($brandHighlight->created_at)) }}</td>
                            <td>
                                <a href="{{url('admin/about/our_brand/brand_highlight/edit/'.$brandHighlight->id)}}" class="mr-3"><i
                                        class="fa fa-pencil-square-o fa-lg"></i></a>
                                <a href="{{url('admin/about/our_brand/brand_highlight/view/'.$brandHighlight->id)}}" class="mr-3"><i
                                        class="fa fa-eye fa-lg"></i></a>
                                <a ref="about/our_brand" res="delete_brand_highlight" id="{{ $brandHighlight->id }}" href="javascript:void(0);"
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
