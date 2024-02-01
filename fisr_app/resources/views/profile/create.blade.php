<x-master title="Ajouter Profile"><h3>Ajouter Profile</h3>
    <form method="POST" action="{{route('profiles.store')}}" enctype="multipart/form-data">
        @csrf
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
        <label for="" class="form-label">Name</label>
        <input type="text" name="name"  class="form-control" value="{{ old('name') }}">
        @error('name')
            <div class=" text-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="email" name="email"  class="form-control" value="{{ old('email') }}">
        @error('email')
            <div class=" text-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
        <label for="" class="form-label">Password</label>
        <input type="password" name="password"  class="form-control" value="{{ old('password') }}">
        @error('password')
            <div class=" text-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
        <label for="" class="form-label">Password confirmation</label>
        <input type="password" name="password_confirmation"  class="form-control" value="{{ old('password') }}">
        </div>
        <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <textarea type="text" name="bio"  class="form-control" >{{ old('bio') }}</textarea>
        @error('bio')
            <div class=" text-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
        <label  class="form-label">Image</label>
        <input type="file" name="image"  class="form-control">
        </div>
        <div class="d-grid my-2">
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
</x-master>
