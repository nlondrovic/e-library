@extends('layouts.app')
@section('title', __('Show all authors'))
@section('main')

    <div class="pl-[50px] pb-[5px] border-b-[1px] border-[#e4dfdf] header-breadcrumbs">
        <h1> {{__('Authors')}}</h1>
        <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
        <a href="{{ route('authors.index') }}">{{ __('Authors') }}</a>
    </div>

    <div class="scroll height-evidencija">
        <div class="flex items-center justify-between px-[50px] py-4 space-x-3 rounded-lg">
            <a href="{{ route('authors.create') }}"
               class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300
                       ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">
                <i class="fas fa-plus mr-[15px]"></i>{{ __('New author') }}
            </a>
            <form action="{{ route('authors.index') }}">
                <div class="wrapper">
                    <div class="search-input">
                        <a href="" hidden></a>
                        <input type="search" name="search" placeholder="{{ __('Search authors') }}"
                               value="{{ request()->get('search') }}" autocomplete="off">
                        <div class="autocom-box"></div>
                        <div class="search-icon"><i class="fas fa-search"></i></div>
                    </div>
                </div>
            </form>
            <script>
                let suggestions = [
                    @foreach($search_array as $author)
                        "{{ $author->name }}",
                    @endforeach
                ];
            </script>
        </div>

        <div class="px-[50px] pt-2 bg-white mb-[30px]">
            <div class="w-full mt-2">
                <table class="overflow-hidden shadow-lg rounded-xl min-w-full border-[1px] border-[#e4dfdf]"
                       id="myTable">
                    <thead class="bg-[#EFF3F6]">
                    <tr class="border-b-[1px] border-[#e4dfdf]">
                        <th class="px-4 py-4 leading-4 tracking-wider text-left">{{ __('Name') }}<a href="#"></a></th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">{{ __('About author') }}</th>
                        <th class="px-4 py-4"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($authors as $author)
                            <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                <td class="flex flex-row items-center px-4 py-3">
                                    <img class="object-cover w-8 mr-2 h-11" src="{{ asset($author->picture) }}" alt=""/>
                                    <a href="{{ route('authors.show', $author) }}">
                                        <span class="mr-2 font-medium text-center">{{ $author->name }}</span>
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ Str::limit($author->about )}}</td>
                                <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                    <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300
                                    dotsAutori hover:text-[#606FC7]">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </p>
                                    <div class="absolute z-10 hidden transition-all duration-300 origin-top-right transform
                                        scale-95 -translate-y-2 dropdown-autori">
                                        <div class="absolute right-[55px] w-56 mt-[7px] origin-top-right bg-white border
                                            border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none">
                                            <div class="py-1">
                                                <a href="{{ route('authors.show', $author) }}" tabindex="0"
                                                   class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700
                                                   outline-none hover:text-blue-600">
                                                    <i class="far fa-file mr-[5px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">{{ __('Show details') }}</span>
                                                </a>

                                                <a href="{{ route('authors.edit', $author) }}" tabindex="0"
                                                   class="flex w-full px-4 py-2 text-sm leading-5
                                                    text-left text-gray-700 outline-none hover:text-blue-600">
                                                    <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                                    <span class="px-4 ml-1 py-0">{{ __('Edit author') }}</span>
                                                </a>

                                                <form method="post" action="{{ route('authors.destroy', $author) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" tabindex="0" class="flex w-full px-4 py-2 text-sm leading-5
                                                        text-left text-gray-700 outline-none hover:text-blue-600">
                                                        <i class="fa fa-trash mr-[5px] ml-[4px] py-1"></i>
                                                        <span class="px-4 py-0">{{ __('Delete author') }}</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if(isset($pagination))
                    <p class="mt-[20px]">
                        {{ $authors->links("pagination::tailwind") }}
                    </p>
                @endif

            </div>
        </div>
    </div>
@endsection
