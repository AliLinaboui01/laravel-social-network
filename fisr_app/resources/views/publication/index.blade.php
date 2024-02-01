<x-master title="Publications">
    <div class="container w-75 mx-auto">
        <div class="row">
            @foreach ($publications as $publication)
                <x-publications :publication="$publication" />
            @endforeach
        </div>
    </div>
    {{ $publications->links() }}
</x-master>
