<x-layout>
    <x-breadcrums :links="['Jobs'=>route('jobs.index')]"/>
    <x-card class="mb-4 text-sm">
        <form action="{{route('jobs.index')}}" class="mb4 grid grid-cols-2 gap-4">
            <div>
                <div class="mb-1 font-semibold">Search</div>
                <x-text-input name="Search" value="" placeholder="Search for ay text"/>
            </div>
            <div>
                <div class="mb-1 font-semibold">Salary</div>
                <div class="flex justify-between items-center space-x-2">
                    <x-text-input name="From" value="" placeholder="From"/>
                    <x-text-input name="To" value="" placeholder="To"/>
                </div>
            </div>
          

        </form>
    </x-card>
    @foreach ($jobs as $job)
        <x-jobcard :job="$job" >
            <x-link-button :href="route('jobs.show', $job)">Apply</x-link-button>
        </x-jobcard>
    @endforeach
</x-layout>
