<div>
    <label for="{{ $groupName }}" class="flex mb-1 items-center">
        <input type="radio" name="{{ $groupName }}" id="{{ $groupName }}" value="null"
            @checked(!request( $groupName ) || request($groupName) === 'null')>
        <span class="ml-2">All</span>
        </input>
    </label>
    @foreach ($group as $option)
        <label for="{{ $groupName }}" class="flex mb-1 items-center">
            <input type="radio" name="{{ $groupName }}" id="{{ $groupName }}" value="{{ $option }}"
                @checked(request($groupName ) === $option)>
            <span class="ml-2">{{ Str::ucfirst($option) }}</span>
            </input>
        </label>
    @endforeach

</div>
