@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--title h5">Slider</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><span>Slider</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="main--content">
        <div class="panel">
            <div class="records--header">
                <div class="title fa-wrench">
                    <h3 class="h3">Slider List </h3>
                    <p>Found Total {{ count($sliderList) }} Slider(s)</p>
                </div>
                <div class="actions">
                    <a href="{{ url('admin/home/slider/create') }}" class="btn btn-success">Add New</a>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="records--list" data-title="Slider Listing">
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
                    @foreach($sliderList as $slider)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{!! $slider->title !!}</td>
                            <td>
                                <input type="text" name="sort_order" id="sort_order_{{$loop->iteration}}" data-extra="id"
                                       data-extra_key="{{$slider->id}}" data-table="HomeBanner"
                                       data-id="{{ $slider->id }}" class="common_sort_order" style="width:25%"
                                       value="{{$slider->sort_order}}">
                            </td>
                            <td><input id="switch-state" type="checkbox" class="status_check" data-size="mini"
                                       title="HomeBanner" ref="{{ $slider->id }}"
                                       @if($slider->status == "Active") checked="checked" @endif></td>
                            <td>{{ date("d-M-Y", strtotime($slider->created_at)) }}</td>
                            <td>
                                <a href="{{url('admin/home/slider/edit/'.$slider->id)}}" class="mr-3"><i
                                        class="fa fa-pencil-square-o fa-lg"></i></a>
                                <a href="{{url('admin/home/slider/view/'.$slider->id)}}" class="mr-3"><i
                                        class="fa fa-eye fa-lg"></i></a>
                                <a ref="home" res="delete_slider" id="{{ $slider->id }}" href="javascript:void(0);"
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
