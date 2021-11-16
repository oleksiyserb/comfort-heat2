@props(['product'])

<form {{ $attributes([
    'class' => 'absolute top-2 right-2',
    'method' => 'POST',
    'action' => ''
]) }}>
    @csrf
    @method('DELETE')
    <button type="submit" title="Delete image">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M20 10C20 15.5228 15.5228 20 10 20C4.47715 20 0 15.5228 0 10C0 4.47715 4.47715 0 10 0C15.5228 0 20 4.47715 20 10ZM13.1518 14.7082L10 11.5175L6.84825 14.6693L5.33074 13.1518L8.48249 10L5.33074 6.84825L6.84825 5.33074L10 8.48249L13.1518 5.33074L14.6693 6.84825L11.5175 10L14.7082 13.1518L13.1518 14.7082Z" fill="#E04F5F"/>
        </svg>
    </button>
</form>
