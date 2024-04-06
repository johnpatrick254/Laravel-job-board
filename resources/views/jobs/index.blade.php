<x-layout>
    <x-breadcrums :links="['Jobs' => route('jobs.index')]" />
    <x-card class="mb-4 text-sm" x-data="">
        <form x-ref='filter' action="/jobs" method="GET" id=filter>
            @csrf
            <div action="/jobs" method="GET" class="mb4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name='Search' :value="Request::get('Search')" placeholder='Search for ay text' formRef='filter' />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary</div>
                    <div class="flex  items-center space-x-3 " >
                        <x-text-input name="From"   :value="Request::get('From')" placeholder="From" formRef='filter' />
                        <x-text-input name="To"   :value="Request::get('To')" placeholder="To" formRef='filter' />
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                    <x-radio-group groupName="experience" :group="\App\Models\JobListing::$experienceLevels" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>
                    <x-radio-group groupName="category" :group="\App\Models\JobListing::$categories" />
                </div>
            </div>
            <x-button type="submit" class="w-full">Filter</x-button>
        </form>
    </x-card>
    @if (count($jobs))
        @foreach ($jobs as $job)
            <x-jobcard :job="$job">
                <x-link-button :href="route('jobs.show', $job)">View</x-link-button>
            </x-jobcard>
        @endforeach
    @else
        <x-card class="text-center" >No jobs found</x-card>
    @endif

</x-layout>
