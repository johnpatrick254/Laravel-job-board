<x-layout>
    <x-breadcrums :links="['Jobs' => route('jobs.index'),'Applications'=>'#']"/>
        @forelse ($applications as $application)
            <x-jobcard :job="$application->jobListing"></x-jobcard>
        @empty
            <x-card class="text-center" >No Applications found</x-card> 
        @endforelse
</x-layout>