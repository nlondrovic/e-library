@extends('settings.index')
@section('title', __('Publishers'))
@section('settings-subtitle')
    <a href="{{ route('dashboard') }}">{{ __('Home') }}</a> >
    <a href="{{ route('policy.index') }}">{{ __('Settings') }}</a> >
    <a href="{{ route('publishers.index') }}">{{ __('Publishers') }}</a>
@endsection
@section('main-settings')

    <div class="height-kategorije pb-[30px]">
        <div class="flex items-center py-[10px] space-x-3 rounded-lg">
            <a href="{{ route('publishers.create') }}"
               class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300 ease-in
               rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE] shadow-md">
                <i class="fas fa-plus mr-[15px]"></i> {{ __('New publisher') }}
            </a>
        </div>

        <div
            class="inline-block min-w-[96%] pt-3 align-middle bg-white rounded-bl-lg rounded-br-lg shadow-dashboard mb-[30px]">
            <table class="overflow-hidden shadow-lg rounded-xl min-w-full border-[1px] border-[#e4dfdf]" id="myTable">
                <thead class="bg-[#EFF3F6]">
                <tr class="border-b-[1px] border-[#e4dfdf]">
                    <th class="px-4 py-4 leading-4 tracking-wider text-left">{{ __('Publisher') }}</th>
                    <th class="px-4 py-4"></th>
                </tr>
                </thead>
                <tbody class="bg-white">
                @foreach($publishers as $publisher)
                    <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                        <td class="flex flex-row items-center px-4 py-4">
                            <p class="ml-4 text-center">{{ $publisher->name }}</p>
                        </td>
                        <td class="px-4 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                            <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsPublisher hover:text-[#606FC7]">
                                <i class="fas fa-ellipsis-v"></i>
                            </p>
                            <div class="relative z-10 hidden transition-all duration-300 origin-top-right transform
                                scale-95 -translate-y-2 dropdown-publisher">
                                <div class="absolute right-1 w-56 mt-[7px] origin-top-right bg-white border
                                        border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none">
                                    <div class="py-1">
                                        <a href="{{ route('publishers.edit', $publisher) }}" tabindex="0"
                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700
                                               outline-none hover:text-blue-600">
                                            <i class="fas fa-edit mr-[3px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0 ml-[1px]">{{ __('Edit publisher') }}</span>
                                        </a>
                                        <form action="{{ route('publishers.destroy', $publisher) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" tabindex="0"
                                                    onclick="return confirm('{{ __('Are you sure you want to delete this? This action is irreversible.')}} ')"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 hover:text-red-500"
                                                    style="outline: none">
                                                <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">{{ __('Delete publisher') }}</span>
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
                {{ $publishers->links("pagination::tailwind") }}
            </p>
        </div>
    </div>

@endsection
