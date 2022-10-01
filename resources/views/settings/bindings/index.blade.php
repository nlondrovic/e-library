@extends('settings.index')
@section('title', __('Bindings'))
@section('settings-subtitle')
    <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
    <a href="{{ route('policy.index') }}">{{ __('Settings') }}</a> >
    <a href="{{ route('bindings.index') }}">{{ __('Bindings') }}</a>
@endsection
@section('main-settings')

    <div class="height-kategorije pb-[30px]">
        <div class="flex items-center py-[10px] space-x-3 rounded-lg">
            <a href="{{ route('bindings.create') }}"
               class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300 ease-in
               rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE] shadow-md">
                <i class="fas fa-plus mr-[15px]"></i> {{ __('New binding') }}
            </a>
        </div>

        <div
            class="inline-block min-w-[96%] pt-3 align-middle bg-white rounded-bl-lg rounded-br-lg shadow-dashboard mb-[30px]">
            <table class="overflow-hidden shadow-lg rounded-xl min-w-full border-[1px] border-[#e4dfdf]" id="myTable">
                <thead class="bg-[#EFF3F6]">
                <tr class="border-b-[1px] border-[#e4dfdf]">
                    <th class="px-4 py-4 leading-4 tracking-wider text-left">{{ __('Binding') }}</th>
                    <th class="px-4 py-4"></th>
                </tr>
                </thead>
                <tbody class="bg-white">
                @foreach($bindings as $binding)
                    <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                        <td class="flex flex-row items-center px-4 py-4">
                            <p class="ml-4 text-center">{{ $binding->name }}</p>
                        </td>
                        <td class="px-4 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                            <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsBookBind hover:text-[#606FC7]">
                                <i class="fas fa-ellipsis-v"></i>
                            </p>
                            <div class="absolute right-72 z-10 hidden transition-all duration-300 origin-top-right transform
                                scale-95 -translate-y-2 dropdown-book-bind">
                                <div class="absolute w-56 mt-[7px] origin-top-right bg-white border
                                        border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none">
                                    <div class="py-1">
                                        <a href="{{ route('bindings.edit', $binding) }}" tabindex="0"
                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                            <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0 ml-[3px]">{{ __('Edit binding') }}</span>
                                        </a>
                                        <form method="post" action="{{ route('bindings.destroy', $binding) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                                <i class="fa fa-trash mr-[5px] ml-[5px] py-1 text-red-500"></i>
                                                <span class="px-4 py-0 text-red-500">{{ __('Delete binding') }}</span>
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

            <p class="mt-[20px]">
                {{ $bindings->links("pagination::tailwind") }}
            </p>
        </div>
    </div>

@endsection
