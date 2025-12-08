<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SiteInformation;
use App\ContactInformation;

class SiteController extends Controller
{
    public function site_content()
    {
        $key = "Update";
        $title = "Update Site Information";
        $siteCount = SiteInformation::count();
        $site = $logo_with_path = $webp_logo_with_path = $product_brochure_with_path = $service_brochure_with_path = '';
        if ($siteCount != 0) {
            $site = SiteInformation::first();
            $logo_with_path = url('uploads/site/' . $site->logo);
            $webp_logo_with_path = url('uploads/site/webp/' . $site->webp_logo);
            $product_brochure_with_path = url('uploads/site/product_brochure/' . $site->product_brochure);
            $service_brochure_with_path = url('uploads/site/service_brochure/' . $site->service_brochure);
        }
        return view('app.site.site_form',
            compact('key', 'title', 'site', 'logo_with_path', 'webp_logo_with_path',
                'product_brochure_with_path', 'service_brochure_with_path'));
    }

    public function site_content_store(Request $request)
    {
        if ($request->id == 0) {
            $site = new SiteInformation;
        } else {
            $site = SiteInformation::find($request->id);
            $site->updated_at = date('Y-m-d h:i:s');
        }
        if ($request->hasFile('logo')) {
            $siteImagePath = public_path('uploads/site/logo/');
            if (!file_exists($siteImagePath)) {
                mkdir($siteImagePath, 0777, true);
            }
            if ($request->id != '0' && $site->logo != NULL) {
                unlink($siteImagePath . $site->logo);
            }
            $fileName = $request->logo->getClientOriginalName();
            $site_logo_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->logo->move($siteImagePath, $site_logo_name);
            $site->logo = $site_logo_name;
        }
        if ($request->hasFile('webp_logo')) {
            $siteImagePath = public_path('uploads/site/logo/webp/');
            if (!file_exists($siteImagePath)) {
                mkdir($siteImagePath, 0777, true);
            }
            if ($request->id != '0' && $site->webp_logo != NULL) {
                unlink($siteImagePath . $site->webp_logo);
            }
            $fileName = $request->webp_logo->getClientOriginalName();
            $site_logo_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->webp_logo->move($siteImagePath, $site_logo_name);
            $site->webp_logo = $site_logo_name;
        }
        if ($request->hasFile('product_brochure')) {
            $siteBrochurePath = public_path('uploads/site/product_brochure/');
            if (!file_exists($siteBrochurePath)) {
                mkdir($siteBrochurePath, 0777, true);
            }
            if ($request->id != '0' && $site->product_brochure != NULL) {
                unlink($siteBrochurePath . $site->product_brochure);
            }
            $fileName = $request->product_brochure->getClientOriginalName();
            $site_brochure_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->product_brochure->move($siteBrochurePath, $site_brochure_name);
            $site->product_brochure = $site_brochure_name;
        }
        if ($request->hasFile('service_brochure')) {
            $siteBrochurePath = public_path('uploads/site/service_brochure/');
            if (!file_exists($siteBrochurePath)) {
                mkdir($siteBrochurePath, 0777, true);
            }
            if ($request->id != '0' && $site->service_brochure != NULL) {
                unlink($siteBrochurePath . $site->service_brochure);
            }
            $fileName = $request->service_brochure->getClientOriginalName();
            $site_brochure_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->service_brochure->move($siteBrochurePath, $site_brochure_name);
            $site->service_brochure = $site_brochure_name;
        }
        $site->logo_meta_tag = $request->logo_meta_tag ?? '';
        $site->whatsapp_number = $request->whatsapp_number ?? '';
        $site->phone_number = $request->phone_number ?? '';
        $site->email = $request->email ?? '';
        $site->email_name = $request->email_name ?? '';
        $site->facebook_url = $request->facebook_url ?? '';
        $site->instagram_url = $request->instagram_url ?? '';
        $site->linkedin_url = $request->linkedin_url ?? '';
        $site->youtube_url = $request->youtube_url ?? '';
        if ($site->save()) {
            session()->flash('message', "'Site Information' has been updated successfully");
            return redirect('admin/site/content');
        } else {
            return back()->with('message', 'Error while updating the site content');
        }
    }

    public function site_content_image_delete(Request $request)
    {
        $site = SiteInformation::find(1);
        if ($site) {
            $type = $request->type;
            $removalFile = $site->$type;
            $site->$type = NULL;
            if ($site->save()) {
                unlink(public_path('uploads/site/' . $request->type . '/' . $removalFile));
                return response()->json(['status' => true, 'message' => 'File has been removed']);
            } else {
                return response()->json(['status' => false, 'message' => 'Unable to remove the file']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Unable to find the file']);
        }
    }

    public function contact_content_list()
    {
        $title = "Contact Information List";
        $contactContentList = ContactInformation::get();
        return view('app.site.contact.contact_content_list', compact('contactContentList', 'title'));
    }

    public function contact_content_create()
    {
        $key = "Create";
        $title = "Create Contact Information";
        return view('app.site.contact.contact_content_form', compact('key', 'title'));
    }

    public function contact_content_store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'working_hours' => 'required',
            'map_title' => 'required',
            'map' => 'required',
        ]);
        $contactContent = new ContactInformation;
        $contactContent->address = $request->address;
        $contactContent->email = $request->email;
        $contactContent->alternate_email = $request->alternate_email;
        $contactContent->phone_number = $request->phone_number;
        $contactContent->alternate_phone_number = $request->alternate_phone_number;
        $contactContent->working_hours = $request->working_hours;
        $contactContent->map_title = $request->map_title;
        $contactContent->map = $request->map;
        if ($contactContent->save()) {
            session()->flash('message', 'Contact Information has been created successfully');
            return redirect('admin/site/contact');
        } else {
            return back()->withInput($request->input())->withErrors("Error while creating the content");
        }
    }

    public function contact_content_view(Request $request, $id)
    {
        $title = "View Contact Information";
        $contactContent = ContactInformation::find($id);
        if ($contactContent) {
            return view('app.site.contact.contact_content_view',
                compact('contactContent', 'title'));
        } else {
            return view('app/errors/404');
        }
    }

    public function contact_content_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Contact Information";
        $contactContent = ContactInformation::find($id);
        if ($contactContent) {
            return view('app.site.contact.contact_content_form',
                compact('contactContent', 'title', 'key'));
        } else {
            return view('app/errors/404');
        }
    }

    public function contact_content_update(Request $request, $id)
    {
        $contactContent = ContactInformation::find($id);
        $request->validate([
            'address' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'working_hours' => 'required',
            'map_title' => 'required',
            'map' => 'required',
        ]);
        $contactContent->address = $request->address;
        $contactContent->email = $request->email;
        $contactContent->alternate_email = $request->alternate_email;
        $contactContent->phone_number = $request->phone_number;
        $contactContent->alternate_phone_number = $request->alternate_phone_number;
        $contactContent->working_hours = $request->working_hours;
        $contactContent->map_title = $request->map_title;
        $contactContent->map = $request->map;
        $contactContent->updated_at = date('Y-m-d h:i:s');
        if ($contactContent->save()) {
            session()->flash('message', 'Contact Information has been updated successfully');
            return redirect('admin/site/contact');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_contact_content(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $contactContent = ContactInformation::find($request->id);
            if ($contactContent) {
                $deleted = $contactContent->delete();
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

    public function contact_content()
    {
        $key = "Update";
        $title = "Update Contact Page Content";
        $siteCount = ContactInformation::count();
        $site = '';
        if ($siteCount != 0) {
            $site = ContactInformation::first();
        }
        return view('app.site.contact_form', compact('key', 'title', 'site'));
    }

    public function contact_content_store1(Request $request)
    {
        if ($request->id == 0) {
            $site = new ContactInformation;
        } else {
            $site = ContactInformation::find($request->id);
            $site->updated_at = date('Y-m-d h:i:s');
        }
        $site->title = isset($request['title']) ? $request['title'] : '';
        $site->description = isset($request['description']) ? $request['description'] : '';
        $site->sub_title = isset($request['sub_title']) ? $request['sub_title'] : '';
        $site->sub_description = isset($request['sub_description']) ? $request['sub_description'] : '';
        $site->address = isset($request['address']) ? $request['address'] : '';
        $site->phone_number = isset($request['phone_number']) ? $request['phone_number'] : '';
        $site->alternate_phone_number = isset($request['alternate_phone_number']) ? $request['alternate_phone_number'] : '';
        $site->email_id = isset($request['email_id']) ? $request['email_id'] : '';
        $site->alternate_email_id = isset($request['alternate_email_id']) ? $request['alternate_email_id'] : '';
        $site->button_text = isset($request['button_text']) ? $request['button_text'] : '';
        $site->follow_text = isset($request['follow_text']) ? $request['follow_text'] : '';
        $site->map = isset($request['map']) ? $request['map'] : '';
        $site->fb = isset($request['fb']) ? $request['fb'] : '';
        $site->instagram = isset($request['instagram']) ? $request['instagram'] : '';
        $site->twitter = isset($request['twitter']) ? $request['twitter'] : '';
        $site->linkedin = isset($request['linkedin']) ? $request['linkedin'] : '';
        $site->youtube = isset($request['youtube']) ? $request['youtube'] : '';
        if ($site->save()) {
            session()->flash('message', "'Contact page' content has been updated successfully");
            return redirect('admin/contact_content/');
        } else {
            return back()->with('message', 'Error while updating the site content');
        }
    }
}
