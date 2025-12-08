@if($clients->isNotEmpty())
    <!-- our clients section starts here  -->
    <section class="ourClients">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h6 class="smallHeading">clients</h6>
                    <h2>OUR CLIENTS</h2>
                </div>
                <div class="col-md-8">
                    <div class="our_clients_slider">
                        @foreach($clients as $client)
                            <div class="clients_card">
                                <picture>
                                    @if($client->webp_image)
                                        <source type="image/webp"
                                                srcset="{{ asset('uploads/client/'.rawurlencode($client->webp_image)) }}">
                                    @endif
                                    <img
                                        src="{{ $client->image ? asset('uploads/client/'.$client->image) : 'default image'}}"
                                        class="lazy loaded"
                                        data-ll-status="loaded" alt="{{ $client->image_meta_tag }}">
                                </picture>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our clients section ends here  -->
@endif
