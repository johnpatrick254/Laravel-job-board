<x-layout>
    <x-breadcrums :links="['Jobs' => route('jobs.index'), $job->title => $job->id]" />

    <x-jobcard :job="$job">
        <p class="text-sm mb-3">{!! nl2br(e($job->description)) !!}</p>
        <x-link-button :href="url()->previous()">Back</x-link-button>
    </x-jobcard>
</x-layout>
