<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\ServiceEnquiry;
use App\ServiceGallery;
use Illuminate\Http\Request;
use App\Service;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function service()
    {
        $title = "Service List";
        $services = Service::latest()->with('galleries')->get();
        return view('app.service.service_list', compact('services', 'title'));
    }

    public function service_create()
    {
        $key = "Create";
        $title = "Create Service";
        return view('app.service.service_form', compact('key', 'title'));
    }

    public function service_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2',
            'short_url' => 'required|unique:services,short_url',
            'icon_image' => 'required|image|mimes:svg|max:1024',
            'icon_image_meta_tag' => 'required|min:5',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image_meta_tag' => 'required|min:5',
            'home_description' => 'required',
            'brochure' => 'mimes:pdf',
        ]);
        $service = new Service;
        if ($request->hasFile('icon_image')) {
            $servicePath = public_path('uploads/service/icon/');
            if (!file_exists($servicePath)) {
                mkdir($servicePath, 0777, true);
            }
            $fileName = $request->icon_image->getClientOriginalName();
            $service_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->icon_image->move($servicePath, $service_name);
            $service->icon_image = $service_name;
        }
        if ($request->hasFile('icon_webp_image')) {
            $servicePath = public_path('uploads/service/icon/webp/');
            if (!file_exists($servicePath)) {
                mkdir($servicePath, 0777, true);
            }
            $fileName = $request->icon_webp_image->getClientOriginalName();
            $service_name = time() . rand(1, 9999) . '.' . $fileName;
            $request->icon_webp_image->move($servicePath, $service_name);
            $service->icon_webp_image = $service_name;
        }
        if ($request->hasFile('image')) {
            $servicePath = public_path('uploads/service/');
            if (!file_exists($servicePath)) {
                mkdir($servicePath, 0777, true);
            }
            $fileName = $request->image->getClientOriginalName();
            $service_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->image->move($servicePath, $service_name);
            $service->image = $service_name;
        }
        if ($request->hasFile('webp_image')) {
            $servicePath = public_path('uploads/service/webp/');
            if (!file_exists($servicePath)) {
                mkdir($servicePath, 0777, true);
            }
            $fileName = $request->webp_image->getClientOriginalName();
            $service_name = time() . rand(1, 9999) . '.' . $fileName;
            $request->webp_image->move($servicePath, $service_name);
            $service->webp_image = $service_name;
        }
        if ($request->hasFile('brochure')) {
            $servicePath = public_path('uploads/service/brochure/');
            if (!file_exists($servicePath)) {
                mkdir($servicePath, 0777, true);
            }
            $fileName = $request->brochure->getClientOriginalName();
            $service_name = time() . rand(1, 9999) . '.' . $fileName;
            $request->brochure->move($servicePath, $service_name);
            $service->brochure = $service_name;
        }
        $service->title = $validatedData['title'];
        $service->short_url = $validatedData['short_url'];
        $service->icon_image_meta_tag = $validatedData['icon_image_meta_tag'];
        $service->image_meta_tag = $validatedData['image_meta_tag'];
        $service->home_description = $validatedData['home_description'];
        $service->first_description = $validatedData['first_description'];
        $service->second_title = $request->second_title ?? '';
        $service->second_description = $request->second_description ?? '';
        $service->meta_title = $request->meta_title ?? '';
        $service->meta_keyword = $request->meta_keyword ?? '';
        $service->meta_description = $request->meta_description ?? '';
        $service->other_meta_tag = $request->other_meta_tag ?? '';
        if ($service->save()) {
            session()->flash('message', 'Service "' . $service->title . '" has been added successfully');
            return redirect('admin/service/');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function service_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Service";
        $service = Service::find($id);
        if ($service) {
            $icon_image_with_path = url('uploads/service/icon/' . $service->icon_image);
            $icon_webp_image_with_path = url('uploads/service/icon/webp/' . $service->icon_webp_image);
            $image_with_path = url('uploads/service/' . $service->image);
            $webp_image_with_path = url('uploads/service/webp/' . $service->webp_image);
            $brochure_with_path = url('uploads/service/brochure/' . $service->brochure);
            return view('app.service.service_form',
                compact('key', 'service', 'title', 'icon_image_with_path',
                    'icon_webp_image_with_path', 'image_with_path', 'webp_image_with_path', 'brochure_with_path'));
        } else {
            return view('app/errors/404');
        }
    }

    public function service_view(Request $request, $id)
    {
        $key = "View";
        $title = "View Service";
        $service = Service::find($id);
        if ($service) {
            $icon_image_with_path = url('uploads/service/icon/' . $service->icon_image);
            $icon_webp_image_with_path = url('uploads/service/icon/webp/' . $service->icon_webp_image);
            $image_with_path = url('uploads/service/' . $service->image);
            $webp_image_with_path = url('uploads/service/webp/' . $service->webp_image);
            $brochure_with_path = url('uploads/service/brochure/' . $service->brochure);
            return view('app.service.service_view',
                compact('key', 'service', 'title', 'icon_image_with_path', 'icon_webp_image_with_path',
                    'image_with_path', 'webp_image_with_path', 'brochure_with_path'));
        } else {
            return view('app/errors/404');
        }
    }

    public function service_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2',
            'short_url' => 'required|unique:services,short_url,' . $id,
            'icon_image_meta_tag' => 'required|min:5',
            'image_meta_tag' => 'required|min:5',
            'home_description' => 'required',
            'brochure' => 'mimes:pdf',
        ]);
        $service = Service::find($id);
        if ($request->hasFile('icon_image')) {
            $servicePath = public_path('uploads/service/icon/');
            if (!file_exists($servicePath)) {
                mkdir($servicePath, 0777, true);
            }
            $fileName = $request->icon_image->getClientOriginalName();
            $service_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->icon_image->move($servicePath, $service_name);
            if ($service->icon_image != NULL) {
                unlink($servicePath . $service->icon_image);
            }
            $service->icon_image = $service_name;
        }
        if ($request->hasFile('icon_webp_image')) {
            $servicePath = public_path('uploads/service/icon/webp/');
            if (!file_exists($servicePath)) {
                mkdir($servicePath, 0777, true);
            }
            $fileName = $request->icon_webp_image->getClientOriginalName();
            $service_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->icon_webp_image->move($servicePath, $service_name);
            if ($service->icon_webp_image != NULL) {
                unlink($servicePath . $service->icon_webp_image);
            }
            $service->icon_webp_image = $service_name;
        }
        if ($request->hasFile('image')) {
            $servicePath = public_path('uploads/service/');
            if (!file_exists($servicePath)) {
                mkdir($servicePath, 0777, true);
            }
            $fileName = $request->image->getClientOriginalName();
            $service_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->image->move($servicePath, $service_name);
            if ($service->image != NULL) {
                unlink($servicePath . $service->image);
            }
            $service->image = $service_name;
        }
        if ($request->hasFile('webp_image')) {
            $servicePath = public_path('uploads/service/webp/');
            if (!file_exists($servicePath)) {
                mkdir($servicePath, 0777, true);
            }
            $fileName = $request->webp_image->getClientOriginalName();
            $service_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->webp_image->move($servicePath, $service_name);
            if ($service->webp_image != NULL) {
                unlink($servicePath . $service->webp_image);
            }
            $service->webp_image = $service_name;
        }
        if ($request->hasFile('brochure')) {
            $brochurePath = public_path('uploads/service/brochure/');
            if (!file_exists($brochurePath)) {
                mkdir($brochurePath, 0777, true);
            }
            $fileName = $request->brochure->getClientOriginalName();
            $brochure_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            if ($request->brochure->move($brochurePath, $brochure_name)) {
                if ($service->brochure != NULL) {
                    unlink($brochurePath . $service->brochure);
                }
            }
            $service->brochure = $brochure_name;
        }
        $service->title = $validatedData['title'];
        $service->short_url = $validatedData['short_url'];
        $service->icon_image_meta_tag = $validatedData['icon_image_meta_tag'];
        $service->image_meta_tag = $validatedData['image_meta_tag'];
        $service->home_description = $validatedData['home_description'];
        $service->first_description = $request->first_description;
        $service->second_title = $request->second_title ?? '';
        $service->second_description = $request->second_description ?? '';
        $service->meta_title = $request->meta_title ?? '';
        $service->meta_keyword = $request->meta_keyword ?? '';
        $service->meta_description = $request->meta_description ?? '';
        $service->other_meta_tag = $request->other_meta_tag ?? '';
        $service->updated_at = date('Y-m-d h:i:s');
        if ($service->save()) {
            session()->flash('message', 'Service "' . $service->title . '" has been updated successfully');
            return redirect('admin/service/');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_service(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $service = Service::find($request->id);
            if ($service) {
                $gallery = ServiceGallery::where('service_id', '=', $request->id)->count();
                if ($gallery > 0) {
                    return response()->json(['status' => false, 'message' => 'Error: Tagged with gallery']);
                } else {
                    $deleted = $service->delete();
                    if ($deleted == true) {
                        if ($service->icon_image != NULL) {
                            unlink(public_path('uploads/service/icon/' . $service->icon_image));
                        }
                        if ($service->icon_webp_image != NULL) {
                            unlink(public_path('uploads/service/icon/webp/' . $service->icon_webp_image));
                        }
                        if ($service->image != NULL) {
                            unlink(public_path('uploads/service/' . $service->image));
                        }
                        if ($service->webp_image != NULL) {
                            unlink(public_path('uploads/service/webp/' . $service->webp_image));
                        }
                        if ($service->brochure != NULL) {
                            unlink(public_path('uploads/service/brochure/' . $service->brochure));
                        }
                        return response()->json(['status' => true]);
                    } else {
                        return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                    }
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        }
    }

    public function delete_service_file(Request $request)
    {
        $typeData = explode('/', $request->type);
        $type = $typeData[0];
        $id = $typeData[1];
        if ($id) {
            $service = Service::find($id);
            $removalFile = $service->$type;
            $service->$type = NULL;
            if ($service->save()) {
                unlink(public_path('uploads/service/' . $type . '/' . $removalFile));
                return response()->json(['status' => true, 'message' => 'File has been removed']);
            } else {
                return response()->json(['status' => false, 'message' => 'Unable to remove the file']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Unable to find the file']);
        }
    }

    /******************** Service Gallery Section ***********************/

    public function gallery($service_id)
    {
        $title = "Gallery Images and Videos";
        $service = Service::with('galleries')->find($service_id);
        if ($service) {
            return view('app.service.gallery.gallery_list',
                compact('title', 'service_id', 'service'));
        } else {
            return view('app/errors/404');
        }
    }

    public function gallery_create($service_id)
    {
        $key = "Create";
        $service = Service::find($service_id);
        if ($service) {
            $title = "Create Gallery";
            return view('app.service.gallery.gallery_form', compact('key', 'title', 'service'));
        } else {
            return view('app/errors/404');
        }
    }

    public function gallery_store(Request $request)
    {
        $validatedData = $request->validate([
            'service_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image_meta_tag' => 'required|min:5',
        ]);
        $gallery = new ServiceGallery;
        if ($request->hasFile('image')) {
            $galleryPath = public_path('uploads/service/gallery/' . $request->service_id . '/');
            if (!file_exists($galleryPath)) {
                mkdir($galleryPath, 0777, true);
            }
            $fileName = $request->image->getClientOriginalName();
            $gallery_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->image->move($galleryPath, $gallery_name);
            $gallery->image = $gallery_name;
        }
        if ($request->hasFile('webp_image')) {
            $galleryPath = public_path('uploads/service/gallery/webp/' . $request->service_id . '/');
            if (!file_exists($galleryPath)) {
                mkdir($galleryPath, 0777, true);
            }
            $fileName = $request->webp_image->getClientOriginalName();
            $gallery_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->webp_image->move($galleryPath, $gallery_name);
            $gallery->webp_image = $gallery_name;
        }
        if ($request->video_url) {
            $type = "Video";
            $gallery->video_url = $request->video_url;
        } else {
            $type = "Image";
        }
        $gallery->service_id = $request->service_id;
        $gallery->image_meta_tag = $validatedData['image_meta_tag'];
        if ($gallery->save()) {
            session()->flash('message', 'Gallery ' . $type . ' has been added successfully');
            return redirect('admin/service/gallery/' . $request->service_id);
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function gallery_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Gallery";
        $gallery = ServiceGallery::find($id);
        if ($gallery) {
            $image_with_path = url('uploads/service/gallery/' . $gallery->service_id . '/' . $gallery->image);
            $webp_image_with_path = url('uploads/service/gallery/webp/' . $gallery->service_id . '/' . $gallery->webp_image);
            return view('app.service.gallery.gallery_form',
                compact('key', 'gallery', 'title', 'image_with_path', 'webp_image_with_path'));
        } else {
            return view('app/errors/404');
        }
    }

    public function gallery_view(Request $request, $id)
    {
        $key = "View";
        $title = "View Gallery";
        $gallery = ServiceGallery::with('service')->find($id);
        if ($gallery) {
            $image_with_path = url('uploads/service/gallery/' . $gallery->service_id . '/' . $gallery->image);
            $webp_image_with_path = url('uploads/service/gallery/webp/' . $gallery->service_id . '/' . $gallery->webp_image);
            return view('app.service.gallery.gallery_view',
                compact('key', 'gallery', 'title', 'image_with_path', 'webp_image_with_path'));
        } else {
            return view('app/errors/404');
        }
    }

    public function gallery_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'service_id' => 'required',
            'image_meta_tag' => 'required|min:5',
        ]);
        $gallery = ServiceGallery::find($id);
        if ($request->hasFile('image')) {
            $galleryPath = public_path('uploads/service/gallery/' . $request->service_id . '/');
            if (!file_exists($galleryPath)) {
                mkdir($galleryPath, 0777, true);
            }
            $fileName = $request->image->getClientOriginalName();
            $gallery_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            if ($gallery->image != NULL) {
                unlink($galleryPath . $gallery->image);
            }
            $request->image->move($galleryPath, $gallery_name);
            $gallery->image = $gallery_name;
        }
        if ($request->hasFile('webp_image')) {
            $galleryPath = public_path('uploads/service/gallery/webp/' . $request->service_id . '/');
            if (!file_exists($galleryPath)) {
                mkdir($galleryPath, 0777, true);
            }
            $fileName = $request->webp_image->getClientOriginalName();
            $gallery_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            if ($gallery->webp_image != NULL) {
                unlink($galleryPath . $gallery->webp_image);
            }
            $request->webp_image->move($galleryPath, $gallery_name);
            $gallery->webp_image = $gallery_name;
        }
        if ($request->video_url) {
            $type = "Video";
            $gallery->video_url = $request->video_url;
        } else {
            $type = "Image";
        }
        $gallery->image_meta_tag = $validatedData['image_meta_tag'];
        $gallery->video_url = $request->video_url;
        if ($gallery->save()) {
            session()->flash('message', 'Gallery ' . $type . ' has been updated successfully');
            return redirect('admin/service/gallery/' . $request->service_id);
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_gallery(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $gallery = ServiceGallery::find($request->id);
            if ($gallery) {
                unlink(public_path('uploads/service/gallery/' . $gallery->service_id . '/' . $gallery->image));
                unlink(public_path('uploads/service/gallery/webp/' . $gallery->service_id . '/' . $gallery->webp_image));
                $deleted = $gallery->delete();
                if ($deleted == true) {
                    return response()->json(['status' => true]);
                } else {
                    return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }

    /******************** Service Gallery Section ***********************/


    public function service_enquiry_list()
    {
        $title = "Service Enquiries List";
        $serviceEnquiryList = ServiceEnquiry::latest('id')->get();
        return view('app.enquiry.service.service_list', compact('serviceEnquiryList', 'title'));
    }

    public function service_enquiry_view($id)
    {
        $title = "View Service Enquiries";
        $serviceEnquiry = ServiceEnquiry::find($id);
        return view('app.enquiry.service.service_view', compact('serviceEnquiry', 'title'));
    }

    public function reply_to_service_enquiry(Request $request)
    {
        if (isset($request->reply) && $request->reply != NULL) {
            $serviceEnquiry = ServiceEnquiry::find($request->id);
            if ($serviceEnquiry) {
                DB::beginTransaction();
                $serviceEnquiry->reply = $request->reply;
                $serviceEnquiry->reply_date = date('Y-m-d h:i:s');
                if ($serviceEnquiry->save()) {
                    if (sendServiceEnquiryReply($serviceEnquiry)) {
                        DB::commit();
                        return response()->json(['status' => true, 'message' => 'Reply saved successfully']);
                    } else {
                        DB::rollBack();
                        return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                    }
                } else {
                    DB::rollBack();
                    return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }

    public function delete_service_enquiry(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $serviceEnquiry = ServiceEnquiry::find($request->id);
            if ($serviceEnquiry) {
                $deleted = $serviceEnquiry->delete();
                if ($deleted == true) {
                    return response()->json(['status' => true]);
                } else {
                    return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }

    public function delete_multiple_service_enquiry(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $serviceEnquiryArray = explode(',', $request->id);
            $successArray = array();
            foreach ($serviceEnquiryArray as $con) {
                $serviceEnquiry = ServiceEnquiry::find($con);
                $deleted = $serviceEnquiry->delete();
                if ($deleted == true) {
                    $successArray[] = '1';
                }
            }
            if ($successArray) {
                return response()->json(['status' => true]);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }

}
