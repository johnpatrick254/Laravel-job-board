<x-layout>
    <x-card>
        <form action="{{ route('employers.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="company_name"> Company name *</label>
                <input
                required
                    class="w-full h-9 rounded-md focus:ring-2 ring-slate-300 placeholder::text-slate-400 border-0 py-1.5 px-2.5 text-sm ring-1 "
                    type="text" name="company_name"></input>
            </div>
            <x-button class="w-full text-current" >Create</x-button>
        </form>
    </x-card>
</x-layout>
