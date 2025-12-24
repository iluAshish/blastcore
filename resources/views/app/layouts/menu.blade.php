<ul>
    <li>
        <ul>
            <li class="{{ (Request::segment(2)=='admin')?'active':'' }} mt-2">
                <a href="{{url('admin/admin')}}">
                    <i class="fa fa-user"></i>
                    <span>Admin</span>
                </a>
            </li>
            <li class="is-dropdown {{ (Request::segment(2)=='home')?'open':'' }} mt-2">
                <a href="#">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
                <ul>
                    <li class="{{ (Request::segment(3)=='slider')?'active':'' }}"><a
                            href="{{url('admin/home/slider')}}"><i class="fa fa-angle-right"></i> Slider</a></li>
                    <li class="{{ (Request::segment(3)=='about')?'active':'' }}"><a
                            href="{{url('admin/home/about')}}"><i class="fa fa-angle-right"></i> About</a></li>
                    <li class="{{ (Request::segment(3)=='highlight')?'active':'' }}"><a
                            href="{{url('admin/home/highlight')}}"><i class="fa fa-angle-right"></i> Highlight</a></li>
                    <li class="{{ (Request::segment(3)=='testimonial')?'active':'' }}"><a
                            href="{{url('admin/home/testimonial/list')}}"><i class="fa fa-angle-right"></i> Testimonial</a></li>
                    <li class="{{ (Request::segment(3)=='gallery')?'active':'' }}"><a
                            href="{{url('admin/home/gallery/list')}}"><i class="fa fa-angle-right"></i>Manage Gallery</a></li>
                </ul>
            </li>
            <li class="is-dropdown {{ (Request::segment(2)=='about')?'open':'' }} mt-2">
                <a href="#">
                    <i class="fa fa-info"></i>
                    <span>About</span>
                </a>
                <ul>
                    <li class="{{ (Request::segment(3)=='about_us')?'active':'' }}"><a
                            href="{{url('admin/about/about_us')}}"><i class="fa fa-angle-right"></i> About-Us</a></li>
                    <li class="{{ (Request::segment(3)=='why_choose_us')?'active':'' }}"><a
                            href="{{url('admin/about/why_choose_us/list')}}"><i class="fa fa-angle-right"></i> Why
                            Choose Us</a></li>
                    <li class="{{ (Request::segment(3)=='success_story')?'active':'' }}"><a
                            href="{{url('admin/about/success_story/list')}}"><i class="fa fa-angle-right"></i> Success
                            Story</a></li>
                    <li class="is-dropdown {{ (Request::segment(3)=='our_brand')?'open':'' }}">
                        <a href="#"><i class="fa fa-angle-right"></i><span>Our Brand</span></a>
                        <ul>
                            <li class="{{ (Request::segment(4)=='our_brand')?'active':'' }} ml-3"><a
                                    href="{{url('admin/about/our_brand/our_brand')}}">
                                    <i class="fa fa-angle-right"></i> Our Brand</a>
                            </li>
                            <li class="{{ (Request::segment(4)=='brand_highlight')?'active':'' }} ml-3"><a
                                    href="{{url('admin/about/our_brand/brand_highlight/list')}}">
                                    <i class="fa fa-angle-right"></i> Brand Highlights</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="{{ (Request::segment(2)=='service')?'active':'' }} mt-2">
                <a href="{{url('admin/service')}}">
                    <i class="fa fa-cog"></i>
                    <span>Service</span>
                </a>
            </li>
            <li class="{{ (Request::segment(2)=='client')?'active':'' }} mt-2">
                <a href="{{url('admin/client')}}">
                    <i class="fa fa-users"></i>
                    <span>Client</span>
                </a>
            </li>
            <li class="{{ (Request::segment(2)=='blog')?'active':'' }} mt-2">
                <a href="{{url('admin/blog')}}">
                    <i class="fa fa-comments"></i>
                    <span>Blogs</span>
                </a>
            </li>
            <li class="is-dropdown {{ (Request::segment(2)=='product')?'open':'' }} mt-2">
                <a href="#">
                    <i class="fa fa-image"></i>
                    <span>Product</span>
                </a>
                <ul>
                    <li class="{{ (Request::segment(3)=='category')?'active':'' }}"><a
                            href="{{url('admin/product/category')}}"><i class="fa fa-angle-right"></i> Category</a></li>
                    <li class="{{ (Request::segment(3)=='brand')?'active':'' }}"><a
                            href="{{url('admin/product/brand')}}"><i class="fa fa-angle-right"></i> Brand</a></li>
                    <li class="{{ (Request::segment(3)!='category' && Request::segment(3)!='brand' && Request::segment(2)=='product')?'active':'' }}">
                        <a href="{{url('admin/product')}}"><i class="fa fa-angle-right"></i> Products</a>
                    </li>
                </ul>
            </li>
            <li class="{{ (Request::segment(2)=='contact_enquiry')?'active':'' }} mt-2">
                <a href="{{url('admin/contact_enquiry')}}">
                    <i class="fa fa-handshake"></i>
                    <span>Contact Enquiry</span>
                </a>
            </li>
            <li class="{{ (Request::is('admin/product/enquiry'))?'active':'' }} mt-2">
                <a href="{{url('admin/product/enquiry')}}">
                    <i class="fa fa-bullhorn"></i>
                    <span>Product Enquiry</span>
                </a>
            </li>
            <li class="{{ (Request::is('admin/service/enquiry'))?'active':'' }} mt-2">
                <a href="{{url('admin/service/enquiry')}}">
                    <i class="fa fa-bullhorn"></i>
                    <span>Service Enquiry</span>
                </a>
            </li>
            <li class="{{ (Request::segment(2)=='newsletter')?'active':'' }} mt-2">
                <a href="{{url('admin/newsletter')}}">
                    <i class="fa fa-envelope"></i>
                    <span>Newsletter</span>
                </a>
            </li>
            <li class="{{ (Request::segment(3)=='content')?'active':'' }} mt-2">
                <a href="{{url('admin/site/content')}}">
                    <i class="fa fa-list"></i>
                    <span>Common Content</span>
                </a>
            </li>
            <li class="{{ (Request::segment(2)=='site' && Request::segment(3)=='contact')?'active':'' }} mt-2">
                <a href="{{url('admin/site/contact')}}">
                    <i class="fa fa-envelope"></i>
                    <span>Contact Page Content</span>
                </a>
            </li>
            <li class="is-dropdown {{ (Request::segment(2)=='meta_data')?'open':'' }} mt-2">
                <a href="#">
                    <i class="fa fa-tags"></i>
                    <span>Meta Tags</span>
                </a>
                <ul>
                    <li class="{{ (Request::segment(3)=='home')?'active':'' }}"><a
                            href="{{url('admin/meta_data/home')}}"><i class="fa fa-angle-right"></i> Home</a></li>
                    <li class="{{ (Request::segment(3)=='about')?'active':'' }}"><a
                            href="{{url('admin/meta_data/about')}}"><i class="fa fa-angle-right"></i> About</a></li>
                    <li class="{{ (Request::segment(3)=='products')?'active':'' }}"><a
                            href="{{url('admin/meta_data/products')}}"><i class="fa fa-angle-right"></i> Products</a>
                    </li>
                    <li class="{{ (Request::segment(3)=='blogs')?'active':'' }}"><a
                            href="{{url('admin/meta_data/blogs')}}"><i class="fa fa-angle-right"></i> Blogs</a></li>
                    <li class="{{ (Request::is('admin/meta_data/contact'))?'active':'' }}"><a
                            href="{{url('admin/meta_data/contact')}}"><i class="fa fa-angle-right"></i> Contact</a></li>
                </ul>
            </li>
            <li class="{{ (Request::segment(2)=='other_meta_data')?'active':'' }} mt-2">
                <a href="{{url('admin/other_meta_data')}}">
                    <i class="fa fa-tag"></i>
                    <span>Other Meta Tag</span>
                </a>
            </li>
        </ul>
    </li>
</ul>
