@if($blogs->isNotEmpty())
    @foreach($blogs as $blog)
        <div class="col-lg-4 col-md-6">
            <a href="{{ url('/'.$blog->short_url)}}">
                <div class="card">
                    <div class="dateNews">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h4>{{ date("d", strtotime($blog->posted_date)) }}</h4>
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
                        <img
                            src="{{ $blog->image ? asset('uploads/blog/image/'.$blog->image) : 'default image'}}"
                            class="card-img-top lazy loaded"
                            data-ll-status="loaded" alt="{{ $blog->image_meta_tag }}">
                    </picture>

                    <div class="card-body ">
                        <h5 class="card-title">{{ (strlen($blog->title) > 60)?substr($blog->title,0,60).'...':$blog->title }}</h5>
                        <p>{!! substr($blog->description,0,80) !!}</p>
                        <a href="{{ url('/'.$blog->short_url) }}" class="btnBlog">READ MORE</a>
                    </div>
                </div>
            </a>
        </div>
        @if($loop->last)
            <div class="appendHere{{$nextOffset}}"></div>
        @endif
    @endforeach
@endif
