<div class="border-b-[1px] border-[#e4dfdf]">
    <div class="mx-[30px] mt-[20px] flex flex-row">
        <div class="text-gray-500 mr-[30px]">
            <p>Books available:</p>
            <p class="mt-[20px]">Reserved:</p>
            <p class="mt-[20px]">Checked out:</p>
            <p class="mt-[20px]">Overdue:</p>
            <p class="mt-[20px]">Total number:</p>
        </div>
        <div class="text-center pb-[30px]">
            <p class="bg-green-200 text-green-700 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                {{ $book->available_count }} copies</p>
            <p class="mt-[16px] bg-yellow-200 text-yellow-700 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                {{ $book->reserved_count }} copies</p>
            <p class="mt-[16px] bg-blue-200 text-blue-800 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                {{ $book->checkouts_count }} copies</p>
            <p class="mt-[16px] bg-red-200 text-red-800 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                {{ $book->overdue_count }} copies</p>
            <p class="mt-[16px] bg-gray-200 text-purple-600 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                {{ $book->total_count }} copies
            </p>
        </div>
    </div>
</div>
