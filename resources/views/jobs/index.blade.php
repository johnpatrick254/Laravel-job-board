<x-layout>
    @foreach ($jobs as $job)
        <x-jobcard :job="$job" >
            <x-link-button :href="route('jobs.show', $job)">Apply</x-link-button>
        </x-jobcard>
    @endforeach
</x-layout>
