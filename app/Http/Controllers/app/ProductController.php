<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductBrand;
use App\ProductCategory;
use App\ProductEnquiry;
use App\ProductFeature;
use App\ProductGallery;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function product()
    {
        $title = "Product List";
        $products = Product::latest()->with('galleries', 'images', 'features')->get();
        return view('app.product.product_list', compact('products', 'title'));
    }

    public function product_create()
    {
        $key = "Create";
        $title = "Create Product";
        $product_options = Product::active()->get(['id', 'title']);
        $product_category_options = ProductCategory::active()->get(['id', 'title']);
        $product_brand_options = ProductBrand::active()->get(['id', 'title']);
        return view('app.product.product_form',
            compact('key', 'title', 'product_options', 'product_category_options',
                'product_brand_options'));
    }

    public function product_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2',
            'short_url' => 'required|unique:products,short_url',
            'first_description' => 'required',
            'product_category_id' => 'required',
            'product_brand_id' => 'required',
            'brochure' => 'mimes:pdf',
        ]);
        $product = new Product;
        if ($request->hasFile('brochure')) {
            $brochurePath = public_path('uploads/product/brochure/');
            if (!file_exists($brochurePath)) {
                mkdir($brochurePath, 0777, true);
            }
            $fileName = $request->brochure->getClientOriginalName();
            $brochure_name = time() . rand(1, 9999) . '.' . $fileName;
            $request->brochure->move($brochurePath, $brochure_name);
            $product->brochure = $brochure_name ?? '';
        }
        $product->title = $validatedData['title'];
        $product->short_url = $validatedData['short_url'];
        $product->first_description = $validatedData['first_description'];
        $product->second_title = $request->second_title ?? '';
        $product->second_description = $request->second_description ?? '';
        $product->product_category_id = $validatedData['product_category_id'];
        $product->product_brand_id = $validatedData['product_brand_id'];
        $product->meta_title = $request->meta_title ?? '';
        $product->meta_keyword = $request->meta_keyword ?? '';
        $product->meta_description = $request->meta_description ?? '';
        $product->other_meta_tag = $request->other_meta_tag ?? '';
        if ($product->save()) {
            $product->related()->sync($request->related_products);
            session()->flash('message', 'Product "' . $product->title . '" has been added successfully');
            return redirect('admin/product/');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function product_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Product";
        $product = Product::with('related')->find($id);
        $product_options = Product::active()->get(['id', 'title']);
        $product_category_options = ProductCategory::active()->get(['id', 'title']);
        $product_brand_options = ProductBrand::active()->get(['id', 'title']);
        if ($product) {
            $brochure_with_path = url('uploads/product/brochure/' . $product->brochure);
            return view('app.product.product_form',
                compact('key', 'product', 'title', 'product_options', 'product_category_options',
                    'product_brand_options', 'brochure_with_path'));
        } else {
            return view('app/errors/404');
        }
    }

    public function product_view(Request $request, $id)
    {
        $key = "View";
        $title = "View Product";
        $product = Product::with('related')->find($id);
        if ($product) {
            $brochure_with_path = url('uploads/product/brochure/' . $product->brochure);
            return view('app.product.product_view',
                compact('key', 'product', 'title', 'brochure_with_path'));
        } else {
            return view('app/errors/404');
        }
    }

    public function product_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2',
            'short_url' => 'required|unique:products,short_url,' . $id,
            'first_description' => 'required|min:2',
            'product_category_id' => 'required',
            'product_brand_id' => 'required',
            'brochure' => 'mimes:pdf',
        ]);
        $product = Product::find($id);
        if ($request->hasFile('brochure')) {
            $brochurePath = public_path('uploads/product/brochure/');
            if (!file_exists($brochurePath)) {
                mkdir($brochurePath, 0777, true);
            }
            $fileName = $request->brochure->getClientOriginalName();
            $brochure_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            if ($request->brochure->move($brochurePath, $brochure_name)) {
                if ($product->brochure != NULL) {
                    unlink($brochurePath . $product->brochure);
                }
            }
            $product->brochure = $brochure_name;
        }
        $product->title = $validatedData['title'];
        $product->short_url = $validatedData['short_url'];
        $product->first_description = $validatedData['first_description'];
        $product->second_title = $request->second_title;
        $product->second_description = $request->second_description;
        $product->product_category_id = $validatedData['product_category_id'];
        $product->product_brand_id = $validatedData['product_brand_id'];
        $product->meta_title = $request->meta_title ?? '';
        $product->meta_keyword = $request->meta_keyword ?? '';
        $product->meta_description = $request->meta_description ?? '';
        $product->other_meta_tag = $request->other_meta_tag ?? '';
        $product->updated_at = date('Y-m-d h:i:s');
        if ($product->save()) {
            $product->related()->sync($request->related_products);
            session()->flash('message', 'Product "' . $product->title . '" has been updated successfully');
            return redirect('admin/product/');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function product_delete(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $product = Product::with('images', 'galleries')->find($request->id);
            if ($product) {
                $images = $product->images->count();
                $galleries = $product->galleries->count();
                if ($images > 0) {
                    return response()->json(['status' => false, 'message' => 'Error: Tagged with image']);
                } else if ($galleries > 0) {
                    return response()->json(['status' => false, 'message' => 'Error: Tagged with gallery']);
                } else {
                    $deleted = $product->delete();
                    if ($deleted == true) {
                        if ($product->brochure != NULL) {
                            unlink(public_path('uploads/product/brochure/' . $product->brochure));
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

    public function delete_product_file(Request $request)
    {
        $typeData = explode('/', $request->type);
        $type = $typeData[0];
        $id = $typeData[1];
        if ($id) {
            $product = Product::find($id);
            $removalFile = $product->$type;
            $product->$type = NULL;
            if ($product->save()) {
                unlink(public_path('uploads/product/' . $type . '/' . $removalFile));
                return response()->json(['status' => true, 'message' => 'File has been removed']);
            } else {
                return response()->json(['status' => false, 'message' => 'Unable to remove the file']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Unable to find the file']);
        }
    }

    public function category()
    {
        $title = "Product Category List";
        $productCategories = ProductCategory::latest()->get();
        return view('app.product.category.category_list', compact('productCategories', 'title'));
    }

    public function category_create()
    {
        $key = "Create";
        $title = "Create Product Category";
        $productCategories = ProductCategory::mainCategory()->active()->orderBy('title')->get();
        return view('app.product.category.category_form',
            compact('key', 'title', 'productCategories'));
    }

    public function category_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2',
            'short_url' => 'required|unique:product_categories,short_url',
        ]);
        $productCategory = new ProductCategory;
        $productCategory->title = $validatedData['title'];
        $productCategory->short_url = $validatedData['short_url'];
        $productCategory->parent_id = $request->parent_id;
        $productCategory->meta_title = $request->meta_title ?? '';
        $productCategory->meta_keyword = $request->meta_keyword ?? '';
        $productCategory->meta_description = $request->meta_description ?? '';
        $productCategory->other_meta_tag = $request->other_meta_tag ?? '';
        if ($productCategory->save()) {
            session()->flash('message', 'Product Category "' . $productCategory->title . '" has been added successfully');
            return redirect('admin/product/category/');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function category_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Product Category";
        $productCategory = ProductCategory::find($id);
        if ($productCategory) {
            $productCategories = ProductCategory::mainCategory()->active()->orderBy('title')->get();
            return view('app.product.category.category_form',
                compact('key', 'productCategory', 'title', 'productCategories'));
        } else {
            return view('app/errors/404');
        }
    }

    public function category_view(Request $request, $id)
    {
        $key = "View";
        $title = "View Product Category";
        $productCategory = ProductCategory::find($id);
        if ($productCategory) {
            return view('app.product.category.category_view',
                compact('key', 'productCategory', 'title'));
        } else {
            return view('app/errors/404');
        }
    }

    public function category_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2',
            'short_url' => 'required|unique:product_categories,short_url,' . $id,
        ]);
        $productCategory = ProductCategory::find($id);
        $productCategory->title = $validatedData['title'];
        $productCategory->short_url = $validatedData['short_url'];
        $productCategory->parent_id = $request->parent_id;
        $productCategory->meta_title = $request->meta_title ?? '';
        $productCategory->meta_keyword = $request->meta_keyword ?? '';
        $productCategory->meta_description = $request->meta_description ?? '';
        $productCategory->other_meta_tag = $request->other_meta_tag ?? '';
        $productCategory->updated_at = date('Y-m-d h:i:s');
        if ($productCategory->save()) {
            session()->flash('message', 'Product Category "' . $productCategory->title . '" has been updated successfully');
            return redirect('admin/product/category/');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_category(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $productCategory = ProductCategory::find($request->id);
            if ($productCategory) {
                $deleted = $productCategory->delete();
                if ($deleted == true) {
                    return response()->json(['status' => true]);
                } else {
                    return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        }
    }

    public function brand()
    {
        $title = "Product Brand List";
        $productBrands = ProductBrand::latest()->get();
        return view('app.product.brand.brand_list', compact('productBrands', 'title'));
    }

    public function brand_create()
    {
        $key = "Create";
        $title = "Create Product Brand";
        return view('app.product.brand.brand_form', compact('key', 'title'));
    }

    public function brand_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2',
            'short_url' => 'required|unique:product_brands,short_url',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'image_meta_tag' => 'required|min:5',
        ]);
        $productBrand = new ProductBrand;
        if ($request->hasFile('image')) {
            $productBrandPath = public_path('uploads/product/brand/');
            if (!file_exists($productBrandPath)) {
                mkdir($productBrandPath, 0777, true);
            }
            $fileName = $request->image->getClientOriginalName();
            $productBrand_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->image->move($productBrandPath, $productBrand_name);
            $productBrand->image = $productBrand_name;
        }
        if ($request->hasFile('webp_image')) {
            $productBrandPath = public_path('uploads/product/brand/webp/');
            if (!file_exists($productBrandPath)) {
                mkdir($productBrandPath, 0777, true);
            }
            $fileName = $request->webp_image->getClientOriginalName();
            $productBrand_name = time() . rand(1, 9999) . '.' . $fileName;
            $request->webp_image->move($productBrandPath, $productBrand_name);
            $productBrand->webp_image = $productBrand_name;
        }
        $productBrand->title = $validatedData['title'];
        $productBrand->short_url = $validatedData['short_url'];
        $productBrand->image_meta_tag = $validatedData['image_meta_tag'];
        $productBrand->meta_title = $request->meta_title ?? '';
        $productBrand->meta_keyword = $request->meta_keyword ?? '';
        $productBrand->meta_description = $request->meta_description ?? '';
        $productBrand->other_meta_tag = $request->other_meta_tag ?? '';
        if ($productBrand->save()) {
            session()->flash('message', 'Product Brand "' . $productBrand->title . '" has been added successfully');
            return redirect('admin/product/brand/');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function brand_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Product Brand";
        $productBrand = ProductBrand::find($id);
        if ($productBrand) {
            $image_with_path = url('uploads/product/brand/' . $productBrand->image);
            $webp_image_with_path = url('uploads/product/brand/webp/' . $productBrand->webp_image);
            return view('app.product.brand.brand_form',
                compact('key', 'productBrand', 'title', 'image_with_path',
                    'webp_image_with_path'));
        } else {
            return view('app/errors/404');
        }
    }

    public function brand_view(Request $request, $id)
    {
        $key = "View";
        $title = "View Product Brand";
        $productBrand = ProductBrand::find($id);
        if ($productBrand) {
            $image_with_path = url('uploads/product/brand/' . $productBrand->image);
            $webp_image_with_path = url('uploads/product/brand/webp/' . $productBrand->webp_image);
            return view('app.product.brand.brand_view',
                compact('key', 'productBrand', 'title', 'image_with_path',
                    'webp_image_with_path'));
        } else {
            return view('app/errors/404');
        }
    }

    public function brand_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2',
            'short_url' => 'required|unique:product_brands,short_url,' . $id,
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'image_meta_tag' => 'required|min:5',
        ]);
        $productBrand = ProductBrand::find($id);
        if ($request->hasFile('image')) {
            $productBrandPath = public_path('uploads/product/brand/');
            if (!file_exists($productBrandPath)) {
                mkdir($productBrandPath, 0777, true);
            }
            $fileName = $request->image->getClientOriginalName();
            $productBrand_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->image->move($productBrandPath, $productBrand_name);
            if ($productBrand->image != NULL) {
                unlink($productBrandPath . $productBrand->image);
            }
            $productBrand->image = $productBrand_name;
        }
        if ($request->hasFile('webp_image')) {
            $productBrandPath = public_path('uploads/product/brand/webp/');
            if (!file_exists($productBrandPath)) {
                mkdir($productBrandPath, 0777, true);
            }
            $fileName = $request->webp_image->getClientOriginalName();
            $productBrand_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->webp_image->move($productBrandPath, $productBrand_name);
            if ($productBrand->webp_image != NULL) {
                unlink($productBrandPath . $productBrand->webp_image);
            }
            $productBrand->webp_image = $productBrand_name;
        }
        $productBrand->title = $validatedData['title'];
        $productBrand->short_url = $validatedData['short_url'];
        $productBrand->image_meta_tag = $validatedData['image_meta_tag'];
        $productBrand->meta_title = $request->meta_title ?? '';
        $productBrand->meta_keyword = $request->meta_keyword ?? '';
        $productBrand->meta_description = $request->meta_description ?? '';
        $productBrand->other_meta_tag = $request->other_meta_tag ?? '';
        $productBrand->updated_at = date('Y-m-d h:i:s');
        if ($productBrand->save()) {
            session()->flash('message', 'Product Brand "' . $productBrand->title . '" has been updated successfully');
            return redirect('admin/product/brand/');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_brand(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $productBrand = ProductBrand::find($request->id);
            if ($productBrand) {
                $deleted = $productBrand->delete();
                if ($deleted == true) {
                    if ($productBrand->image != NULL) {
                        unlink(public_path('uploads/product/brand/' . $productBrand->image));
                    }
                    if ($productBrand->webp_image != NULL) {
                        unlink(public_path('uploads/product/brand/webp/' . $productBrand->webp_image));
                    }
                    if ($productBrand->brochure != NULL) {
                        unlink(public_path('uploads/product/brand/brochure/' . $productBrand->brochure));
                    }
                    return response()->json(['status' => true]);
                } else {
                    return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        }
    }

    public function product_enquiry_list()
    {
        $title = "Product Enquiries List";
        $productEnquiryList = ProductEnquiry::latest('id')->get();
        return view('app.enquiry.product.product_list', compact('productEnquiryList', 'title'));
    }

    public function product_enquiry_view($id)
    {
        $title = "View Product Enquiries";
        $productEnquiry = ProductEnquiry::find($id);
        return view('app.enquiry.product.product_view', compact('productEnquiry', 'title'));
    }

    public function reply_to_product_enquiry(Request $request)
    {
        if (isset($request->reply) && $request->reply != NULL) {
            $productEnquiry = ProductEnquiry::find($request->id);
            if ($productEnquiry) {
                DB::beginTransaction();
                $productEnquiry->reply = $request->reply;
                $productEnquiry->reply_date = date('Y-m-d h:i:s');
                if ($productEnquiry->save()) {
                    if (sendProductEnquiryReply($productEnquiry)) {
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

    public function delete_product_enquiry(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $productEnquiry = ProductEnquiry::find($request->id);
            if ($productEnquiry) {
                $deleted = $productEnquiry->delete();
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

    public function delete_multiple_product_enquiry(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $productEnquiryArray = explode(',', $request->id);
            $successArray = array();
            foreach ($productEnquiryArray as $con) {
                $productEnquiry = ProductEnquiry::find($con);
                $deleted = $productEnquiry->delete();
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

    /******************** Product Feature Section ***********************/

    public function feature($product_id)
    {
        $title = "Feature List";
        $product = Product::with('features')->find($product_id);
        if ($product) {
            return view('app.product.feature.feature_list',
                compact('title', 'product_id', 'product'));
        } else {
            return view('app/errors/404');
        }
    }

    public function feature_create($product_id)
    {
        $key = "Create";
        $product = Product::find($product_id);
        if ($product) {
            $title = "Create Feature";
            return view('app.product.feature.feature_form', compact('key', 'title', 'product'));
        } else {
            return view('app/errors/404');
        }
    }

    public function feature_store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'description' => 'required',
        ]);
        $product = Product::find($request->product_id);
        $sort_order = $product->features->sortByDesc('sort_order')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $feature = new ProductFeature;
        $feature->description = $request->description;
        $feature->product_id = $request->product_id;
        $feature->sort_order = $sort_number;
        if ($feature->save()) {
            session()->flash('message', 'Feature has been added successfully');
            return redirect('admin/product/feature/' . $request->product_id);
        } else {
            return back()->withInput($request->input())->withErrors("Error while inserting the content");
        }
    }

    public function feature_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Feature";
        $feature = ProductFeature::find($id);
        if ($feature) {
            return view('app.product.feature.feature_form',
                compact('key', 'feature', 'title'));
        } else {
            return view('app/errors/404');
        }
    }

    public function feature_view(Request $request, $id)
    {
        $key = "View";
        $title = "View Feature";
        $feature = ProductFeature::with('product')->find($id);
        if ($feature) {
            return view('app.product.feature.feature_view',
                compact('key', 'feature', 'title'));
        } else {
            return view('app/errors/404');
        }
    }

    public function feature_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'description' => 'required',
        ]);
        $feature = ProductFeature::find($id);
        $feature->description = $request->description;
        if ($feature->save()) {
            session()->flash('message', 'Feature has been updated successfully');
            return redirect('admin/product/feature/' . $request->product_id);
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_feature(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $feature = ProductFeature::find($request->id);
            if ($feature) {
                $deleted = $feature->delete();
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
    /******************** Product Feature Section ***********************/

    /******************** Product Image Section ***********************/
    public function image($product_id)
    {
        $title = "Product Images and Videos";
        $product = Product::with('images')->find($product_id);
        if ($product) {
            return view('app.product.image.image_list',
                compact('title', 'product_id', 'product'));
        } else {
            return view('app/errors/404');
        }
    }

    public function image_create($product_id)
    {
        $key = "Create";
        $product = Product::find($product_id);
        if ($product) {
            $title = "Create Image";
            return view('app.product.image.image_form', compact('key', 'title', 'product'));
        } else {
            return view('app/errors/404');
        }
    }

    public function image_store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image_meta_tag' => 'required|min:5',
        ]);
        $product = Product::find($request->product_id);
        $sort_order = $product->images->sortByDesc('sort_order')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $image = new ProductImage;
        if ($request->hasFile('image')) {
            $imagePath = public_path('uploads/product/image/' . $request->product_id . '/');
            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0777, true);
            }
            $fileName = $request->image->getClientOriginalName();
            $image_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->image->move($imagePath, $image_name);
            $image->image = $image_name;
        }
        if ($request->hasFile('webp_image')) {
            $imagePath = public_path('uploads/product/image/webp/' . $request->product_id . '/');
            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0777, true);
            }
            $fileName = $request->webp_image->getClientOriginalName();
            $image_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->webp_image->move($imagePath, $image_name);
            $image->webp_image = $image_name;
        }
        $image->product_id = $request->product_id;
        $image->image_meta_tag = $validatedData['image_meta_tag'];
        $image->sort_order = $sort_number;
        if ($image->save()) {
            session()->flash('message', 'Image has been added successfully');
            return redirect('admin/product/image/' . $request->product_id);
        } else {
            return back()->withInput($request->input())->withErrors("Error while creating the content");
        }
    }

    public function image_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Image";
        $image = ProductImage::find($id);
        if ($image) {
            $image_with_path = url('uploads/product/image/' . $image->product_id . '/' . $image->image);
            $webp_image_with_path = url('uploads/product/image/webp/' . $image->product_id . '/' . $image->webp_image);
            return view('app.product.image.image_form',
                compact('key', 'image', 'title', 'image_with_path', 'webp_image_with_path'));
        } else {
            return view('app/errors/404');
        }
    }

    public function image_view(Request $request, $id)
    {
        $key = "View";
        $title = "View Image";
        $image = ProductImage::with('product')->find($id);
        if ($image) {
            $image_with_path = url('uploads/product/image/' . $image->product_id . '/' . $image->image);
            $webp_image_with_path = url('uploads/product/image/webp/' . $image->product_id . '/' . $image->webp_image);
            return view('app.product.image.image_view',
                compact('key', 'image', 'title', 'image_with_path', 'webp_image_with_path'));
        } else {
            return view('app/errors/404');
        }
    }

    public function image_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'image_meta_tag' => 'required|min:5',
        ]);
        $image = ProductImage::find($id);
        if ($request->hasFile('image')) {
            $imagePath = public_path('uploads/product/image/' . $request->product_id . '/');
            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0777, true);
            }
            $fileName = $request->image->getClientOriginalName();
            $image_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            if ($image->image != NULL) {
                unlink($imagePath . $image->image);
            }
            $request->image->move($imagePath, $image_name);
            $image->image = $image_name;
        }
        if ($request->hasFile('webp_image')) {
            $imagePath = public_path('uploads/product/image/webp/' . $request->product_id . '/');
            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0777, true);
            }
            $fileName = $request->webp_image->getClientOriginalName();
            $image_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            if ($image->webp_image != NULL) {
                unlink($imagePath . $image->webp_image);
            }
            $request->webp_image->move($imagePath, $image_name);
            $image->webp_image = $image_name;
        }
        $image->image_meta_tag = $validatedData['image_meta_tag'];
        if ($image->save()) {
            session()->flash('message', 'Image has been updated successfully');
            return redirect('admin/product/image/' . $request->product_id);
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_image(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $image = ProductImage::find($request->id);
            if ($image) {
                unlink(public_path('uploads/product/image/' . $image->product_id . '/' . $image->image));
                if ($image->webp_image != NULL) {
                    unlink(public_path('uploads/product/image/webp/' . $image->product_id . '/' . $image->webp_image));
                }
                $deleted = $image->delete();
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
    /******************** Product Image Section ***********************/

    /******************** Product Gallery Section ***********************/
    public function gallery($product_id)
    {
        $title = "Gallery Images and Videos";
        $product = Product::with('galleries')->find($product_id);
        if ($product) {
            return view('app.product.gallery.gallery_list',
                compact('title', 'product_id', 'product'));
        } else {
            return view('app/errors/404');
        }
    }

    public function gallery_create($product_id)
    {
        $key = "Create";
        $product = Product::find($product_id);
        if ($product) {
            $title = "Create Gallery";
            return view('app.product.gallery.gallery_form', compact('key', 'title', 'product'));
        } else {
            return view('app/errors/404');
        }
    }

    public function gallery_store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image_meta_tag' => 'required|min:5',
        ]);
        $gallery = new ProductGallery;
        if ($request->hasFile('image')) {
            $galleryPath = public_path('uploads/product/gallery/' . $request->product_id . '/');
            if (!file_exists($galleryPath)) {
                mkdir($galleryPath, 0777, true);
            }
            $fileName = $request->image->getClientOriginalName();
            $gallery_name = rand(1, 9999) . time() . rand(1, 9999) . '.' . $fileName;
            $request->image->move($galleryPath, $gallery_name);
            $gallery->image = $gallery_name;
        }
        if ($request->hasFile('webp_image')) {
            $galleryPath = public_path('uploads/product/gallery/webp/' . $request->product_id . '/');
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
        $gallery->product_id = $request->product_id;
        $gallery->image_meta_tag = $validatedData['image_meta_tag'];
        if ($gallery->save()) {
            session()->flash('message', 'Gallery ' . $type . ' has been added successfully');
            return redirect('admin/product/gallery/' . $request->product_id);
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function gallery_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Gallery";
        $gallery = ProductGallery::find($id);
        if ($gallery) {
            $image_with_path = url('uploads/product/gallery/' . $gallery->product_id . '/' . $gallery->image);
            $webp_image_with_path = url('uploads/product/gallery/webp/' . $gallery->product_id . '/' . $gallery->webp_image);
            return view('app.product.gallery.gallery_form',
                compact('key', 'gallery', 'title', 'image_with_path', 'webp_image_with_path'));
        } else {
            return view('app/errors/404');
        }
    }

    public function gallery_view(Request $request, $id)
    {
        $key = "View";
        $title = "View Gallery";
        $gallery = ProductGallery::with('product')->find($id);
        if ($gallery) {
            $image_with_path = url('uploads/product/gallery/' . $gallery->product_id . '/' . $gallery->image);
            $webp_image_with_path = url('uploads/product/gallery/webp/' . $gallery->product_id . '/' . $gallery->webp_image);
            return view('app.product.gallery.gallery_view',
                compact('key', 'gallery', 'title', 'image_with_path', 'webp_image_with_path'));
        } else {
            return view('app/errors/404');
        }
    }

    public function gallery_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'image_meta_tag' => 'required|min:5',
        ]);
        $gallery = ProductGallery::find($id);
        if ($request->hasFile('image')) {
            $galleryPath = public_path('uploads/product/gallery/' . $request->product_id . '/');
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
            $galleryPath = public_path('uploads/product/gallery/webp/' . $request->product_id . '/');
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
            return redirect('admin/product/gallery/' . $request->product_id);
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_gallery(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $gallery = ProductGallery::find($request->id);
            if ($gallery) {
                unlink(public_path('uploads/product/gallery/' . $gallery->product_id . '/' . $gallery->image));
                unlink(public_path('uploads/product/gallery/webp/' . $gallery->product_id . '/' . $gallery->webp_image));
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
    /******************** Product Gallery Section ***********************/

}
