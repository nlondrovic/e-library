<div class="flex flex-row accordionPanel accordionPanelHidden w-[100%]" id="filter-component">
    <form action="{{ route(Route::currentRouteName(), request()->all()) }}" method="get"
          class="mb-[20px] mr-[15px]">
        <div class="flex flex-col">
            <div class="flex flex-row items-center">

                {{-- Book --}}
                <label class="px-2 mr-2">
                    <p class="text-[15px]">{{ __('Book(s)') }}</p>
                    <select class="flex flex-col p-1 my-2 py-2.5 bg-white border border-gray-300
                    shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf] search-select-multiple w-[300px]"
                            id="btn-reset-book" name="book_ids[]" multiple="multiple">
                        @foreach($books as $book)
                            <option
                                @if(request()->book_ids)
                                    @if(in_array($book->id, request()->book_ids)) selected @endif
                                @endif
                                value="{{ $book->id }}">
                                {{ $book->title }}
                            </option>
                        @endforeach
                    </select>
                </label>

                {{-- Student --}}
                <label class="px-2 mr-[5px]">
                    <p class="text-[15px]">{{ __('Student(s)') }}</p>
                    <select class="flex flex-col h-[50px] p-1 my-2 py-2.5 bg-white border border-gray-300
                    shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf] search-select-multiple w-[300px]"
                            name="student_ids[]" multiple="multiple">
                        @foreach ($students as $student)
                            <option
                                @if(request()->student_ids)
                                    @if(in_array($student->id, request()->student_ids)) selected @endif
                                @endif
                                value="{{ $student->id }}">
                                {{ $student->name }}
                            </option>
                        @endforeach
                    </select>
                </label>

                {{-- Checkout librarian --}}
                <label class="px-2">
                    @if(\Request::is('*/activeReservations') || \Request::is('*/archivedReservations'))
                        <p class="text-[15px]">{{ __('Librarian(s)') }}</p>
                    @else
                        <p class="text-[15px]">{{ __('Checkout librarian(s)') }}</p>
                    @endif
                    <select class="flex flex-col h-[50px] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                        shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf] search-select-multiple w-[300px]"
                            name="checkout_librarian_ids[]" multiple="multiple" style="width: 270px">
                        @foreach ($checkout_librarians as $librarian)
                            <option
                                @if(request()->checkout_librarian_ids)
                                    @if(in_array($librarian->id, request()->checkout_librarian_ids)) selected @endif
                                @endif
                                value="{{ $librarian->id }}">
                                {{ $librarian->name }}
                            </option>
                        @endforeach
                    </select>
                </label>

                {{-- Reset filters button --}}
                @if(filtering() && (\Request::is('*/checkins') || \Request::is('*/lost')))
                    <a href="{{ route(Route::currentRouteName()) }}"
                       class="ml-[15px] mt-[20px] btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300
                                        ease-in rounded-[5px] tracking-wider text-white bg-[#F44336] rounded hover:bg-[#F55549]">
                        <i class="fas fa-times ml-[4px]"></i>&nbsp;{{ __('Reset filters') }}
                    </a>
                @endif

            </div>

            <div class="flex flex-row">

                {{-- Date (from) --}}
                <div class="px-2 mt-[20px] mr-[14px]">
                    <p class="text-[15px]">{{ __('Date (from)') }}</p>
                    <input type="date" name="start_time" class="flex w-[300px] px-2 py-2 text-base bg-white border
                            border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                           value="{{ request()->get('start_time') }}"/>
                </div>

                {{-- Date (to) --}}
                <div class="mt-[20px]">
                    <p class="text-[15px]">{{ __('Date (to)') }}</p>
                    <input type="date" name="end_time" class="flex w-[300px]  px-2 py-2 text-base bg-white border
                            border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                           value="{{ request()->get('end_time') }}"/>
                </div>

                @if(\Request::is('*/checkins') || \Request::is('*/lost'))
                    {{-- Write-off/Checkin librarian --}}
                    <label class="px-2 mt-[30px] ml-[15px]">
                        @if(\Request::is('*/lost'))
                            <p class="text-[15px]">{{ __('Write-off librarian(s)') }}</p>
                        @else
                            <p class="text-[15px]">{{ __('Checkin librarian(s)') }}</p>
                        @endif
                        <select class="flex flex-col h-[50px] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                            shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf] search-select-multiple w-[300px]"
                                name="checkin_librarian_ids[]" multiple="multiple" style="width: 270px">
                            @foreach ($checkin_librarians as $librarian)
                                <option
                                    @if(request()->checkin_librarian_ids)
                                        @if(in_array($librarian->id, request()->checkin_librarian_ids)) selected @endif
                                    @endif
                                    value="{{ $librarian->id }}">
                                    {{ $librarian->name }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                @endif

                {{-- Buttons --}}
                <div class="py-[3px] mt-[40px] ml-[15px]">

                    {{-- Filter buttons --}}
                    <button type="submit" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300
                        ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">
                        <i class="fas fa-search"></i>&nbsp;{{ __('Filter') }}
                    </button>

                    {{-- Reset filters button --}}
                    @if(filtering() && !(\Request::is('*/checkins') || \Request::is('*/lost')))
                        <a href="{{ route(Route::currentRouteName()) }}"
                           class="ml-[15px] btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300
                                        ease-in rounded-[5px] tracking-wider text-white bg-[#F44336] rounded hover:bg-[#F55549]">
                            <i class="fas fa-times ml-[4px]"></i>&nbsp;{{ __('Reset filters') }}
                        </a>
                    @endif
                </div>

            </div>
        </div>
    </form>
</div>
