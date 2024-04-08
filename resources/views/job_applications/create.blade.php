<x-layout>
    <x-breadcrums :links="['Jobs'  => route('jobs.index'), $job->title => route('jobs.show',$job->id), 'Apply' => '#']" />
    <x-jobcard :job="$job" />
    <x-card>
        <div class="mb-4 text-lg font-medium">
            <h2>Fill in yout application</h2>
        </div>
        <form enctype="multipart/form-data" action="{{ route('jobs.application.store', $job) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="expected_salary"> Expeccted Salary</label>
                <input
                required
                    class="w-full h-9 rounded-md focus:ring-2 ring-slate-300 placeholder::text-slate-400 border-0 py-1.5 px-2.5 text-sm ring-1 "
                    type="file" name="cv"></input>
            </div>
            <div class="mb-4">
                <label for="expected_salary"> Expeccted Salary</label>
                <input
                required
                    class="w-full h-9 rounded-md focus:ring-2 ring-slate-300 placeholder::text-slate-400 border-0 py-1.5 px-2.5 text-sm ring-1 "
                    type="number" name="expected_salary"></input>
            </div>
            @can('apply', $job)
                <x-button type="submit" class="w-full">Apply</x-button>
            @else
                <div class="text-center text-sm font-medium text-slate-500">You have already applied to this job</div>
            @endcan
        </form>
    </x-card>
</x-layout>
