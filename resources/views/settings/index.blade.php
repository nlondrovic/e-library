@extends('layouts.app')
<?php
$route_name = \Illuminate\Support\Facades\Route::currentRouteName();
?>
@section('main')

    <!-- Heading of content -->
    <div class="mt-2">
        <div class="heading mt-[7px]">
            <div class="border-b-[1px] border-[#e4dfdf]">
                <div class="pl-[50px] pb-[21px]">
                    <h1>
                        Settings
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="py-4 text-gray-500 border-b-[1px] border-[#e4dfdf] pl-[50px]">
        <a href="{{ route('policy') }}"
           class="inline hover:text-blue-800 @if(str_contains($route_name, 'policy')) active-book-nav @endif">
            Policy
        </a>
        <a href="{{ route('categories.index') }}"
           class="inline ml-[70px] hover:text-blue-800 @if(str_contains($route_name, 'categories')) active-book-nav @endif">
            Categories
        </a>
        <a href="{{ route('genres.index') }}"
           class="inline ml-[70px] hover:text-blue-800 @if(str_contains($route_name, 'genres')) active-book-nav @endif">
            Genres
        </a>
        <a href="{{ route('publishers.index') }}"
           class="inline ml-[70px] hover:text-blue-800 @if(str_contains($route_name, 'publishers')) active-book-nav @endif">
            Publishers
        </a>
        <a href="{{ route('bindings.index') }}"
           class="inline ml-[70px] hover:text-blue-800 @if(str_contains($route_name, 'bindings')) active-book-nav @endif">
            Bindings
        </a>
        <a href="{{ route('sizes.index') }}"
           class="inline ml-[70px] hover:text-blue-800 @if(str_contains($route_name, 'sizes')) active-book-nav @endif">
            Sizes
        </a>
        <a href="{{ route('scripts.index') }}"
           class="inline ml-[70px] hover:text-blue-800 @if(str_contains($route_name, 'scripts')) active-book-nav @endif">
            Scripts
        </a>
    </div>
    <div class="height-ucenikProfile pb-[30px] pl-[50px] pt-[15px] scroll">
        {{-- Space for content --}}
        @yield('main-settings')
    </div>

@endsection
