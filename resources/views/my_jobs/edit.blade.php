<x-layout>
    <x-breadcrums :links="['My Jobs' => route('myjobs.index'), 'Edit Job' => '#']" class="mb-4" />

    <x-card class="mb-8">
        <form action="{{ route('myjobs.update', $job) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label for="title" :required="true">Job Title</label>
                    <x-text-input name="title" :value="$job->title" />
                </div>

                <div>
                    <abel for="location" :required="true">Location</abel>
                    <x-text-input name="location" :value="$job->location" />
                </div>

                <div class="col-span-2">
                    <label for="salary" :required="true">Salary</label>
                    <x-text-input name="salary" type="number" :value="$job->salary" />
                </div>

                <div class="col-span-2">
                    <label for="description" :required="true">Description</label>
                    <x-text-input name="description" type="textarea" :value="$job->description" />
                </div>

                <div>
                    <label for="experience" required>Experience</label>
                    <x-radio-group groupName="experience" :all_option="false" :group="\App\Models\JobListing::$experienceLevels" />

                </div>

                <div>
                    <label for="category" required >Category</label>
                    <x-radio-group groupName="category" all_option="false" :group="\App\Models\JobListing::$categories" />

                </div>

                <div class="col-span-2">
                    <x-button class="w-full">Edit Job</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
