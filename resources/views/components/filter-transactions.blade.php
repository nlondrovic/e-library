<div class="flex flex-row">
    <form action="{{ route(Route::currentRouteName(), request()->all()) }}" method="get"
          class="mb-[20px] mr-[15px]">
        <div class="flex flex-col">
            <div class="flex flex-row items-center">
            <label class="px-2 mr-[5px]">
                <p class="text-[15px]">{{ __('Student') }}</p>
                <select class="flex flex-col h-[50px]flex p-1 my-2 py-2.5 bg-white border border-gray-300
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
            <label class="px-2 mr-2">
                <p class="text-[15px]">{{ __('Book') }}</p>
                <select class="flex flex-col flex p-1 my-2 py-2.5 bg-white border border-gray-300
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
            <label class="px-2">
                <p class="text-[15px]">{{ __('Checkout librarian') }}</p>
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
            @if(!\Request::is('*/checkouts'))
            <label class="px-2 mr-2">
                <p class="text-[15px]">{{ __('Checkin librarian') }}</p>
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
            </div>
            <div class="flex flex-row">
                <div class="px-2 mt-[20px] mr-[14px]">
                    <p class="text-[15px]">{{ __('Date (from)') }}</p>
                    <input type="date" name="start_time" class="flex w-[300px] mt-2 px-2 py-2 text-base bg-white border
                            border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                           value="{{ request()->get('start_time') }}"/>
                </div>
                <div class="mt-[20px]">
                    <p class="text-[15px]">{{ __('Date (to)') }}</p>
                    <input type="date" name="end_time" class="flex w-[300px] mt-2 px-2 py-2 text-base bg-white border
                            border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                           value="{{ request()->get('end_time') }}"/>
                </div>
                <div class="px-2 py-[3px] mt-[50px] ml-[15px]">
                    <button type="submit" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300
                        ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">
                        <i class="fas fa-search"></i>&nbsp;{{ __('Filter') }}
                    </button>
                    @if(filtering())
                        <a href="{{ route(Route::currentRouteName()) }}"
                           class="ml-[15px] btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300
                                        ease-in rounded-[5px] tracking-wider text-white bg-[#F44336] rounded hover:bg-[#F55549]">
                            <i class="fas fa-times ml-[4px]"></i>&nbsp;{{ __('Reset') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>
