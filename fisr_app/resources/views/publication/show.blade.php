<x-master title="show"><h3>Show Publication</h3>

    <div class="my-2">
        <div class="card py-2">
        <img class="card-img-top  w-25 mx-auto" src="{{asset('storage/'.$publication->image)}}">
        <div class="card-body text-center">
            <h4 class="card-title">#{{$publication->id}} {{$publication->titre}}</h4>
            <p class="card-text">{{$publication->body}}</p>

        </div>
    </div>
    </div>
</x-master>
