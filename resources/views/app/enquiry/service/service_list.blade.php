@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--request_details h5">Service Enquiry</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><span>Service Enquiry</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="main--content">
        <div class="panel">
            <div class="records--header">
                <div class="title fa-handshake">
                    <h3 class="h3">Service Enquiries List </h3>
                    <p>Found Total {{ count($serviceEnquiryList)}} Enquiries</p>
                </div>
                <div class="actions delete_btn" style="display: none;">
                    <input type="hidden" name="ids" id="ids">
                    <a href="javascript:void(0);" id="delete_multiple_btn" data-action="/service/enquiry/delete_multiple/"
                       class="btn btn-danger">
                        <i class="fa fa-trash"></i> Delete
                    </a>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="records--list" data-title="Enquiry Listing">
                <table id="recordsListView">
                    <thead>
                    <tr>
                        <th><input type="checkbox" class="mt-2 ml-3" name="check_all" id="check_all"></th>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Message</th>
                        <th>Service</th>
                        <th>Request URL</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($serviceEnquiryList as $serviceEnquiry)
                        <tr>
                            <td><input type="checkbox" class="single_box mt-2 ml-3" name="single_box"
                                       id="{{ $serviceEnquiry->id }}" value="{{ $serviceEnquiry->id }}"></td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $serviceEnquiry->name}}</td>
                            <td>{{ $serviceEnquiry->email}}</td>
                            <td>{{ $serviceEnquiry->phone}}</td>
                            @if(strlen($serviceEnquiry->message)>=30)
                                <td id="kv-btn-{{$loop->iteration}}">{{ substr($serviceEnquiry->message, 0, 30)."..." }}</td>
                                <div id="myPopover{{ $loop->iteration }}" class="popover popover-x popover-default">
                                    <div class="arrow"></div>
                                    <div class="popover-body popover-content">
                                        <p class="text-justify">{{ $serviceEnquiry->message }}</p>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $('#kv-btn-{{ $loop->iteration }}').popoverButton({
                                        trigger: 'hover focus',
                                        target: '#myPopover{{$loop->iteration}}'
                                    });
                                </script>
                            @else
                                <td>{{ $serviceEnquiry->message }}</td>
                            @endif
                            <td>{{ $serviceEnquiry->service->title}}</td>
                            <td>{{ $serviceEnquiry->request_url}}</td>
                            <td>{{ date("d-M-Y", strtotime($serviceEnquiry->created_at))  }}</td>
                            <td>
                                <a href="javascript:void(0);" ref="service/enquiry" res="delete"
                                   id="{{ $serviceEnquiry->id }}"
                                   class="delete_entry"><i class="fa fa-trash fa-lg"></i></a>

                                <a class="ml-3" href="{{ url('admin/service/enquiry/view/'.$serviceEnquiry->id) }}"><i
                                        class="fa fa-eye fa-lg"></i></a>

                                <a class="ml-2 reply_modal" href="javascript:void(0)" data-toggle="modal"
                                   data-reply="{!! $serviceEnquiry->reply !!}" data-id="{{ $serviceEnquiry->id }}"
                                   data-enquiry="{!! $serviceEnquiry->message !!}"><i class="fa fa-reply fa-lg"
                                                                                      style="color:{{ ($serviceEnquiry->reply==NULL)?'#e16123':'green' }}"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="reply-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form role="form" method="post" id="formWizard" class="reply_form">
                        <div class="modal-header">
                            <h5 class="modal-title">Service Enquiry Reply</h5>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> Enquiry*</label>
                                            <textarea disabled id="enquiry_details" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> Reply*</label>
                                            <textarea class="form-control" required id="reply" name="reply"
                                                      placeholder="Reply to enquiry"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="form-group">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close
                                </button>
                                <input type="submit" class="btn btn-primary" id="reply_to_service_enquiry"
                                       value="Update Reply">
                                <input type="hidden" id="id" name="id">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
