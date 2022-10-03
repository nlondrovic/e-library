<a href="{{ url()->previous() }}"
   onclick="return confirm('{{ __('Are you sure you want to cancel? The changes you made won\'t be saved.') }}')"
   class="btn-animation shadow-lg mr-[15px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
    {{ __('Cancel') }} <i class="fas fa-times ml-[4px]"></i>
</a>
<button type="submit"
        onclick="return confirm('{{ __('Are you sure you want to save the changes?')}} ')"
        class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm
                                py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]">
    {{ __('Save') }} <i class="fas fa-check ml-[4px]"></i>
</button>
