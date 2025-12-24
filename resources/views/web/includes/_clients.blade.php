<section class="clients commonPadding">
    <p class="h3">
        Trusted by <strong>1000+ happy customers</strong> from the whole world
    </p>
    <div class="clients-slider">
        @foreach ($clients as $client)

        <a href="#" aria-label="Visit client website" target="_blank" rel="noopener noreferrer">
            <picture>
                <img loading="lazy" src="{{asset('/uploads/client/'.$client->image)}}" width="167" height="39" alt="{{$client->image_meta_tag}}" class="img-fluid w-100">
            </picture>
        </a>
        @endforeach
    </div>
</section>