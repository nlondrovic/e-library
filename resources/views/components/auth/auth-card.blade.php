<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mb-[20px]">
        {{ $slot }}
    </div>

    @foreach (Config::get('languages') as $lang => $language)
        @if ($lang == App::getLocale())
            <li class="nav-item dropdown">
                <a class="">
                    <span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}
                </a>
            </li>
        @else
            <a class="" href="{{ route('lang.switch', $lang) }}">
                <span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}
            </a>
        @endif
    @endforeach

</div>
