@if($footer_service_menus->isNotEmpty())
    @foreach($footer_service_menus as $service_menu)
        <li>
            <a href="{{ url('services/'.$service_menu->short_url) }}">
                {{ $service_menu->title }}</a>
        </li>
        @if($loop->last)
            <div class="appendServiceHere{{$nextOffset}}"></div>
        @endif
    @endforeach
@endif
