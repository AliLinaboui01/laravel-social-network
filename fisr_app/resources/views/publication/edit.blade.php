<x-master title="Update"><h3>Update Publication</h3>
     <form method="POST" action="{{route('publications.update',$publication->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if ($errors->any())
        <x-alert type="danger">
                <h6>Errors:</h6>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </x-alert>

        @endif
        <div class="mb-3">
        <label for="" class="form-label">Title</label>
        <input type="text" name="titre"  class="form-control" value="{{ old('titre',$publication->titre) }}">
        @error('titre')
            <div class=" text-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <textarea type="text" name="body"  class="form-control" >{{ old('body',$publication->body) }}</textarea>
        @error('body')
            <div class=" text-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
        <label  class="form-label">Image</label>
        <input type="file" name="image"  class="form-control">
        </div>
        @if (!is_null($publication->image))
        <div>
              <img class="m-2" src="{{asset('storage/'.$publication->image)}}" width="200" alt="{{$publication->titre}}">
            </div>
        @endif
        <div class="d-grid my-2">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>
</x-master>
