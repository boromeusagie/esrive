@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset('storage/img/esrive/logo-full-dark-100x36px.png') }}" alt="">
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @slot('subcopy')
        @component('mail::subcopy')
            <p class="center">
              Follow Us <br>
              <a href="https://twitter.com/esriveid" target="_blank">Twitter</a> | <a href="https://www.facebook.com/esrive.id/" target="_blank">Facebook</a> | <a href="https://www.instagram.com/esrive.id/" target="_blank">Instagram</a>
            </p>
        @endcomponent
    @endslot
    {{-- @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset --}}

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        @endcomponent
    @endslot
@endcomponent
