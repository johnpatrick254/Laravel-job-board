@props(['disabled' => false])
<div class="relative">
    <div class="absolute ml-1 right-1.5 top-1.5">
        <button type="button" @click="$refs['input-{{$name}}'].value='';$refs['{{$formRef}}'].submit()" >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd"
                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <input x-ref="input-{{$name}}"
        class="w-full h-9 rounded-md focus:ring-2 ring-slate-300 placeholder::text-slate-400 border-0 py-1.5 px-2.5 text-sm ring-1 "
        id="{{ $name }}" name="{{ $name }}" type="text" placeholder="{{ $placeholder }}"
        value="{{ $value }}">
</div>
