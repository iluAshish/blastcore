<?php

namespace App\Http\Controllers\web;

use App\AboutBrandHighlight;
use App\AboutOurBrand;
use App\AboutUs;
use App\Blog;
use App\Client;
use App\ContactEnquiry;
use App\ContactInformation;
use App\HomeAbout;
use App\HomeBanner;
use App\HomeGallery;
use App\HomeHighlight;
use App\Http\Controllers\Controller;
use App\MetaData;
use App\NewsletterSubscription;
use App\OtherMetaData;
use App\Product;
use App\ProductBrand;
use App\ProductCategory;
use App\ProductEnquiry;
use App\Service;
use App\ServiceEnquiry;
use App\SiteInformation;
use App\Subscriber;
use App\SuccessStory;
use App\Testimonial;
use App\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MasterController extends Controller
{
    public function __construct()
    {
        $siteInformation = SiteInformation::first();
        $contactsFooter = ContactInformation::active()
        ->latest()
        ->limit(2)
        ->get();

        $service_menus = Service::active()->get();
        $footer_service_menus = Service::active()->paginate(6);
        $main_product_categories = ProductCategory::with('activeChildren')->active()->mainCategory()->get();
        $productBrands = ProductBrand::active()->get();
        $featured_products = Product::with('activeFirstImage', 'brand','category')->featured()->active()->get();
        $services = Service::featured()->active()->get();
        $homeBanners = HomeBanner::active()->orderBy('sort_order', 'ASC')->take(3)->get();
        
        $extra_meta_data = OtherMetaData::first();
        $clients = Client::active()->get();
        View::share(compact(
            'siteInformation', 
            'contactsFooter', 
            'service_menus', 
            'footer_service_menus',
            'main_product_categories', 
            'productBrands', 
            'featured_products', 
            'extra_meta_data',
            'homeWhyChooseUs',
            'homeAbout',
            'services',
            'clients'
        ));
        
    }

    public function seo_content($type, $page_name, $key = NULL)
    {
        if ($type == 1) {
            $meta_data = MetaData::where('page_name', '=', $page_name)->first();
            return $meta_data;
        } else {
            $model = 'App\\' . $page_name;
            $meta_data = $model::find($key);
            return $meta_data;
        }
    }

    public function home()
    {
        $homeAbout = AboutUs::first();

        $homeBanners = HomeBanner::active()->orderBy('sort_order', 'ASC')->get();
        $homeAboutHighlight = HomeHighlight::first();
        $blogs = Blog::active()->latest('posted_date')->limit(5)->get();
       
        $meta_data = $this->seo_content(1, 'Home');
        $whyChooseUs = WhyChooseUs::active()->limit(4)->get();
        $testimonials = Testimonial::active()->orderBy('created_at', 'DESC')->limit(8)->get();
        $galleryImages = HomeGallery::active()->orderBy('sort_order', 'ASC')->get();

        return view('web.home', compact('homeBanners', 'homeAbout', 'meta_data',
            'homeAboutHighlight', 'services', 'blogs','whyChooseUs','testimonials', 'galleryImages'));
    }
    public function privacy()
    {
        $meta_data = $this->seo_content(1, 'Privacy');
        return view('web.privacy', compact('meta_data'));
    }
    public function terms()
    {
        $meta_data = $this->seo_content(1, 'Terms');
        return view('web.terms', compact('meta_data'));
    }

    public function about()
    {
        $about = AboutUs::first();
        $homeAboutHighlight = HomeHighlight::first();
        $whyChooseUs = WhyChooseUs::active()->orderBy('title', 'ASC')->limit(4)->get();
        $ourBrand = AboutOurBrand::first();
        $brandHighlightList = AboutBrandHighlight::active()->orderBy('sort_order', 'ASC')->get();
        $services = Service::active()->get();
        $meta_data = $this->seo_content(1, 'About');
        $successStories = SuccessStory::active()->orderBy('created_at', 'DESC')->get();
    //    dd($successStories);
        return view('web.about', compact('about', 'meta_data', 'homeAboutHighlight',
            'whyChooseUs', 'ourBrand', 'brandHighlightList', 'services','successStories'));
    }

    public function loadMoreFooterService(Request $request)
    {
        $limit = $request->limit;
        $offset = $request->offset;
        $nextOffset = $limit + $offset;
        $footer_service_menus = Service::active()->skip($offset)->take($limit)->get();
        $totalCount = Service::active()->get();
        if ($footer_service_menus->isNotEmpty()) {
            return view('web.partials._footer_service_list', compact('footer_service_menus',
                'totalCount', 'nextOffset'));
        } else {
            echo "0";
        }
    }

    public function services()
    {
        $services = Service::active()->get();
        if ($services) {
            return view('web.services', compact('services'));
        } else {
            return view('web.error.404');
        }
    }

    public function service($short_url)
    {

        $service = Service::with('activeGalleries')->where('short_url', '=', $short_url)->active()->first();
        // dd($service);
        if ($service) {
            $otherServices = Service::where('id', '!=', $service->id)->active()->latest()->get();
            $meta_data = $this->seo_content(0, 'Service', $service->id);
            return view('web.service', compact('service', 'meta_data', 'otherServices'));
        } else {
            return view('web.error.404');
        }
    }

    public function serviceEnquiry(Request $request)
    {
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $enquiry = new ServiceEnquiry();
            $enquiry->name = $request->name;
            $enquiry->email = $request->email;
            $enquiry->phone = $request->phone;
            $enquiry->service_id = $request->service_id;
            $enquiry->message = $request->message;
            $enquiry->company = $request->company ?? '';
            $enquiry->request_url = url()->previous();
            if ($enquiry->save()) {
                if (SendServiceEnquiryMail($enquiry)) {
                    return response()->json(['status' => 'success',
                        'message' => 'Service Enquiry has been submitted successfully']);
                } else {
                    return response()->json(['status' => 'success',
                        'message' => "Service Enquiry has been submitted successfully,Can't sent the mail right now"]);
                }
            } else {
                return response()->json(['status' => 'error',
                    'message' => 'Error : Error while submitting the enquiry']);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Error : Please enter a valid email id']);
        }
    }

    public function blogs()
    {
        $firstTwoBlogs = Blog::active()->latest('posted_date')->take(2)->get();
        //after first two blogs get in blogs page
        $blogs = Blog::active()->latest('posted_date')->skip(2)->take(6)->get();
        $totalBlogs = Blog::active()->latest()->count();
        $meta_data = $this->seo_content(1, 'Blogs');
        $offset = 6;
        $limit = 6;
        $nextOffset = $offset + $limit;
        return view('web.blogs', compact('meta_data', 'blogs', 'totalBlogs',
            'firstTwoBlogs', 'offset', 'limit', 'nextOffset'));
    }

    public function loadMoreBlogs(Request $request)
    {
        $limit = $request->limit;
        $offset = $request->offset;
        $nextOffset = $limit + $offset;
        $blogs = Blog::active()->skip($offset)->take($limit)->latest('posted_date')->get();
        $totalBlogs = Blog::active()->get();
        
        if ($blogs->isNotEmpty()) {
            return view('web.partials._blogs_list', compact('blogs', 'totalBlogs', 'nextOffset', 'offset', 'limit'));
        } else {
            echo "0";
        }
    }

    public function blog_detail($short_url)
    {
        $blog = Blog::where('short_url', '=', $short_url)->active()->first();
        if ($blog) {
            $recentBlogs = Blog::active()->where('id', '!=', $blog->id)->latest('posted_date')->take(5)->get();
            $blogs = Blog::active()->latest()->get();
            $nextBlog = Blog::where('id', '>', $blog->id)->active()->first();
            $previousBlog = Blog::where('id', '<', $blog->id)->active()->first();
            $meta_data = $this->seo_content(0, 'Blog', $blog->id);
            //dd($blog);
            return view('web.blog_detail', compact('blog', 'recentBlogs', 'blogs', 'meta_data',
                'nextBlog', 'previousBlog'));
        } else {
            return view('web.error.404');
        }
    }

    public function contact()
    {
        $meta_data = $this->seo_content(1, 'Contact');
        $contacts = ContactInformation::active()->latest()->get();
       
        return view('web.contact', compact('meta_data','contacts'));
    }

    public function contact_store(Request $request)
    {
        // dd($request);
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $contact = new ContactEnquiry();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->message = $request->message;
            $contact->request_url = url()->previous();
            if ($contact->save()) {
                $sendContactMail = SendContactMail($contact);
               
                if ($sendContactMail) {
                    return response()->json(['status' => 'success',
                        'message' => 'Contact request has been submitted successfully']);
                } else {
                    return response()->json(['status' => 'success',
                        'message' => "Contact request has been submitted successfully,Can't sent the mail right now"]);
                }
            } else {
                return response()->json(['status' => 'error',
                    'message' => 'Error : Error while submitting the request']);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Error : Please enter a valid email id']);
        }
    }

    public function productCategory($short_url)
    {
        $productCategory = ProductCategory::active()->mainCategory()->with('activeChildren')->where('short_url', $short_url)->first();
        if ($productCategory) {
            $latest_products = Product::with('activeFirstImage', 'brand')->latestProducts()->active()->get();

            $products = Product::with('activeFirstImage', 'brand')->active()
                ->where('product_category_id', $productCategory->id)
                ->orWhere(function ($query) use ($productCategory) {
                    $query->whereIn('product_category_id', $productCategory->activeChildren->map(function ($query) {
                        return collect($query->toArray())->only(['id'])->all();
                    }));
                }
                );
            $totalProducts = $products->count();// total products in that category
            $products = $products->paginate(12);
            $offset = $products->count();
            $type = 'product_category';
            $typeValue = $short_url;
            $nextOffset = $offset + 12;
            $meta_data = $this->seo_content(0, 'ProductCategory', $productCategory->id);
            return view('web.products', compact('latest_products', 'products', 'totalProducts',
                'offset', 'type', 'typeValue', 'meta_data','nextOffset'));
        } else {
            return view('web.error.404');
        }
    }

    public function productBrand($short_url)
    {
        $productBrand = ProductBrand::active()->where('short_url', $short_url)->first();
        if ($productBrand) {
            $latest_products = Product::with('activeFirstImage', 'brand')->latestProducts()->active()->get();

            $products = Product::with('activeFirstImage', 'brand')->active()
                ->where('product_brand_id', $productBrand->id);
            $totalProducts = $products->count();// total products in that brand
            $products = $products->paginate(12);
            $offset = $products->count();
            $type = 'product_brand';
            $typeValue = $short_url;
            $nextOffset = $offset + 12;
            $meta_data = $this->seo_content(0, 'ProductBrand', $productBrand->id);
            // dd($products);
            return view('web.products', compact('latest_products', 'products', 'totalProducts',
                'offset', 'type', 'typeValue', 'meta_data','nextOffset'));
        } else {
            return view('web.error.404');
        }
    }

    public function products()
    {
        $latest_products = Product::with('activeFirstImage', 'brand')->latestProducts()->active()->get();
        $products = Product::with('activeFirstImage', 'brand')->active()->paginate(12);
        $totalProducts = Product::active()->latest()->count();
        $offset = $products->count();
        $type = 'all';
        $typeValue = '';
        $nextOffset = $offset + 12;
        $meta_data = $this->seo_content(1, 'Products');
        $limit = 12;
        return view('web.products', compact('latest_products', 'products', 'totalProducts',
            'offset', 'type', 'typeValue', 'meta_data', 'nextOffset', 'limit'));
    }

    public function loadMoreProducts(Request $request)
    {
        $limit  = (int) $request->limit;
        $offset = (int) $request->offset;
        $nextOffset = $offset + $limit;

        // Base query
        $baseQuery = $this->filterProducts($request);

        // Get paginated data
        $products = (clone $baseQuery)
                    ->skip($offset)
                    ->take($limit)
                    ->latest()
                    ->with('activeFirstImage', 'brand')
                    ->get();
    
        // Get total count (NO offset / limit)
        $totalProducts = (clone $baseQuery)->count();

        if ($products->isNotEmpty()) {
            return view(
                'web.partials._filter_products',
                compact('products', 'nextOffset', 'offset', 'totalProducts', 'limit')
            );
        }

        return 0;

    }

    public function product($category, $short_url)
    {
        $product = Product::where('short_url', '=', $short_url)
            ->with('category', 'activeRelated', 'activeImages', 'activeGalleries', 'activeFeatures','brand')
            ->active()->first();
        if ($product) {
            $meta_data = $this->seo_content(0, 'Product', $product->id);
            return view('web.product', compact('product', 'meta_data'));
        } else {
            return view('web.error.404');
        }
    }

    public function productEnquiry(Request $request)
    {
        // dd($request, url()->previous());
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $enquiry = new ProductEnquiry();
            $enquiry->name = $request->name;
            $enquiry->email = $request->email;
            $enquiry->phone = $request->phone;
            $enquiry->product_id = $request->product_id;
            $enquiry->message = $request->message;
            $enquiry->request_url = url()->previous();
            if ($enquiry->save()) {
                if (SendProductEnquiryMail($enquiry)) {
                    return response()->json(['status' => 'success',
                        'message' => 'Product Enquiry has been submitted successfully']);
                } else {
                    return response()->json(['status' => 'success',
                        'message' => "Product Enquiry has been submitted successfully,Can't sent the mail right now"]);
                }
            } else {
                return response()->json(['status' => 'error',
                    'message' => 'Error : Error while submitting the enquiry']);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Error : Please enter a valid email id']);
        }
    }

    public function productSearch(Request $request)
    {
        $products = Product::with('activeFirstImage', 'brand')->active()
            ->where('title', 'LIKE', "%{$request->search_term}%")->get(['id', 'short_url', 'title', 'product_brand_id']);
        if ($products->isNotEmpty()) {
            return response()->json(['status' => 'success', 'products' => $products]);
        } else {
            return response()->json(['status' => 'error',]);
        }
    }

    public function productFilter(Request $request)
    {
        $condition = $this->filterProducts($request);
        $products = $condition->latest()->take(12)->get();
        $offset = ($condition->count() > 12) ? 12 : $condition->count();
        $totalProducts = $condition->count();
        $nextOffset = $offset + 12;

        return view('web.partials._filter_products', compact('products', 'totalProducts',
            'offset', 'nextOffset'));
    }

    public function filterProducts(Request $request)
    {
        if (!empty($request->input_field) && !empty($request->{$request->input_field})) {

            $field = $request->input_field; // e.g. product_brand_id

            $condition = Product::with(['activeFirstImage', 'brand'])
                ->active()
                ->whereIn($field, $request->$field);

        } else {

            // Type based filters
            if ($request->type === 'product_category' && !empty($request->typeValue)) {

                $productCategory = ProductCategory::active()
                    ->mainCategory()
                    ->with('activeChildren')
                    ->where('short_url', $request->typeValue)
                    ->firstOrFail();

                $categoryIds = collect($productCategory->activeChildren)
                    ->pluck('id')
                    ->push($productCategory->id)
                    ->toArray();

                $condition = Product::with(['activeFirstImage', 'brand'])
                    ->active()
                    ->whereIn('product_category_id', $categoryIds);

            } elseif ($request->type === 'product_brand' && !empty($request->typeValue)) {

                $productBrand = ProductBrand::active()
                    ->where('short_url', $request->typeValue)
                    ->firstOrFail();

                $condition = Product::with(['activeFirstImage', 'brand'])
                    ->active()
                    ->where('product_brand_id', $productBrand->id);

            } else {

                // Default: all active products
                $condition = Product::with(['activeFirstImage', 'brand'])
                    ->active();
            }
        }

        return $condition;
    }

    public function newsletter_store(Request $request)
    {
        if ($request->email) {
            $existEntry = NewsletterSubscription::where('email', '=', $request->email)->count();
            if ($existEntry > 0) {
                return response()->json(['status' => 'error', 'message' => '"' . $request->email . '" already subscribed']);
            } else {
                $newsLetter = new NewsletterSubscription;
                $newsLetter->email = $request->email;
                if ($newsLetter->save()) {
                    return response()->json(['status' => 'success', 'message' => 'Newsletter subscribed successfully']);
                } else {
                    return response()->json(['status' => 'error', 'message' => 'Error while submit the request']);
                }
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Empty input']);
        }
    }
}
