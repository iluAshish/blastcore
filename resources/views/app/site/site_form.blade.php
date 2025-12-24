@extends('app.layouts.main')
@section('content')
    <section class="page--header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page--contact_number h5">{{ $key }} Site Information</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><span>{{ $key }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="main--content">
        <div class="row gutter-20">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="h3">{{ $key. ' Site Information' }} </h3>
                    </div>
                    <div class="panel-content">
                        <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data"
                              method="post">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email ID*</label>
                                    <input type="email" class="form-control" name="email"
                                           placeholder="Email ID" id="email"
                                           value="{{ !empty($site)?$site->email:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email_name">Email Name*</label>
                                    <input type="text" class="form-control" name="email_name"
                                           placeholder="Email Name" id="email_name"
                                           value="{{ !empty($site)?$site->email_name:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="logo">Logo*</label>
                                    <div class="file-loading">
                                        <input id="logo" name="logo" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size should be minimum of 350X75</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="webp_logo">Logo (webp)</label>
                                    <div class="file-loading">
                                        <input id="webp_logo" name="webp_logo" type="file" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="logo_meta_tag">Logo Attribute</label>
                                    <input type="text" name="logo_meta_tag" id="logo_meta_tag"
                                           placeholder="Image Alternate Text" class="form-control placeholder-cls"
                                           autocomplete="off" value="{{ !empty($site)?$site->logo_meta_tag:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="whatsapp_number">Whatsapp Number</label>
                                    <input type="text" class="form-control" name="whatsapp_number"
                                           placeholder="Whatsapp Number" id="whatsapp_number"
                                           value="{{ !empty($site)?$site->whatsapp_number:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone_number">Phone Number*</label>
                                    <input type="text" class="form-control" name="phone_number"
                                           placeholder="Phone Number" id="phone_number"
                                           value="{{ !empty($site)?$site->phone_number:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="facebook_url">Facebook Url</label>
                                    <input type="text" class="form-control" name="facebook_url"
                                           placeholder="Facebook Url" id="facebook_url"
                                           value="{{ !empty($site)?$site->facebook_url:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="instagram_url">Instagram Url</label>
                                    <input type="text" class="form-control" name="instagram_url"
                                           placeholder="Instagram Url" id="instagram_url"
                                           value="{{ !empty($site)?$site->instagram_url:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="linkedin_url">LinkedIn Url</label>
                                    <input type="text" class="form-control" name="linkedin_url"
                                           placeholder="LinkedIn Url" id="linkedin_url"
                                           value="{{ !empty($site)?$site->linkedin_url:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="youtube_url">YouTube Url</label>
                                    <input type="text" class="form-control" name="youtube_url"
                                           placeholder="YouTube Url" id="youtube_url"
                                           value="{{ !empty($site)?$site->youtube_url:'' }}">
                                </div>
                            </div>

                            <!-- new link here  -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="twitter_url">Twitter</label>
                                    <input type="text" class="form-control" name="twitter_url"
                                           placeholder="Twitter Url" id="twitter_url"
                                           value="{{ !empty($site)?$site->twitter_url:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tiktok_url">Tik Tok</label>
                                    <input type="text" class="form-control" name="tiktok_url"
                                           placeholder="Tik Tok" id="tiktok_url"
                                           value="{{ !empty($site)?$site->tiktok_url:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="pinterest_url">Pinterest url</label>
                                    <input type="text" class="form-control" name="pinterest_url"
                                           placeholder="Pinterest url" id="pinterest_url"
                                           value="{{ !empty($site)?$site->pinterest_url:'' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="snapchat_url">Snapchat Url</label>
                                    <input type="text" class="form-control" name="snapchat_url"
                                           placeholder="Snapchat Url" id="snapchat_url"
                                           value="{{ !empty($site)?$site->snapchat_url:'' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="google_review">Google Review</label>
                                    <input type="text" class="form-control" name="google_review"
                                           placeholder="Google Review" id="google_review"
                                           value="{{ !empty($site)?$site->google_review:'' }}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="google_review">Privacy Policy</label>
                                    <textarea class="form-control textarea" required name="privacy" placeholder="Privacy Policy"
                                              id="privacy">{{ isset($site)?$site->privacy:'' }}</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="google_review">Terms & Conditions</label>
                                    <textarea class="form-control textarea" required name="terms_conditions" placeholder="Terms & Conditions"
                                              id="terms_conditions">{{ isset($site)?$site->terms_conditions:'' }}</textarea>
                                </div>
                            </div>
                            <!-- new link end here  -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="product_brochure">Product Brochure*</label>
                                    <div class="file-loading">
                                        <input id="product_brochure" name="product_brochure" type="file"
                                               accept="application/pdf">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="service_brochure">Service Brochure*</label>
                                    <div class="file-loading">
                                        <input id="service_brochure" name="service_brochure" type="file"
                                               accept="application/pdf">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="hidden" name="id" id="id" value="{{ !empty($site)?$site->id:'0' }}">
                                    <input type="submit" class="btn btn-rounded btn-success form_submit_btn"
                                           value="Submit">
                                    <input type="reset" class="btn btn-rounded btn-default" value="Reset">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#logo").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                minImageWidth: 350,
                minImageHeight: 75,
                maxImageWidth: 350,
                maxImageHeight: 75,
                @if(!empty($site) && $site->logo!=NULL)
                initialPreview: ["{{ $logo_with_path}}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($site->logo!=NULL)?$site->site_name:''}}",
                        key: "{{ ($site->logo!=NULL)?'logo':'0'}}",
                        url: 'site/delete'
                    }
                ]
                @endif
            });

            $("#webp_logo").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                dropZoneEnabled: false,
                required: false,
                allowedFileExtensions: ["webp"],
                @if(!empty($site) && $site->webp_logo!=NULL)
                initialPreview: ["{{ $webp_logo_with_path}}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($site->webp_logo!=NULL)?$site->site_name:''}}",
                        width: "120px",
                        key: "{{ ($site->webp_logo!=NULL)?'webp_logo':'0'}}",
                        url: 'site/delete'
                    }
                ]
                @endif
            });

            $("#product_brochure").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                initialPreviewFileType: 'pdf',
                dropZoneEnabled: false,
                required: true,
                allowedFileExtensions: ["pdf"],
                @if(!empty($site) && $site->product_brochure!=NULL)
                initialPreview: ["{{ $product_brochure_with_path}}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($site->product_brochure!=NULL)?$site->site_name:''}}",
                        width: "120px",
                        key: "{{ ($site->product_brochure!=NULL)?'product_brochure':'0'}}",
                        url: 'site/delete'
                    }
                ]
                @endif
            });

            $("#service_brochure").fileinput({
                'theme': 'explorer-fas',
                validateInitialCount: true,
                overwriteInitial: false,
                autoReplace: true,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                initialPreviewFileType: 'pdf',
                dropZoneEnabled: false,
                required: true,
                allowedFileExtensions: ["pdf"],
                @if(!empty($site) && $site->service_brochure!=NULL)
                initialPreview: ["{{ $service_brochure_with_path}}",],
                initialPreviewConfig: [
                    {
                        caption: "{{ ($site->service_brochure!=NULL)?$site->site_name:''}}",
                        width: "120px",
                        key: "{{ ($site->service_brochure!=NULL)?'service_brochure':'0'}}",
                        url: 'site/delete'
                    }
                ]
                @endif
            });
        });
    </script>
@endsection
