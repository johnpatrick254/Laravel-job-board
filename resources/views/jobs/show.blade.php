<x-layout>
    <x-breadcrums :links="['Jobs' => route('jobs.index'), $job->title => $job->id]" />

    <x-jobcard :job="$job">
        <p class="text-sm mb-3">{!! nl2br(e($job->description)) !!}</p>
        <x-link-button :href="route('jobs.application.create',$job)">Apply</x-link-button>

    </x-jobcard>
    <x-card >
       <h2>Other jobs by {{$job->employer->company_name}}</h2>
    @foreach ($job->employer->jobListings as $otherJob)
    <div class="my-4 flex justify-between text-slate-500"  >
        <div>
            <div class="text-slate-400">
                <a href="{{route('jobs.show',$otherJob)}}">{{$otherJob->title}}</a>
            </div>
            <div>
                {{$otherJob->created_at->diffForHumans()}}
            </div>
        </div>
        <div class="text-xs">
            ${{$otherJob->salary}}
        </div>
    </div>
    @endforeach
    </x-card>
</x-layout>
