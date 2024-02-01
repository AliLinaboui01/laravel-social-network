<nav class="navbar navbar-expand-lg bg-light">
<div class="container-fluid">
    <a class="navbar-brand" href="#">Social Network</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    @guest
        <li class="nav-item">
          <a class="nav-link" href="{{route('login.show')}}">Se Connecter</a>
        </li>
    @endguest
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../../home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('profiles.index')}}">profiles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('information.index')}}">more informations</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('profiles.create')}}">Ajouter Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('publications.index')}}">Publications</a>
        </li>
        @auth

            <li class="nav-item">
          <a class="nav-link" href="{{route('publications.create')}}">Ajouter Publication</a>
        </li>
        </ul>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                {{auth()->user()->name}}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="{{route('login.logout')}}">Deconnexion</a></li>
            </ul>
        </div>
    @endauth


    </div>
</div>
</nav>
