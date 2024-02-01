@props(['publication'])

<div class="card my-2 bg-light">
    <div class="card-body">
        {{-- {{ dd($publication->profile) }} --}}
        <div class="container">
            <div class="position-relative">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $publication->profile->image) }}" class="rounded-circle"
                            width="100px">
                        {{ $publication->profile->name }}
                        <a href="{{ route('profiles.show', $publication->profile->id) }}" class="stretched-link"></a>
                    </div>
                    <div class="col">
                        <h5>{{ $publication->titre }}</h5>
                    </div>
                </div>
            </div>

            <div class="col">
                @can('update', $publication)
                    <a class="btn btn-secondary float-end"
                        href="{{ route('publications.edit', $publication->id) }}">Update</a>
                @endcan
                @can('delete', $publication)
                    <form method="POST" action="{{ route('publications.destroy', $publication) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger float-end mx-2" type="submit">Delete</button>
                    </form>
                @endcan


            </div>
        </div>
        <p class="card-text">{{ $publication->body }}</p>
        <hr>


        @if (!is_null($publication->image))
            <footer class="my-2">
                <img class="img-fluid" src="{{ asset('storage/' . $publication->image) }}"
                    alt="{{ $publication->titre }}">
            </footer>
        @endif
    </div>
</div>
