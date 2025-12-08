@if($blogs->isNotEmpty())
    <!-- latest news section starts here  -->
    <section class="latestNews">
        <div class="container">
            <div class="row">
                <div class="col-md-12 latestnewshead">
                    <div class="smallHeading h6">blog</div>
                    <h2>LATEST NEWS</h2>
                </div>
                <div class="latestNews_slider">
                    @foreach($blogs as $blog)
                        <div class="card">
                            <div class="dateNews">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><div class="h4">{{ date("d", strtotime($blog->posted_date)) }}</div>
                                        <p>{{ date("M", strtotime($blog->posted_date)) }}</p>
                                        <p>{{ date("Y", strtotime($blog->posted_date)) }}</p>
                                    </li>
                                </ul>
                            </div>
                            <picture>
                                @if($blog->webp_image)
                                    <source type="image/webp"
                                            srcset="{{ asset('uploads/blog/webp_image/'.rawurlencode($blog->webp_image)) }}">
                                @endif
                                <img loading='lazy' 
                                    src="{{ $blog->image ? asset('uploads/blog/image/'.$blog->image) : 'default image'}}"
                                    class="card-img-top lazy loaded img-fluid"
                                    data-ll-status="loaded" alt="{{ $blog->image_meta_tag }}" width="346" height="167">
                            </picture>
                            <div class="card-body ">
                                <h3 class="card-title h5">{{ (strlen($blog->title) > 70)?substr($blog->title,0,70).'...':$blog->title }}</h3>
                                <p>{!! substr($blog->description,0,80) !!}...</p>
                                <a href="{{ url('/'.$blog->short_url) }}" class="btn">READ MORE</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- latest news section ends here  -->
@endif
