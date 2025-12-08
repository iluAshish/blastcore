@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--request_details h5">Newsletter Subscriptions</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><span>Newsletter Subscriptions</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="main--content">
        <div class="panel">
            <div class="records--header">
                <div class="title fa-envelope">
                    <h3 class="h3">Newsletter Subscriptions </h3>
                    <p>Found Total {{ count($contactList)}} Subscription(s)</p>
                </div>
                <div class="actions delete_btn" style="display: none;">
                    <input type="hidden" name="ids" id="ids">
                    <a href="javascript:void(0);" id="delete_multiple_btn" data-action="/home/delete_multi_newsletter/"
                       class="btn btn-danger">
                        <i class="fa fa-trash"></i> Delete
                    </a>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="records--list" data-title="Newsletter Subscriptions">
                <table id="recordsListView">
                    <thead>
                    <tr>
                        <th class="text-center"><input type="checkbox" name="check_all" id="check_all"></th>
                        <th>#</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contactList as $contact)
                        <tr>
                            <td class="text-center"><input type="checkbox" class="single_box"
                                                           name="single_box" id="{{ $contact->id }}"
                                                           value="{{ $contact->id }}"></td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contact->email}}</td>
                            <td><input id="switch-state" type="checkbox" class="status_check" data-size="mini"
                                       title="NewsletterSubscription" ref="{{$contact->id}}"
                                       @if($contact->status == "Active") checked="checked" @endif></td>
                            <td>{{ date("d-M-Y", strtotime($contact->created_at))  }}</td>
                            <td><a href="javascript:void(0);" ref="home" res="delete_newsletter" id="{{ $contact->id }}"
                                   class="delete_entry"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
