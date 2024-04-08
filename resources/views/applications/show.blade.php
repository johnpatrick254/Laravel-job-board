<x-layout>
    <x-breadcrums :links="['Jobs' => route('jobs.index'), 'Applications' => '#']" />

    <div class="flex flex-col space-y-4">
        @forelse ($applications as $application)
            <x-card>
                <x-jobcard :job="$application->jobListing"></x-jobcard>
                <div class="flex items-center justify-between text-xs text-slate-500">

                    <div>
                        <div>
                            Applied {{ $application->created_at->diffForHumans() }}
                        </div>
                        <div>
                            Other Applicants
                            {{ number_format($application->jobListing->jobListing_applications_count) == 0 ? 0 : number_format($application->jobListing->jobListing_applications_count) - 1 }}
                        </div>
                        <div>
                            Your asking salary ${{ number_format($application->expected_salary) }}
                        </div>
                        <div>
                            Average asking salary
                            ${{ number_format($application->jobListing->jobListing_applications_avg_expected_salary) }}
                        </div>
                    </div>
                    <div>
                        <form method="POST"
                            action="{{ route('users.applications.destroy', ['user' => auth()->user(), 'application' => $application]) }}">
                            @method('DELETE')
                            @csrf
                            <x-button>Cancel Application</x-button>
                        </form>
                    </div>
                </div>
            </x-card>
        @empty
            <x-card class="text-center">No Applications found</x-card>
        @endforelse
    </div>
</x-layout>
