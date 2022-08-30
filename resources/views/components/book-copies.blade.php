<h2 class="mt-[20px] ml-[30px]">{{ __('BOOK COPIES') }}</h2>
<div class="mx-[30px] mt-[20px] flex flex-row">
    <div class="text-gray-500 mr-[30px]">
        <p>{{ __('Books available') }}:</p>
        <p class="mt-[20px]">{{ __('Reserved') }}:</p>
        <p class="mt-[20px]">{{ __('Checked out') }}:</p>
        <p class="mt-[20px]">{{ __('Overdue') }}:</p>
        <p class="mt-[20px]">{{ __('Total number') }}:</p>
    </div>
    <div class="text-center pb-[30px]">
        <p class="bg-green-200 text-green-700 rounded-[10px] px-[6px] py-[2px] text-[14px]">
            {{ $book->available_count }} {{ __('copies') }}</p>
        <p class="mt-[16px] bg-yellow-200 text-yellow-700 rounded-[10px] px-[6px] py-[2px] text-[14px]">
            {{ $book->reserved_count }} {{ __('copies') }}</p>
        <p class="mt-[16px] bg-blue-200 text-blue-800 rounded-[10px] px-[6px] py-[2px] text-[14px]">
            {{ $book->checkouts_count }} {{ __('copies') }}</p>
        <p class="mt-[16px] bg-red-200 text-red-800 rounded-[10px] px-[6px] py-[2px] text-[14px]">
            {{ $book->getOverdueCount() }} {{ __('copies') }}</p>
        <p class="mt-[16px] bg-purple-200 bg text-purple-700 rounded-[10px] px-[6px] py-[2px] text-[14px]">
            {{ $book->total_count }} {{ __('copies') }}
        </p>
    </div>
</div>
