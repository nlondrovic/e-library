@extends('layouts.app')
@section('main')

    <div class="heading">
        <div class="flex justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="pt-[1px]">
                <div class="pl-[50px] pt-[7px] pb-[21px] flex flex-col">
                    <div>
                        <h1>
                            {{ $author->name }}
                        </h1>
                    </div>
                </div>
            </div>

            <div class="pt-[24px] pr-[30px]">
                <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-gray-300
                    dotsAutor hover:text-[#606FC7]">
                    <i class="fas fa-ellipsis-v"></i>
                </p>
                <div class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2
                    dropdown-autor">
                    <div class="absolute right-0 w-56 mt-[2px] origin-top-right bg-white border border-gray-200 divide-y
                        divide-gray-100 rounded-md shadow-lg outline-none">
                        <div class="py-1">
                            <a href="{{ route('authors.edit', $author) }}" tabindex="0"
                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">{{ __('Edit author') }}</span>
                            </a>
                            <form method="post" action="{{ route('authors.destroy', $author) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" tabindex="0"
                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                    <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                    <span class="px-4 py-0">{{ __('Delete author') }}</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pl-[50px] height-profile pb-[30px] scroll mt-[20px]">
        <div class="mr-[30px]">
            <div class="mt-[20px]">
                <span class="text-gray-500">{{ __('Name') }}</span>
                <p class="font-medium">{{ $author->name }}</p>
            </div>
            <div class="mt-[40px]">
                <span class="text-gray-500">{{ __('About') }}</span>
                <p class="font-medium max-w-[550px]">
                    {{ $author->about }}
                </p>
            </div>
        </div>

        <div class="flex flex-col">
            <div class="ml-[100px]  mt-[20px]">
                <img class="p-2 border-2 border-gray-300" width="300px" src="{{asset( $author->picture) }}">
            </div>
        </div>
    </div>

@endsection
