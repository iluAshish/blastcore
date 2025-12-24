<?php

namespace App\Http\Controllers\app;

use App\AboutBrandHighlight;
use App\AboutOurBrand;
use App\Http\Controllers\Controller;
use App\WhyChooseUs;
use Illuminate\Http\Request;
use App\AboutUs;
use App\SuccessStory;

class AboutController extends Controller
{
    public function about()
    {
        $key = "Update";
        $title = "Update About Content";
        $aboutCount = AboutUs::count();
        $about = $first_image_with_path = $first_webp_image_with_path = '';
        $second_image_with_path = $second_webp_image_with_path = '';
        $video_thumbnail_image_with_path = $webp_video_thumbnail_image_with_path = '';
        if ($aboutCount != 0) {
            $about = AboutUs::first();
            $first_image_with_path = url('uploads/about/about_us/first_image/' . $about->first_image);
            $first_webp_image_with_path = url('uploads/about/about_us/first_webp_image/' . $about->first_webp_image);
            $second_image_with_path = url('uploads/about/about_us/second_image/' . $about->second_image);
            $second_webp_image_with_path = url('uploads/about/about_us/second_webp_image/' . $about->second_webp_image);
            $video_thumbnail_image_with_path = url('uploads/about/about_us/video_thumbnail_image/' . $about->video_thumbnail_image);
            $webp_video_thumbnail_image_with_path = url('uploads/about/about_us/webp_video_thumbnail_image/' . $about->webp_video_thumbnail_image);
        }
        return view('app.about.about_us.about_us_form',
            compact('key', 'title', 'about', 'first_image_with_path', 'first_webp_image_with_path',
                'second_image_with_path', 'second_webp_image_with_path', 'video_thumbnail_image_with_path',
                'webp_video_thumbnail_image_with_path'));
    }

    public function about_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2',
            'first_description' => 'required',
            'first_image_meta_tag' => 'required',
            'second_image_meta_tag' => 'required',
            'video_url' => 'required',
            'video_thumbnail_image_meta_tag' => 'required',
            'mission_title' => 'required',
            'mission_description' => 'required',
            'vision_title' => 'required',
            'vision_description' => 'required',
        ]);
        if ($request->id == 0) {
            $request->validate([
                'first_image' => 'required',
//                'first_webp_image' => 'required',
                'second_image' => 'required',
//                'second_webp_image' => 'required',
                'video_thumbnail_image' => 'required',
            ]);
            $about = new AboutUs;
        } else {
            $about = AboutUs::find($request->id);
            $about->updated_at = date('Y-m-d h:i:s');
        }
        if ($request->hasFile('first_image')) {
            $aboutImagePath = public_path('uploads/about/about_us/first_image/');
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
            $aboutImagePath = public_path('uploads/about/about_us/first_webp_image/');
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
            $aboutImagePath = public_path('uploads/about/about_us/second_image/');
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
            $aboutImagePath = public_path('uploads/about/about_us/second_webp_image/');
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
        if ($request->hasFile('video_thumbnail_image')) {
            $video_thumbnail_imagePath = public_path('uploads/about/about_us/video_thumbnail_image/');
            if (!file_exists($video_thumbnail_imagePath)) {
                mkdir($video_thumbnail_imagePath, 0777, true);
            }
            $fileName = $request->video_thumbnail_image->getClientOriginalName();
            $video_thumbnail_image_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->video_thumbnail_image->move($video_thumbnail_imagePath, $video_thumbnail_image_name);
            $about->video_thumbnail_image = $video_thumbnail_image_name;
        }
        if ($request->hasFile('webp_video_thumbnail_image')) {
            $video_thumbnail_imagePath = public_path('uploads/about/about_us/webp_video_thumbnail_image/');
            if (!file_exists($video_thumbnail_imagePath)) {
                mkdir($video_thumbnail_imagePath, 0777, true);
            }
            $fileName = $request->webp_video_thumbnail_image->getClientOriginalName();
            $video_thumbnail_image_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->webp_video_thumbnail_image->move($video_thumbnail_imagePath, $video_thumbnail_image_name);
            $about->webp_video_thumbnail_image = $video_thumbnail_image_name;
        }
        $about->title = $validatedData['title'];
        $about->sub_title = $request->sub_title ?? '';
        $about->first_description = $validatedData['first_description'];
        $about->second_description = $request->second_description ?? '';
        $about->first_image_meta_tag = $request->first_image_meta_tag ?? '';
        $about->second_image_meta_tag = $request->second_image_meta_tag ?? '';
        $about->video_url = $request->video_url;
        $about->video_thumbnail_image_meta_tag = $request->video_thumbnail_image_meta_tag ?? '';
        $about->mission_title = $validatedData['mission_title'];
        $about->mission_description = $validatedData['mission_description'];
        $about->vision_title = $validatedData['vision_title'];
        $about->vision_description = $validatedData['vision_description'];
        if ($about->save()) {
            session()->flash('message', 'About Us content has been updated successfully');
            return redirect('admin/about/about_us');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function about_image_delete(Request $request)
    {
        $about = AboutUs::find(1);
        if ($about) {
            $type = $request->type;
            $removalFile = $about->$type;
            $about->$type = NULL;
            if ($about->save()) {
                unlink(public_path('uploads/about/about_us/' . $request->type . '/' . $removalFile));
                return response()->json(['status' => true, 'message' => 'File has been removed']);
            } else {
                return response()->json(['status' => false, 'message' => 'Unable to remove the file']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Unable to find the file']);
        }
    }

    public function why_choose_us_list()
    {
        $title = "Why Choose Us List";
        $whyChooseUsList = WhyChooseUs::get();
        return view('app.about.why_choose_us.why_choose_us_list', compact('whyChooseUsList', 'title'));
    }

    public function why_choose_us_create()
    {
        $key = "Create";
        $title = "Create Why Choose Us";
        return view('app.about.why_choose_us.why_choose_us_form', compact('key', 'title'));
    }

    public function why_choose_us_store(Request $request)
    {
        $validatedData = $request->validate([
            'number' => 'required',
            'title' => 'required',
        ]);
        $why_choose_us = new WhyChooseUs;
        $why_choose_us->number = $validatedData['number'];
        $why_choose_us->title = $validatedData['title'];
        if ($why_choose_us->save()) {
            session()->flash('message', 'Why Choose Us has been created successfully');
            return redirect('admin/about/why_choose_us/list');
        } else {
            return back()->withInput($request->input())->withErrors("Error while creating the content");
        }
    }

    public function why_choose_us_view(Request $request, $id)
    {
        $title = "View Why Choose Us";
        $why_choose_us = WhyChooseUs::find($id);
        if ($why_choose_us) {
            return view('app.about.why_choose_us.why_choose_us_view',
                compact('why_choose_us', 'title'));
        } else {
            return view('app/errors/404');
        }
    }

    public function why_choose_us_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Why Choose Us";
        $why_choose_us = WhyChooseUs::find($id);
        if ($why_choose_us) {
            return view('app.about.why_choose_us.why_choose_us_form',
                compact('why_choose_us', 'title', 'key'));
        } else {
            return view('app/errors/404');
        }
    }

    public function why_choose_us_update(Request $request, $id)
    {
        $why_choose_us = WhyChooseUs::find($id);
        $validatedData = $request->validate([
            'number' => 'required',
            'title' => 'required',
        ]);
        $why_choose_us->number = $validatedData['number'];
        $why_choose_us->title = $validatedData['title'];
        $why_choose_us->updated_at = date('Y-m-d h:i:s');
        if ($why_choose_us->save()) {
            session()->flash('message', 'Why Choose Us has been updated successfully');
            return redirect('admin/about/why_choose_us/list');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_why_choose_us(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $why_choose_us = WhyChooseUs::find($request->id);
            if ($why_choose_us) {
                $deleted = $why_choose_us->delete();
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

    public function our_brand()
    {
        $key = "Update";
        $title = "Update Our Brand Content";
        $ourBrandCount = AboutOurBrand::count();
        $ourBrand = $image_with_path = $webp_image_with_path = '';
        if ($ourBrandCount != 0) {
            $ourBrand = AboutOurBrand::first();
            $image_with_path = url('uploads/about/our_brand/image/' . $ourBrand->image);
            $webp_image_with_path = url('uploads/about/our_brand/webp_image/' . $ourBrand->webp_image);
        }
        return view('app.about.our_brand.our_brand_form',
            compact('key', 'title', 'ourBrand', 'image_with_path', 'webp_image_with_path'));
    }

    public function our_brand_store(Request $request)
    {
        if ($request->id == 0) {
            $ourBrand = new AboutOurBrand;
        } else {
            $ourBrand = AboutOurBrand::find($request->id);
            $ourBrand->updated_at = date('Y-m-d h:i:s');
        }
        if ($request->hasFile('image')) {
            $ourBrandImagePath = public_path('uploads/about/our_brand/image/');
            if (!file_exists($ourBrandImagePath)) {
                mkdir($ourBrandImagePath, 0777, true);
            }
            $fileName = $request->image->getClientOriginalName();
            $ourBrandImageName = time() . rand(1, 9999) . '.' . $fileName;
            $request->image->move($ourBrandImagePath, $ourBrandImageName);
            if ($request->id != '0' && $ourBrand->image != NULL) {
                unlink($ourBrandImagePath . $ourBrand->image);
            }
            $ourBrand->image = $ourBrandImageName;
        }
        if ($request->hasFile('webp_image')) {
            $ourBrandImagePath = public_path('uploads/about/our_brand/webp_image/');
            if (!file_exists($ourBrandImagePath)) {
                mkdir($ourBrandImagePath, 0777, true);
            }
            $fileName = $request->webp_image->getClientOriginalName();
            $ourBrandImageName = time() . rand(1, 9999) . '.' . $fileName;
            $request->webp_image->move($ourBrandImagePath, $ourBrandImageName);
            if ($request->id != '0' && $ourBrand->webp_image != NULL) {
                unlink($ourBrandImagePath . $ourBrand->webp_image);
            }
            $ourBrand->webp_image = $ourBrandImageName;
        }
        $ourBrand->title = $request->title ?? '';
        $ourBrand->small_description = $request->small_description ?? '';
        $ourBrand->button_text = $request->button_text ?? '';
        $ourBrand->button_url = $request->button_url ?? '';
        $ourBrand->large_description = $request->large_description ?? '';
        $ourBrand->image_meta_tag = $request->image_meta_tag ?? '';
        if ($ourBrand->save()) {
            session()->flash('message', 'Our Brand content has been updated successfully');
            return redirect('admin/about/our_brand/our_brand');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function our_brand_image_delete(Request $request)
    {
        $ourBrand = AboutOurBrand::find(1);
        if ($ourBrand) {
            $type = $request->type;
            $removalFile = $ourBrand->$type;
            $ourBrand->$type = NULL;
            if ($ourBrand->save()) {
                unlink(public_path('uploads/about/our_brand/' . $request->type . '/' . $removalFile));
                return response()->json(['status' => true, 'message' => 'File has been removed']);
            } else {
                return response()->json(['status' => false, 'message' => 'Unable to remove the file']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Unable to find the file']);
        }
    }

    public function brand_highlight_list()
    {
        $title = "Brand Highlight List";
        $brandHighlightList = AboutBrandHighlight::get();
        return view('app.about.our_brand.brand_highlight.brand_highlight_list',
            compact('brandHighlightList', 'title'));
    }

    public function brand_highlight_create()
    {
        $key = "Create";
        $title = "Create Brand Highlight";
        return view('app.about.our_brand.brand_highlight.brand_highlight_form', compact('key', 'title'));
    }

    public function brand_highlight_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required'
        ]);
        $brandHighlight = new AboutBrandHighlight;
        $sort_order = AboutBrandHighlight::orderBy('sort_order', 'DESC')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $brandHighlight->title = $request->title ?? '';
        $brandHighlight->sort_order = $sort_number;
        if ($brandHighlight->save()) {
            session()->flash('message', "'Brand Highlight' has been added successfully");
            return redirect('admin/about/our_brand/brand_highlight/list');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function brand_highlight_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Banner";
        $brandHighlight = AboutBrandHighlight::find($id);
        if ($brandHighlight) {
            return view('app.about.our_brand.brand_highlight.brand_highlight_form',
                compact('key', 'brandHighlight', 'title'));
        } else {
            return view('app/errors/404');
        }
    }

    public function brand_highlight_view(Request $request, $id)
    {
        $title = "View Banner";
        $brandHighlight = AboutBrandHighlight::find($id);
        if ($brandHighlight) {
            return view('app.about.our_brand.brand_highlight.brand_highlight_view',
                compact('brandHighlight', 'title'));
        } else {
            return view('app/errors/404');
        }
    }

    public function brand_highlight_update(Request $request, $id)
    {
        $brandHighlight = AboutBrandHighlight::find($id);
        $validatedData = $request->validate([
            'title' => 'required',
        ]);
        $brandHighlight->title = $request->title;
        $brandHighlight->updated_at = date('Y-m-d h:i:s');
        if ($brandHighlight->save()) {
            session()->flash('message', "'Brand Highlight' has been updated successfully");
            return redirect('admin/about/our_brand/brand_highlight/list');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_brand_highlight(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $brandHighlight = AboutBrandHighlight::find($request->id);
            if ($brandHighlight) {
                $brandHighlight->sort_order = null;
                $brandHighlight->save();
                $deleted = $brandHighlight->delete();
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

    public function success_story_list()
    {
        $title = "Success Story List";
        $successStory = SuccessStory::get();
        return view('app.about.success_story.success_story_list',
            compact('successStory', 'title'));
    }

    public function success_story_create()
    {
        $key = "Create";
        $title = "Create Success Story";
        return view('app.about.success_story.success_story_form', compact('key', 'title'));
    }

    public function success_story_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'year' => 'required',
            'description' => 'required',
        ]);
        
        $successStory = new SuccessStory();
        $successStory->title = $request->title ?? '';
        $successStory->year = $request->year ?? '';
        $successStory->description = $request->description ?? '';
        if ($successStory->save()) {
            session()->flash('message', "'Success Story' has been added successfully");
            return redirect('admin/about/success_story/list');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function success_story_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Success Story";
        $successStory = SuccessStory::find($id);
        if ($successStory) {
            return view('app.about.success_story.success_story_form',
                compact('key', 'successStory', 'title'));
        } else {
            return view('app/errors/404');
        }
    }

    public function success_story_view(Request $request, $id)
    {
        $title = "View Success Story";
        $successStory = SuccessStory::find($id);
        if ($successStory) {
            return view('app.about.success_story.success_story_view',
                compact('successStory', 'title'));
        } else {
            return view('app/errors/404');
        }
    }

    public function success_story_update(Request $request, $id)
    {
        $successStory = SuccessStory::find($id);
        $validatedData = $request->validate([
            'title' => 'required',
            'year' => 'required',
            'description' => 'required',
        ]);
        $successStory->title = $request->title;
        $successStory->year = $request->year;
        $successStory->description = $request->description;
        $successStory->updated_at = date('Y-m-d h:i:s');
        if ($successStory->save()) {
            session()->flash('message', "'Success Story' has been updated successfully");
            return redirect('admin/about/success_story/list');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_success_story(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $successStory = SuccessStory::find($request->id);
            if ($successStory) {
                $deleted = $successStory->delete();
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

?>
