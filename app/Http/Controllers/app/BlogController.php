<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function blog_list()
    {
        $title = "Blog List";
        $blogList = Blog::get();
        return view('app.blog.blog_list', compact('blogList', 'title'));
    }

    public function blog_create()
    {
        $key = "Create";
        $title = "Create Blog";
        return view('app.blog.blog_form', compact('key', 'title'));
    }

    public function blog_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2',
            'short_url' => 'required|unique:blogs,short_url',
            'image' => 'required',
            'image_meta_tag' => 'required',
            'description' => 'required',
            'posted_date' => 'required'
        ]);
        $blog = new Blog;
        if ($request->hasFile('image')) {
            $blogPath = public_path('uploads/blog/image/');
            if (!file_exists($blogPath)) {
                mkdir($blogPath, 0777, true);
            }
            $fileName = $request->image->getClientOriginalName();
            $blog_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->image->move($blogPath, $blog_name);
            $blog->image = $blog_name;
        }
        if ($request->hasFile('webp_image')) {
            $blogPath = public_path('uploads/blog/webp_image/');
            if (!file_exists($blogPath)) {
                mkdir($blogPath, 0777, true);
            }
            $fileName = $request->webp_image->getClientOriginalName();
            $blog_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->webp_image->move($blogPath, $blog_name);
            $blog->webp_image = $blog_name;
        }
        if ($request->hasFile('video_thumbnail_image')) {
            $video_thumbnail_imagePath = public_path('uploads/blog/video_thumbnail_image/');
            if (!file_exists($video_thumbnail_imagePath)) {
                mkdir($video_thumbnail_imagePath, 0777, true);
            }
            $fileName = $request->video_thumbnail_image->getClientOriginalName();
            $video_thumbnail_image_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->video_thumbnail_image->move($video_thumbnail_imagePath, $video_thumbnail_image_name);
            $blog->video_thumbnail_image = $video_thumbnail_image_name;
        }
        if ($request->hasFile('webp_video_thumbnail_image')) {
            $video_thumbnail_imagePath = public_path('uploads/blog/webp_video_thumbnail_image/');
            if (!file_exists($video_thumbnail_imagePath)) {
                mkdir($video_thumbnail_imagePath, 0777, true);
            }
            $fileName = $request->webp_video_thumbnail_image->getClientOriginalName();
            $video_thumbnail_image_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->webp_video_thumbnail_image->move($video_thumbnail_imagePath, $video_thumbnail_image_name);
            $blog->webp_video_thumbnail_image = $video_thumbnail_image_name;
        }
        $blog->title = $validatedData['title'];
        $blog->short_url = $validatedData['short_url'];
        $blog->description = $validatedData['description'];
        $blog->image_meta_tag = $request->image_meta_tag ?? '';
        $blog->quote_tag_line = $request->quote_tag_line ?? '';
        $blog->second_title = $request->second_title ?? '';
        $blog->video_url = $request->video_url;
        $blog->video_thumbnail_image_meta_tag = $request->video_thumbnail_image_meta_tag ?? '';
        $blog->second_description = $request->second_description ?? '';
        $blog->third_description = $request->third_description ?? '';
        $blog->fourth_description = $request->fourth_description ?? '';
        $blog->posted_date = $validatedData['posted_date'];
        $blog->meta_title = $request->meta_title ?? '';
        $blog->meta_keyword = $request->meta_keyword ?? '';
        $blog->meta_description = $request->meta_description ?? '';
        $blog->other_meta_tag = $request->other_meta_tag ?? '';
        if ($blog->save()) {
            session()->flash('message', 'Blog "' . $blog->title . '" has been added successfully');
            return redirect('admin/blog/');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function blog_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Blog";
        $blog = Blog::find($id);
        if ($blog) {
            $image_with_path = url('uploads/blog/image/' . $blog->image);
            $image_with_webp_path = url('uploads/blog/webp_image/' . $blog->webp_image);
            $video_thumbnail_image_with_path = url('uploads/blog/video_thumbnail_image/' . $blog->video_thumbnail_image);
            $webp_video_thumbnail_image_with_path = url('uploads/blog/webp_video_thumbnail_image/' . $blog->webp_video_thumbnail_image);
            return view('app.blog.blog_form',
                compact('key', 'blog', 'title', 'image_with_path', 'image_with_webp_path',
                    'video_thumbnail_image_with_path', 'webp_video_thumbnail_image_with_path'));
        } else {
            return view('app/errors/404');
        }
    }

    public function blog_view(Request $request, $id)
    {
        $title = "View Blog";
        $blog = Blog::find($id);
        if ($blog) {
            $image_with_path = url('uploads/blog/image/' . $blog->image);
            $image_with_webp_path = url('uploads/blog/webp_image/' . $blog->webp_image);
            $video_thumbnail_image_with_path = url('uploads/blog/video_thumbnail_image/' . $blog->video_thumbnail_image);
            $webp_video_thumbnail_image_with_path = url('uploads/blog/webp_video_thumbnail_image/' . $blog->webp_video_thumbnail_image);
            return view('app.blog.blog_view', compact('blog', 'title', 'image_with_path',
                'image_with_webp_path', 'video_thumbnail_image_with_path', 'webp_video_thumbnail_image_with_path'));
        } else {
            return view('app/errors/404');
        }
    }

    public function blog_update(Request $request, $id)
    {
        $blog = Blog::find($id);
        $validatedData = $request->validate([
            'title' => 'required|min:2',
            'short_url' => 'required|unique:blogs,short_url,' . $id,
            'image_meta_tag' => 'required',
            'description' => 'required',
            'posted_date' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $blogPath = public_path('uploads/blog/image/');
            if (!file_exists($blogPath)) {
                mkdir($blogPath, 0777, true);
            }
            $fileName = $request->image->getClientOriginalName();
            $blog_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            if ($blog->image != NULL) {
                unlink($blogPath . $blog->image);
            }
            $request->image->move($blogPath, $blog_name);
            $blog->image = $blog_name;
        }
        if ($request->hasFile('webp_image')) {
            $blogPath = public_path('uploads/blog/webp_image/');
            if (!file_exists($blogPath)) {
                mkdir($blogPath, 0777, true);
            }
            $fileName = $request->webp_image->getClientOriginalName();
            $blog_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            if ($blog->webp_image != NULL) {
                unlink($blogPath . $blog->webp_image);
            }
            $request->webp_image->move($blogPath, $blog_name);
            $blog->webp_image = $blog_name;
        }
        if ($request->hasFile('video_thumbnail_image')) {
            $video_thumbnail_imagePath = public_path('uploads/blog/video_thumbnail_image/');
            if (!file_exists($video_thumbnail_imagePath)) {
                mkdir($video_thumbnail_imagePath, 0777, true);
            }
            $fileName = $request->video_thumbnail_image->getClientOriginalName();
            $video_thumbnail_image_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            if ($request->video_thumbnail_image->move($video_thumbnail_imagePath, $video_thumbnail_image_name)) {
                if (isset($blog) && $blog->video_thumbnail_image != NULL) {
                    unlink($video_thumbnail_imagePath . $blog->video_thumbnail_image);
                }
            }
            $blog->video_thumbnail_image = $video_thumbnail_image_name;
        }
        if ($request->hasFile('webp_video_thumbnail_image')) {
            $video_thumbnail_imagePath = public_path('uploads/blog/webp_video_thumbnail_image/');
            if (!file_exists($video_thumbnail_imagePath)) {
                mkdir($video_thumbnail_imagePath, 0777, true);
            }
            $fileName = $request->webp_video_thumbnail_image->getClientOriginalName();
            $video_thumbnail_image_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            if ($request->webp_video_thumbnail_image->move($video_thumbnail_imagePath, $video_thumbnail_image_name)) {
                if (isset($blog) && $blog->webp_video_thumbnail_image != NULL) {
                    unlink($video_thumbnail_imagePath . $blog->webp_video_thumbnail_image);
                }
            }
            $blog->webp_video_thumbnail_image = $video_thumbnail_image_name;
        }
        $blog->title = $validatedData['title'];
        $blog->short_url = $validatedData['short_url'];
        $blog->description = $validatedData['description'];
        $blog->image_meta_tag = $request->image_meta_tag ?? '';
        $blog->quote_tag_line = $request->quote_tag_line ?? '';
        $blog->second_title = $request->second_title ?? '';
        $blog->video_url = $request->video_url;
        $blog->video_thumbnail_image_meta_tag = $request->video_thumbnail_image_meta_tag ?? '';
        $blog->second_description = $request->second_description ?? '';
        $blog->third_description = $request->third_description ?? '';
        $blog->fourth_description = $request->fourth_description ?? '';
        $blog->posted_date = $validatedData['posted_date'];
        $blog->meta_title = $request->meta_title ?? '';
        $blog->meta_keyword = $request->meta_keyword ?? '';
        $blog->meta_description = $request->meta_description ?? '';
        $blog->other_meta_tag = $request->other_meta_tag ?? '';
        $blog->updated_at = date('Y-m-d h:i:s');
        if ($blog->save()) {
            session()->flash('message', 'Blog "' . $blog->title . '" has been updated successfully');
            return redirect('admin/blog/');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_blog(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $blog = Blog::find($request->id);
            if ($blog) {
                if ($blog->image != NULL) {
                    unlink(public_path('uploads/blog/image/' . $blog->image));
                }
                if ($blog->webp_image != NULL) {
                    unlink(public_path('uploads/blog/webp_image/' . $blog->webp_image));
                }
                if ($blog->video_thumbnail_image != NULL) {
                    unlink(public_path('uploads/blog/video_thumbnail_image/' . $blog->video_thumbnail_image));
                }
                if ($blog->webp_video_thumbnail_image != NULL) {
                    unlink(public_path('uploads/blog/webp_video_thumbnail_image/' . $blog->webp_video_thumbnail_image));
                }
                $deleted = $blog->delete();
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

    public function blog_image_delete(Request $request)
    {
        $typeData = explode('/', $request->type);
        $type = $typeData[0];
        $id = $typeData[1];
        if ($id) {
            $testimonial = Blog::find($id);
            $removalFile = $testimonial->$type;
            $testimonial->$type = NULL;
            if ($testimonial->save()) {
                unlink(public_path('uploads/blog/' . $type . '/' . $removalFile));
                return response()->json(['status' => true, 'message' => 'File has been removed']);
            } else {
                return response()->json(['status' => false, 'message' => 'Unable to remove the file']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Unable to find the file']);
        }
    }
}

?>
