@extends('layouts.app')
@section('main')

    <div class="mt-2">
        <div class="heading mt-[7px]">
            <h1 class="pl-[50px] pb-[21px] border-b-[1px] border-[#e4dfdf]">
                {{ __('Students') }}
            </h1>
        </div>
    </div>

    <div class="scroll height-dashboard">
        <div class="flex items-center justify-between px-[50px] py-4 space-x-3 rounded-lg">
            <a href="{{ route('students.create') }}" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300
                ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">
                <i class="fas fa-plus mr-[15px]"></i> {{ __('New student') }}
            </a>
            <form action="{{ route('students.index') }}">
                <div class="wrapper">
                    <div class="search-input">
                        <a href="" hidden></a>
                        <input type="search" name="search" placeholder="Search students"
                               value="{{ request()->get('search') }}">
                        <div class="autocom-box"></div>
                        <div class="search-icon"><i class="fas fa-search"></i></div>
                    </div>
                </div>
            </form>
            <script>
                let suggestions = [
                    @foreach($search_array as $student)
                        "{{ $student->name }}",
                    @endforeach
                ];
            </script>
        </div>

        <div class="px-[50px] pt-2 bg-white">
            <div class="w-full mt-2">
                <table class="overflow-hidden shadow-lg rounded-xl min-w-full border-[1px] border-[#e4dfdf]"
                       id="myTable">
                    <thead class="bg-[#EFF3F6]">
                    <tr class="border-b-[1px] border-[#e4dfdf]">
                        <th class="px-4 py-4 leading-4 tracking-wider text-left">{{ __('Name') }}</th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">{{ __('Email') }}</th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">{{ __('Checked out') }}</th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">{{ __('Overdue') }}</th>
                        <th class="px-4 py-4"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">

                    @foreach($students as $student)
                        <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                            <td class="flex flex-row items-center px-4 py-4">
                                <img class="object-cover w-8 h-8 mr-2 rounded-full" src="{{ asset($student->picture) }}"
                                     alt=""/>
                                <a href="{{ route('students.show', $student) }}">
                                    <span class="font-medium text-center">{{ $student->name }}</span>
                                </a>
                            </td>
                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $student->email }}</td>
                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $student->getCheckedOutCount()>0 ?? $student->getCheckedOutCount() || "" }}</td>
                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $student->getOverdueCount()>0 ?? $student->getOverdueCount() || "" }}</td>
                            <td class="px-4 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                                <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsStudent
                                hover:text-[#606FC7]">
                                    <i class="fas fa-ellipsis-v"></i>
                                </p>
                                <div class="absolute z-10 hidden transition-all duration-300 origin-top-right transform
                                    scale-95 -translate-y-2 dropdown-student">
                                    <div class="absolute right-[50px] w-56 mt-[7px] origin-top-right bg-white border
                                    border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                         aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117"
                                         role="menu">
                                        <div class="py-1">
                                            <a href="{{ route('checkouts.index', ['student_id' => $student->id]) }}"
                                               tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700
                                           outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-exchange-alt mr-[3px]"></i>
                                                <span class="px-4 py-0">{{ __('Transactions') }}</span>
                                            </a>
                                            <a href="{{ route('students.show', $student) }}" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700
                                           outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-file mr-[5px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">{{ __('Show details') }}</span>
                                            </a>
                                            <a href="{{ route('students.edit', $student) }}" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700
                                           outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">{{ __('Edit student') }}</span>
                                            </a>

                                            <form action="{{ route('students.destroy', $student) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                    <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">{{ __('Delete student') }}</span>
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
                        {{ $students->links("pagination::tailwind") }}
                    </p>
                @endif

            </div>
        </div>

@endsection
