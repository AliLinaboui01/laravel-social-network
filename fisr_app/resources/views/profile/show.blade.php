<x-master title="Profile">
    <h3>Profile</h3>
    <x-show-component :profile="$profile" />
    <div class="row">
        <h3>Publications:</h3>
        <div class="row">

            @foreach ($profile->publications as $publication)
                <x-publications :publication="$publication" />
            @endforeach
        </div>
    </div>
</x-master>
