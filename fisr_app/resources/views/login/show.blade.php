<x-master title="Authentification">
    <div class="container w-75 my-2 bg-light p-5">
        <form method="POST" action="{{route('login')}}">
                @csrf
                <div class="text-center ">
                    <h2>Connexion</h2>
                </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" value="{{old('email')}}" >
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Password</label>
                <input type="password" name="password" class="form-control" >
            </div>
            <div class="d-grid">

                <button type="submit" class="btn btn-primary my-2 ">Se Connecter</button>
            </div>
        </form>
    </div>
</x-master>
