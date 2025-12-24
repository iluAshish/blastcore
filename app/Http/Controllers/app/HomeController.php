<?php

namespace App\Http\Controllers\app;

use App\HomeHighlight;
use App\Http\Controllers\Controller;
use App\MetaData;
use App\NewsletterSubscription;
use App\HomeBanner;
use App\HomeAbout;
use App\OtherMetaData;
use App\ServiceRequest;
use App\ContactEnquiry;
use App\HomeGallery;
use App\SiteInformation;
use App\Testimonial;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        $title = "Dashboard";
        return view('app.home.landing', compact('title'));
    }

    public function slider_list()
    {
        $title = "Slider List";
        $sliderList = HomeBanner::get();
        return view('app.home.slider.slider_list', compact('sliderList', 'title'));
    }

    public function slider_create()
    {
        $key = "Create";
        $title = "Create Slider";
        return view('app.home.slider.slider_form', compact('key', 'title'));
    }

    public function slider_store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image_meta_tag' => 'required|min:5',
            // 'title' => 'required',
            // 'button_text' => 'required',
        ]);
        $slider = new HomeBanner;
        if ($request->hasFile('image')) {
            $sliderPath = public_path('uploads/home/slider/');
            if (!file_exists($sliderPath)) {
                mkdir($sliderPath, 0777, true);
            }
            $fileName = $request->image->getClientOriginalName();
            $slider_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->image->move($sliderPath, $slider_name);
            $slider->image = $slider_name;
        }
        if ($request->hasFile('webp_image')) {
            $sliderPath = public_path('uploads/home/slider/webp/');
            if (!file_exists($sliderPath)) {
                mkdir($sliderPath, 0777, true);
            }
            $fileName = $request->webp_image->getClientOriginalName();
            $slider_name = time() . rand(1, 9999) . '.' . $fileName;
            $request->webp_image->move($sliderPath, $slider_name);
            $slider->webp_image = $slider_name;
        }
        // mobile slider 
        if ($request->hasFile('mobile_image')) {
            $sliderPath = public_path('uploads/home/slider/');
            if (!file_exists($sliderPath)) {
                mkdir($sliderPath, 0777, true);
            }
            $fileName = $request->mobile_image->getClientOriginalName();
            $slider_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->mobile_image->move($sliderPath, $slider_name);
            $slider->mobile_image = $slider_name;
        }
        if ($request->hasFile('mobile_webp_image')) {
            $sliderPath = public_path('uploads/home/slider/webp/');
            if (!file_exists($sliderPath)) {
                mkdir($sliderPath, 0777, true);
            }
            $fileName = $request->mobile_webp_image->getClientOriginalName();
            $slider_name = time() . rand(1, 9999) . '.' . $fileName;
            $request->mobile_webp_image->move($sliderPath, $slider_name);
            $slider->mobile_webp_image = $slider_name;
        }
        $sort_order = HomeBanner::orderBy('sort_order', 'DESC')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $slider->title = $request->title ?? '';
        $slider->sub_title = $request->sub_title ?? '';
        $slider->tag_line = $request->tag_line ?? '';
        $slider->button_text = $request->button_text ?? '';
        $slider->button_url = $request->button_url ?? '';
        $slider->image_meta_tag = $validatedData['image_meta_tag'];
        $slider->mobile_image_meta_tag = $request->mobile_image_meta_tag ?? '';

        $slider->sort_order = $sort_number;
        if ($slider->save()) {
            session()->flash('message', "'Slider' has been added successfully");
            return redirect('admin/home/slider');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function slider_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Banner";
        $slider = HomeBanner::find($id);
        if ($slider) {
            $image_with_path = url('uploads/home/slider/' . $slider->image);
            $webp_image_with_path = url('uploads/home/slider/webp/' . $slider->webp_image);
            return view('app.home.slider.slider_form',
                compact('key', 'slider', 'title', 'image_with_path', 'webp_image_with_path'));
        } else {
            return view('app.errors.404');
        }
    }

    public function slider_view(Request $request, $id)
    {
        $title = "View Banner";
        $slider = HomeBanner::find($id);
        if ($slider) {
            $image_with_path = url('uploads/home/slider/' . $slider->image);
            $webp_image_with_path = url('uploads/home/slider/webp/' . $slider->webp_image);
            return view('app.home.slider.slider_view',
                compact('slider', 'title', 'image_with_path', 'webp_image_with_path'));
        } else {
            return view('app.errors.404');
        }
    }

    public function slider_update(Request $request, $id)
    {
        $slider = HomeBanner::find($id);
        $validatedData = $request->validate([
            // 'title' => 'required',
            // 'button_text' => 'required',
            'image_meta_tag' => 'required|min:5',
        ]);
        if ($request->hasFile('image')) {
            $sliderPath = public_path('uploads/home/slider/');
            if (!file_exists($sliderPath)) {
                mkdir($sliderPath, 0777, true);
            }
            $fileName = $request->image->getClientOriginalName();
            $slider_name = time() . rand(1, 9999) . '.' . $fileName;
            $request->image->move($sliderPath, $slider_name);
            if ($slider->image != NULL) {
                unlink($sliderPath . $slider->image);
            }
            $slider->image = $slider_name;
        }
        if ($request->hasFile('webp_image')) {
            $iconPath = public_path('uploads/home/slider/webp/');
            if (!file_exists($iconPath)) {
                mkdir($iconPath, 0777, true);
            }
            $fileName = $request->webp_image->getClientOriginalName();
            $icon_name = rand(1, 9999) . time() . '.' . $fileName;
            $request->webp_image->move($iconPath, $icon_name);
            if ($slider->webp_image != NULL) {
                unlink($iconPath . $slider->webp_image);
            }
            $slider->webp_image = $icon_name;
        }

        // mobile slider 
        if ($request->hasFile('mobile_image')) {
            $sliderPath = public_path('uploads/home/slider/');
            if (!file_exists($sliderPath)) {
                mkdir($sliderPath, 0777, true);
            }
            $fileName = $request->mobile_image->getClientOriginalName();
            $slider_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            
            if ($slider->mobile_image != NULL) {
                unlink($sliderPath . $slider->mobile_image);
            }
            $request->mobile_image->move($sliderPath, $slider_name);
            $slider->mobile_image = $slider_name;
        }
        if ($request->hasFile('mobile_webp_image')) {
            $sliderPath = public_path('uploads/home/slider/webp/');
            if (!file_exists($sliderPath)) {
                mkdir($sliderPath, 0777, true);
            }
            $fileName = $request->mobile_webp_image->getClientOriginalName();
            $slider_name = time() . rand(1, 9999) . '.' . $fileName;
            
            if ($slider->mobile_webp_image != NULL) {
                unlink($sliderPath . $slider->mobile_webp_image);
            }
            $request->mobile_webp_image->move($sliderPath, $slider_name);
            $slider->mobile_webp_image = $slider_name;
        }

       
        $slider->title = $request->title ?? '';
        $slider->sub_title = $request->sub_title ?? '';
        $slider->tag_line = $request->tag_line ?? '';
        $slider->button_text = $request->button_text ?? '';
        $slider->button_url = $request->button_url ?? '';
        $slider->image_meta_tag = $validatedData['image_meta_tag'];
        $slider->updated_at = date('Y-m-d h:i:s');
        if ($slider->save()) {
            session()->flash('message', "'Slider' has been updated successfully");
            return redirect('admin/home/slider');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_slider(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $slider = HomeBanner::find($request->id);
            if ($slider) {
                $slider->sort_order = null;
                $slider->save();
                unlink(public_path('uploads/home/slider/' . $slider->image));
                unlink(public_path('uploads/home/slider/webp/' . $slider->webp_image));
                $deleted = $slider->delete();
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

    public function home_about()
    {
        $key = "Update";
        $title = "Update About Information";
        $aboutCount = HomeAbout::count();
        $about = $first_image_with_path = $first_webp_image_with_path = '';
        $second_image_with_path = $second_webp_image_with_path = '';
        if ($aboutCount != 0) {
            $about = HomeAbout::first();
            $first_image_with_path = url('uploads/home_about/first_image/' . $about->first_image);
            $first_webp_image_with_path = url('uploads/home_about/first_webp_image/' . $about->first_webp_image);
            $second_image_with_path = url('uploads/home_about/second_image/' . $about->second_image);
            $second_webp_image_with_path = url('uploads/home_about/second_webp_image/' . $about->second_webp_image);
        }
        return view('app.home.about.about_form',
            compact('key', 'title', 'about', 'first_image_with_path', 'first_webp_image_with_path',
                'second_image_with_path', 'second_webp_image_with_path'));
    }

    public function home_about_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2',
            'first_description' => 'required',
            'first_image_meta_tag' => 'required',
            'second_image_meta_tag' => 'required',
            'button_text' => 'required',
            'button_url' => 'required',
        ]);
        if ($request->id == 0) {
            $request->validate([
                'first_image' => 'required',
                'second_image' => 'required',
            ]);
            $about = new HomeAbout;
        } else {
            $about = HomeAbout::find($request->id);
            $about->updated_at = date('Y-m-d h:i:s');
        }
        if ($request->hasFile('first_image')) {
            $aboutImagePath = public_path('uploads/home_about/first_image/');
            if (!file_exists($aboutImagePath)) {
                mkdir($aboutImagePath, 0777, true);
            }
            $fileName = $request->first_image->getClientOriginalName();
            $about_image_name = time() . rand(1, 9999) . '.' . $fileName;
            $request->first_image->move($aboutImagePath, $about_image_name);
            if ($request->id != '0' && $about->first_image != NULL) {
                unlink($aboutImagePath . $about->first_image);
            }
            $about->first_image = $about_image_name;
        }
        if ($request->hasFile('first_webp_image')) {
            $aboutImagePath = public_path('uploads/home_about/first_webp_image/');
            if (!file_exists($aboutImagePath)) {
                mkdir($aboutImagePath, 0777, true);
            }
            $fileName = $request->first_webp_image->getClientOriginalName();
            $about_image_name = time() . rand(1, 9999) . '.' . $fileName;
            $request->first_webp_image->move($aboutImagePath, $about_image_name);
            if ($request->id != '0' && $about->first_webp_image != NULL) {
                unlink($aboutImagePath . $about->first_webp_image);
            }
            $about->first_webp_image = $about_image_name;
        }
        if ($request->hasFile('second_image')) {
            $aboutImagePath = public_path('uploads/home_about/second_image/');
            if (!file_exists($aboutImagePath)) {
                mkdir($aboutImagePath, 0777, true);
            }
            $fileName = $request->second_image->getClientOriginalName();
            $about_image_name = time() . rand(1, 9999) . '.' . $fileName;
            $request->second_image->move($aboutImagePath, $about_image_name);
            if ($request->id != '0' && $about->second_image != NULL) {
                unlink($aboutImagePath . $about->second_image);
            }
            $about->second_image = $about_image_name;
        }
        if ($request->hasFile('second_webp_image')) {
            $aboutImagePath = public_path('uploads/home_about/second_webp_image/');
            if (!file_exists($aboutImagePath)) {
                mkdir($aboutImagePath, 0777, true);
            }
            $fileName = $request->second_webp_image->getClientOriginalName();
            $about_image_name = time() . rand(1, 9999) . '.' . $fileName;
            $request->second_webp_image->move($aboutImagePath, $about_image_name);
            if ($request->id != '0' && $about->second_webp_image != NULL) {
                unlink($aboutImagePath . $about->second_webp_image);
            }
            $about->second_webp_image = $about_image_name;
        }
        $about->title = $validatedData['title'];
        $about->sub_title = $request->sub_title ?? '';
        $about->first_description = $validatedData['first_description'];
        $about->second_description = $request->second_description ?? '';
        $about->button_text = $validatedData['button_text'];
        $about->button_url = $validatedData['button_url'];
        $about->first_image_meta_tag = $validatedData['first_image_meta_tag'];
        $about->second_image_meta_tag = $validatedData['second_image_meta_tag'];
        if ($about->save()) {
            session()->flash('message', "'About' content has been updated successfully");
            return redirect('admin/home/about/');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function home_about_image_delete(Request $request)
    {
        $homeAbout = HomeAbout::first();
        if ($homeAbout) {
            $type = $request->type;
            $removalFile = $homeAbout->$type;
            $homeAbout->$type = NULL;
            if ($homeAbout->save()) {
                unlink(public_path('uploads/home_about/' . $request->type . '/' . $removalFile));
                return response()->json(['status' => true, 'message' => 'File has been removed']);
            } else {
                return response()->json(['status' => false, 'message' => 'Unable to remove the file']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Unable to find the file']);
        }
    }

    public function home_highlight()
    {
        $key = "Update";
        $title = "Update Highlight Information";
        $highlightCount = HomeHighlight::count();
        $highlight = '';
        if ($highlightCount != 0) {
            $highlight = HomeHighlight::first();
        }
        return view('app.home.highlight.highlight_form',
            compact('key', 'title', 'highlight'));
    }

    public function home_highlight_store(Request $request)
    {
        if ($request->id == 0) {
            $highlight = new HomeHighlight;
        } else {
            $highlight = HomeHighlight::find($request->id);
            $highlight->updated_at = date('Y-m-d h:i:s');
        }
        $highlight->first_number = $request->first_number ?? '';
        $highlight->first_title = $request->first_title ?? '';
        $highlight->second_number = $request->second_number ?? '';
        $highlight->second_title = $request->second_title ?? '';
        $highlight->third_number = $request->third_number ?? '';
        $highlight->third_title = $request->third_title ?? '';
        if ($highlight->save()) {
            session()->flash('message', "'Highlight' content has been updated successfully");
            return redirect('admin/home/highlight/');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function meta_data($type)
    {
        $type = trim(ucfirst($type));
        $key = "Update";
        $title = "Update " . $type;
        $meta_data = MetaData::where('page_name', '=', $type)->first();
        return view('app.meta_data.meta_data_form', compact('key', 'title', 'meta_data', 'type'));
    }

    public function meta_data_store(Request $request)
    {
        $type_array = array('Home', 'About', 'Products', 'Blogs', 'Contact');
        if (in_array($request->page_name, $type_array)) {
            $validatedData = $request->validate([
                'page_name' => 'required|min:2',
                'meta_title' => 'required|min:2',
                'meta_description' => 'required|min:2',
                'meta_keyword' => 'required|min:2'
            ]);
            if ($request->id == 0) {
                $meta_data = new MetaData;
            } else {
                $meta_data = MetaData::find($request->id);
                $meta_data->updated_at = date('Y-m-d h:i:s');
            }
            $meta_data->page_name = $validatedData['page_name'];
            $meta_data->meta_title = $validatedData['meta_title'];
            $meta_data->meta_description = $validatedData['meta_description'];
            $meta_data->meta_keyword = $validatedData['meta_keyword'];
            $meta_data->other_meta_tag = isset($request->other_meta_tag) ? $request->other_meta_tag : '';
            if ($meta_data->save()) {
                session()->flash('message', '"' . $request->page_name . '" page meta data content has been updated successfully');
                return redirect('admin/meta_data/' . strtolower($request->page_name));
            } else {
                return back()->with('message', 'Error while updating the meta data content');
            }
        } else {
            abort(403, 'Requested type ' . $request->page_name . ' does not exist');
        }
    }

    public function other_meta_data()
    {
        $key = "Update";
        $title = "Update Other Tag";
        $meta_data = OtherMetaData::first();
        return view('app.meta_data.other_meta_data_form', compact('key', 'title', 'meta_data'));
    }

    public function other_meta_data_store(Request $request)
    {
        if ($request->id == 0) {
            $meta_data = new OtherMetaData();
        } else {
            $meta_data = OtherMetaData::find($request->id);
            $meta_data->updated_at = date('Y-m-d h:i:s');
        }
        $meta_data->header_tag = $request->header_tag ?? '';
        $meta_data->body_tag = $request->body_tag ?? '';
        $meta_data->footer_tag = $request->footer_tag ?? '';
        if ($meta_data->save()) {
            session()->flash('message', 'Tag content has been updated successfully');
            return redirect('admin/other_meta_data/');
        } else {
            return back()->with('message', 'Error while updating the tag content');
        }
    }

    public function contact_enquiry_list()
    {
        $title = "Contact Enquiries List";
        $contactList = ContactEnquiry::latest('id')->get();
        return view('app.enquiry.contact.contact_list', compact('contactList', 'title'));
    }

    public function contact_enquiry_view($id)
    {
        $title = "View Contact Enquiries";
        $contact = ContactEnquiry::find($id);
        return view('app.enquiry.contact.contact_view', compact('contact', 'title'));
    }

    public function reply_to_contact_enquiry(Request $request)
    {
        if (isset($request->reply) && $request->reply != NULL) {
            $contact = ContactEnquiry::find($request->id);
            if ($contact) {
                DB::beginTransaction();
                $contact->reply = $request->reply;
                $contact->reply_date = date('Y-m-d h:i:s');
                if ($contact->save()) {
                    if (sendContactReply($contact)) {
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

    public function delete_contact_enquiry(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $contact = ContactEnquiry::find($request->id);
            if ($contact) {
                $deleted = $contact->delete();
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

    public function delete_multiple_contact_enquiry(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $contactArray = explode(',', $request->id);
            $successArray = array();
            foreach ($contactArray as $con) {
                $contact = ContactEnquiry::find($con);
                $deleted = $contact->delete();
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

    public function sort_order(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $table = $request->table;
            $appPrefix = 'App';
            $model = $appPrefix . '\\' . $table;
            if ($request->extra != NULL) {
                $sortOrder = $model::where([['sort_order', '=', $request->sort_order], [$request->extra, '=', $request->extra_key], ['id', '!=', $request->id]])->count();
            } else {
                $sortOrder = $model::where([['sort_order', '=', $request->sort_order], ['id', '!=', $request->id]])->count();
            }
            if ($sortOrder) {
                return response()->json(['status' => false, 'message' => 'Sort order "' . $request->sort_order . '" has been already taken']);
            } else {
                $data = $model::find($request->id);
                $data->sort_order = $request->sort_order;
                if ($data->save()) {
                    return response()->json(['status' => true, 'message' => 'Sort order updated successfully']);
                } else {
                    return response()->json(['status' => false, 'message' => 'Error while updating the sort order']);
                }
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }

    public function newsletter()
    {
        $title = "Newsletter Subscriptions";
        $contactList = NewsletterSubscription::latest('id')->get();
        return view('app.newsletter.newsletter_list', compact('contactList', 'title'));
    }

    public function delete_newsletter(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $newsletter = NewsletterSubscription::find($request->id);
            if ($newsletter) {
                $deleted = $newsletter->delete();
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

    public function delete_multi_newsletter(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $contactArray = explode(',', $request->id);
            $successArray = array();
            foreach ($contactArray as $con) {
                $contact = NewsletterSubscription::find($con);
                $deleted = $contact->delete();
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

    public function status_change(Request $request)
    {
        $table = $request->table;
        $state = $request->state;
        $primary_key = $request->primary_key;
        if ($state == 'true') {
            $status = "Active";
        } else {
            $status = "Inactive";
        }
        $appPrefix = 'App';
        $model = $appPrefix . '\\' . $table;
        $data = $model::find($primary_key);
        $data->status = $status;
        if ($data->save()) {
            echo "1";
        } else {
            echo "2";
        }
    }

    public function toggle_state(Request $request)
    {
        $table = $request->table;
        $field = $request->field;
        $id = $request->id;
        $model = 'App\\' . $table;
        $item = $model::find($id);
        $state = $item->$field;
        if ($state == 0) $item->$field = 1;
        if ($state == 1) $item->$field = 0;
        if ($item->save()) {
            return response()->json(['status' => true, 'message' => 'State Changed successfully.']);
        } else {
            return response()->json(['status' => false, 'message' => 'Error occurred while changing State.']);
        }
    }

    public function testimonial_list()
    {
        $title = "Testimonial List";
        $testimonialLists  = Testimonial::get();
        return view('app.home.testimonial.testimonial_list', compact('testimonialLists', 'title'));
    }

    public function testimonial_create()
    {
        $key = "Create";
        $title = "Create Testimonial";
        return view('app.home.testimonial.testimonial_form', compact('key', 'title'));
    }

    public function testimonial_store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required',
            'position' => 'required',
        ]);
        $testimonial = new Testimonial;
        if ($request->hasFile('image')) {
            $testimonialPath = public_path('uploads/home/testimonial/');
            if (!file_exists($testimonialPath)) {
                mkdir($testimonialPath, 0777, true);
            }
            $fileName = $request->image->getClientOriginalName();
            $testimonial_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->image->move($testimonialPath, $testimonial_name);
            $testimonial->image = $testimonial_name;
        }
        if ($request->hasFile('webp_image')) {
            $testimonialPath = public_path('uploads/home/testimonial/webp/');
            if (!file_exists($testimonialPath)) {
                mkdir($testimonialPath, 0777, true);
            }
            $fileName = $request->webp_image->getClientOriginalName();
            $testimonial_name = time() . rand(1, 9999) . '.' . $fileName;
            $request->webp_image->move($testimonialPath, $testimonial_name);
            $testimonial->image_webp = $testimonial_name;
        }
       
        $testimonial->name = $request->name ?? '';
        $testimonial->position = $request->position ?? '';
        $testimonial->description = $request->description ?? '';
        if ($testimonial->save()) {
            session()->flash('message', "'Testimonial' has been added successfully");
            return redirect('admin/home/testimonial/list');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function testimonial_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Testimonial";
        $testimonial = Testimonial::find($id);
        if ($testimonial) {
            $image_with_path = url('uploads/home/testimonial/' . $testimonial->image);
            $webp_image_with_path = url('uploads/home/testimonial/webp/' . $testimonial->webp_image);
            return view('app.home.testimonial.testimonial_form',
                compact('key', 'testimonial', 'title', 'image_with_path', 'webp_image_with_path'));
        } else {
            return view('app.errors.404');
        }
    }

    public function testimonial_view(Request $request, $id)
    {
        $title = "View Testimonial";
        $testimonial = Testimonial::find($id);
        if ($testimonial) {
            $image_with_path = url('uploads/home/testimonial/' . $testimonial->image);
            $webp_image_with_path = url('uploads/home/testimonial/webp/' . $testimonial->image_webp);
            return view('app.home.testimonial.testimonial_view',
                compact('testimonial', 'title', 'image_with_path', 'webp_image_with_path'));
        } else {
            return view('app.errors.404');
        }
    }

    public function testimonial_update(Request $request, $id)
    {
        $testimonial = Testimonial::find($id);
        $validatedData = $request->validate([
            'name' => 'required',
            'position' => 'required',
            // 'image_meta_tag' => 'required|min:5',
        ]);
        if ($request->hasFile('image')) {
            $testimonialPath = public_path('uploads/home/testimonial/');
            if (!file_exists($testimonialPath)) {
                mkdir($testimonialPath, 0777, true);
            }
            $fileName = $request->image->getClientOriginalName();
            $testimonial_name = time() . rand(1, 9999) . '.' . $fileName;
            $request->image->move($testimonialPath, $testimonial_name);
            if ($testimonial->image != NULL) {
                unlink($testimonialPath . $testimonial->image);
            }
            $testimonial->image = $testimonial_name;
        }
        if ($request->hasFile('webp_image')) {
            $iconPath = public_path('uploads/home/testimonial/webp/');
            if (!file_exists($iconPath)) {
                mkdir($iconPath, 0777, true);
            }
            $fileName = $request->webp_image->getClientOriginalName();
            $icon_name = rand(1, 9999) . time() . '.' . $fileName;
            $request->webp_image->move($iconPath, $icon_name);
            if ($testimonial->image_webp != NULL) {
                unlink($iconPath . $testimonial->image_webp);
            }
            $testimonial->image_webp = $icon_name;
        }
        $testimonial->name = $request->name ?? '';
        $testimonial->position = $request->position ?? '';
        $testimonial->image_attribute = $request->image_attribute ?? '';
        $testimonial->updated_at = date('Y-m-d h:i:s');
        if ($testimonial->save()) {
            session()->flash('message', "'Testimonial' has been updated successfully");
            return redirect('admin/home/testimonial/list');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_testimonial(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $testimonial = Testimonial::find($request->id);
            if ($testimonial) {
                $testimonial->sort_order = null;
                $testimonial->save();
                unlink(public_path('uploads/home/testimonial/' . $testimonial->image));
                unlink(public_path('uploads/home/testimonial/webp/' . $testimonial->image_webp));
                $deleted = $testimonial->delete();
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

    public function gallery_list()
    {
        $title = "Gallery List";
        $galleryLists  = HomeGallery::get();
        return view('app.home.gallery.gallery_list', compact('galleryLists', 'title'));
    }

    public function gallery_create()
    {
        $key = "Create";
        $title = "Create Gallery";
        return view('app.home.gallery.gallery_form', compact('key', 'title'));
    }

    public function gallery_store(Request $request)
    {
        if ($request->hasFile('image')) {

            foreach ($request->file('image') as $key => $image) {

                $gallery = new HomeGallery();

                // JPG / PNG image
                $imagePath = public_path('uploads/home/gallery/');
                if (!file_exists($imagePath)) {
                    mkdir($imagePath, 0777, true);
                }

                $imageName = time().'_'.$key.'_'.rand(100,999).'.'.$image->getClientOriginalExtension();
                $image->move($imagePath, $imageName);
                $gallery->image = $imageName;

                $sort_order = HomeGallery::orderBy('sort_order', 'DESC')->first();
                if ($sort_order) {
                    $sort_number = ($sort_order->sort_order + 1);
                } else {
                    $sort_number = 1;
                }
                $gallery->sort_order = $sort_number;
                $gallery->save();
            }
            session()->flash('message', "'Gallery' images have been added successfully");
            return redirect('admin/home/gallery/list');
        }else {
            return back()->withInput($request->input())->withErrors("Error while uploading the images");
        }
        
    }

    public function gallery_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Gallery";
        $gallery = HomeGallery::find($id);
        if ($gallery) {
            $image_with_path = url('uploads/home/gallery/' . $gallery->image);
            return view('app.home.gallery.gallery_form',
                compact('key', 'gallery', 'title', 'image_with_path'));
        } else {
            return view('app.errors.404');
        }
    }


    public function gallery_update(Request $request, $id)
    {
        $gallery = HomeGallery::find($id);
        if ($request->hasFile('image')) {
            $galleryPath = public_path('uploads/home/gallery/');
            if (!file_exists($galleryPath)) {
                mkdir($galleryPath, 0777, true);
            }
            $fileName = $request->image->getClientOriginalName();
            $gallery_name = time() . rand(1, 9999) . '.' . $fileName;
            $request->image->move($galleryPath, $gallery_name);
            if ($gallery->image != NULL) {
                unlink($galleryPath . $gallery->image);
            }
            $gallery->image = $gallery_name;
        }
        $gallery->updated_at = date('Y-m-d h:i:s');
        if ($gallery->save()) {
            session()->flash('message', "'Gallery' has been updated successfully");
            return redirect('admin/home/gallery/list');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_gallery(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $gallery = HomeGallery::find($request->id);
            if ($gallery) {
                $gallery->sort_order = null;
                $gallery->save();
                unlink(public_path('uploads/home/gallery/' . $gallery->image));
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
}
