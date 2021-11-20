<form {{ $attributes([
    'class' => 'max-w-2xl mx-auto pt-10 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:px-8',
    'method' => 'POST',
    'enctype' => 'multipart/form-data',
    'action' => ''
    ]) }}
>
    @csrf
    <div class="pb-4">
        <x-form.label name="images"/>

        <label class="upload-input w-64 flex flex-col items-center px-4 py-6 bg-white rounded-md shadow-md tracking-wide uppercase border border-blue cursor-pointer hover:bg-purple-600 hover:text-white text-purple-600 ease-linear transition-all duration-150">
            <svg width="100" height="72" viewBox="0 0 100 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M87.3047 26.7188C87.3047 11.9624 74.8439 0 59.4727 0C48.9878 0 39.8571 5.56579 35.1115 13.7876C32.9516 12.6481 30.4706 12 27.832 12C19.4723 12 12.6953 18.5059 12.6953 26.5312C12.6953 26.7696 12.7013 27.0067 12.7131 27.2423C5.12557 31.3388 0 39.1417 0 48.0938C0 61.2968 11.1492 72 24.9023 72H43.75V48H31.25L50 24L68.75 48H56.25V72H75.0977C88.8508 72 100 61.2968 100 48.0938C100 39.1465 94.88 31.3473 87.2993 27.249C87.3029 27.0727 87.3047 26.8959 87.3047 26.7188Z" fill="#7C3AED"/>
            </svg>
            <span class="mt-2 font-bold text-base leading-normal">Change images</span>
            <input type="file" id="images" name="images[]" class="hidden" multiple>
        </label>

        @error('images')
            <p class="text-red-500 text-xs">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Upload
        </button>
    </div>
</form>
