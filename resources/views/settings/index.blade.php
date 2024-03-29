@extends('layouts.app')
<?php
$route_name = \Illuminate\Support\Facades\Route::currentRouteName();
?>
@section('main')

    <div class="pl-[50px] pb-[5px] border-b-[1px] border-[#e4dfdf] header-breadcrumbs">
        <h1> {{__('Settings')}}</h1>
        @yield('settings-subtitle')
    </div>

    <div class="py-4 text-gray-500 border-b-[1px] border-[#e4dfdf] pl-[50px]">
        <a href="{{ route('policy.index') }}"
           class="inline hover:text-blue-800 @if(str_contains($route_name, 'policy')) active-book-nav @endif">
            {{ __('Policy') }}
        </a>
        <a href="{{ route('categories.index') }}"
           class="inline ml-[70px] hover:text-blue-800 @if(str_contains($route_name, 'categories')) active-book-nav @endif">
            {{ __('Categories') }}
        </a>
        <a href="{{ route('genres.index') }}"
           class="inline ml-[70px] hover:text-blue-800 @if(str_contains($route_name, 'genres')) active-book-nav @endif">
            {{ __('Genres') }}
        </a>
        <a href="{{ route('publishers.index') }}"
           class="inline ml-[70px] hover:text-blue-800 @if(str_contains($route_name, 'publishers')) active-book-nav @endif">
            {{ __('Publishers') }}
        </a>
        <a href="{{ route('bindings.index') }}"
           class="inline ml-[70px] hover:text-blue-800 @if(str_contains($route_name, 'bindings')) active-book-nav @endif">
            {{ __('Bindings') }}
        </a>
        <a href="{{ route('sizes.index') }}"
           class="inline ml-[70px] hover:text-blue-800 @if(str_contains($route_name, 'sizes')) active-book-nav @endif">
            {{ __('Sizes') }}
        </a>
        <a href="{{ route('scripts.index') }}"
           class="inline ml-[70px] hover:text-blue-800 @if(str_contains($route_name, 'scripts')) active-book-nav @endif">
            {{ __('Scripts') }}
        </a>
    </div>

    <div class="height-ucenikProfile pb-[30px] pl-[50px] pt-[15px] scroll">
        @yield('main-settings')
    </div>

@endsection
