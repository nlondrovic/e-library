@extends('settings.index')
@section('main-settings')

    {{-- New size button --}}
    <div class="height-kategorije pb-[30px]">
        <div class="flex items-center pl-[15px] py-[10px] space-x-3 rounded-lg">
            <a href="{{ route('scripts.create') }}"
               class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300 ease-in
               rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">
                <i class="fas fa-plus mr-[15px]"></i> New script
            </a>
        </div>

        {{-- Table --}}
        <div
            class="inline-block min-w-full pl-[15px] pt-3 align-middle bg-white rounded-bl-lg rounded-br-lg shadow-dashboard">
            <table class="overflow-hidden shadow-lg rounded-xl min-w-full border-[1px] border-[#e4dfdf]" id="myTable">
                <thead class="bg-[#EFF3F6]">
                <tr class="border-b-[1px] border-[#e4dfdf]">
                    <th class="px-4 py-4 leading-4 tracking-wider text-left">Script</th>
                    <th class="px-4 py-4"></th>
                </tr>
                </thead>
                <tbody class="bg-white">
                @foreach($scripts as $script)
                    <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                        <td class="flex flex-row items-center px-4 py-4">
                            <p>{{ $script->name }}</p>
                        </td>
                        <td class="px-4 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                            <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsFormat hover:text-[#606FC7]">
                                <i class="fas fa-ellipsis-v"></i>
                            </p>
                            <div
                                class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-format">
                                <div
                                    class="absolute right-[25px] w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                    aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117"
                                    role="menu">
                                    <div class="py-1">
                                        <a href="{{ route('scripts.edit', $script) }}" tabindex="0"
                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                           role="menuitem">
                                            <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0">Edit script</span>
                                        </a>
                                        <form action="{{ route('scripts.destroy', $script) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Delete script</span>
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
        </div>
    </div>

@endsection
