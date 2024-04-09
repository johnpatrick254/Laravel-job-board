<x-layout>
    <x-breadcrums :links="['My Jobs' => route('myjobs.index'), 'Create' => '#']" class="mb-4" />

    <x-card class="mb-8">
        <form action="{{ route('myjobs.store') }}" method="POST">
            @csrf

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label for="title" required>Job Title</label>
                    <x-text-input name="title" />
                </div>

                <div>
                    <label for="location" required>Location</label>
                    <x-text-input name="location" />
                </div>

                <div class="col-span-2">
                    <label for="salary" required>Salary</label>
                    <x-text-input name="salary" type="number" />
                </div>

                <div class="col-span-2">
                    <label for="description" required>Description</label>
                    <x-text-input name="description" type="textarea" />
                </div>

                <div>
                    <label for="experience" required>Experience</label>
                    <x-radio-group groupName="experience" :all_option="true" :group="\App\Models\JobListing::$experienceLevels" />
                </div>

                <div>
                    <label for="category" required>Category</label>
                    <x-radio-group groupName="category" all_option="true" :group="\App\Models\JobListing::$categories" />
                </div>

                <div class="col-span-2">
                    <x-button class="w-full">Create Job</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
