<div class="flex flex-row">
    <form action="{{ route(Route::currentRouteName(), request()->all()) }}" method="get"
          class="mb-[20px] mr-[15px]">
        <div class="flex flex-row items-center">
            <label class="px-2">
                <span>{{ __('Student') }}</span>
                <select class="flex flex-col w-[90%] h-[50px] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                    shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf] search-select"
                        name="student_id">
                    <option value="">{{ __('None') }}</option>
                    @foreach ($students as $student)
                        <option
                            @if($student->id == request()->student_id) selected @endif
                        value="{{ $student->id }}">
                            {{ $student->name }}
                        </option>
                    @endforeach
                </select>
            </label>
            <label class="px-2">
                <span>{{ __('Book') }}</span>
                <select class="flex flex-col w-[90%] flex p-1 my-2 py-2.5 bg-white border border-gray-300
                    shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf] search-select"
                        id="btn-reset-book" name="book_id">
                    <option value="">None</option>
                    @foreach ($books as $book)
                        <option
                            @if($book->id == request()->book_id) selected @endif
                        value="{{ $book->id }}">
                            {{ $book->title }}
                        </option>
                    @endforeach
                </select>
            </label>
            <div class="px-2">
                <button type="submit" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300
                    ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">
                    <i class="fas fa-search"></i>&nbsp;{{ __('Filter') }}
                </button>
            </div>
        </div>
    </form>

    @if(request()->get('student_id') || request()->get('book_id'))
        <a href="{{ route(Route::currentRouteName()) }}" class="px-2">
            <button class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300
                    ease-in rounded-[5px] tracking-wider text-white bg-[#F44336] rounded hover:bg-[#F55549]">
                <i class="fas fa-times ml-[4px]"></i>&nbsp;{{ __('Reset') }}
            </button>
        </a>
    @endif
</div>
