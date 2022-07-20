@extends('layouts.app')

@section('main')

    <!-- Heading of content -->
    <div class="heading mt-[7px]">
        <div class="border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[50px] pb-[21px]">
                <h1>
                    Settings
                </h1>
            </div>
        </div>
    </div>
    <div class="py-4 text-gray-500 border-b-[1px] border-[#e4dfdf] pl-[50px]">
        <a href="#" class="inline hover:text-blue-800 active-book-nav">
            Policy
        </a>
        <a href="{{ route('categories.index') }}" class="inline ml-[70px] hover:text-blue-800">
            Categories
        </a>
        <a href="{{ route('genres.index') }}" class="inline ml-[70px] hover:text-blue-800">
            Genres
        </a>
        <a href="{{ route('publishers.index') }}" class="inline ml-[70px] hover:text-blue-800">
            Publishers
        </a>
        <a href="{{ route('bindings.index') }}" class="inline ml-[70px] hover:text-blue-800">
            Bindings
        </a>
        <a href="{{ route('sizes.index') }}" class="inline ml-[70px] hover:text-blue-800">
            Sizes
        </a>
        <a href="{{ route('scripts.index') }}" class="inline ml-[70px] hover:text-blue-800">
            Scripts
        </a>
    </div>
    <div class="height-ucenikProfile pb-[30px] pl-[50px] pt-[15px] scroll">
        {{-- Space for content --}}
        @yield('main-settings')
    </div>

@endsection
