<x-layout>
  <x-breadcrums :links="['My Jobs' => '#']" class="mb-4" />

  <div class="mb-8 text-right">
    <x-link-button href="{{ route('myjobs.create') }}">Add New</x-link-button>
  </div>

  @forelse ($jobs as $job)
    <x-jobcard :$job>
      <div class="text-xs text-slate-500">
        @forelse ($job->jobApplications as $application)
          <div class="mb-4 flex items-center justify-between">
            <div>
              <div>{{ $application->user->name }}</div>
              <div>
                Applied {{ $application->created_at->diffForHumans() }}
              </div>
              <div>
                Download CV
              </div>
            </div>

            <div>${{ number_format($application->expected_salary) }}</div>
          </div>
        @empty
          <div>No applications yet</div>
        @endforelse

        <div class="flex space-x-2">
          <x-link-button href="{{ route('myjobs.show', $job) }}">Edit</x-link-button>

          <form action="{{ route('myjobs.destroy', $job) }}" method="POST">
            @csrf
            @method('DELETE')
            <x-button>Delete</x-button>
          </form>
        </div>
      </div>
    </x-jobcard>
  @empty
    <div class="rounded-md border border-dashed border-slate-300 p-8">
      <div class="text-center font-medium">
        No jobs yet
      </div>
      <div class="text-center">
        Post your first job <a class="text-indigo-500 hover:underline"
          href="{{ route('te') }}">here!</a>
      </div>
    </div>
  @endforelse
</x-layout>