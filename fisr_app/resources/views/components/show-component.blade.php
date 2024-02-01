
    @props(['profile'])
<div>
    <div class="card my-2">
        <img class="card-img-top rounded-circle w-25 mx-auto" src="{{asset('storage/'.$profile->image)}}">
        <div class="card-body text-center">
            <h4 class="card-title">#{{$profile->id}} {{$profile->name}}</h4>
            <p class="card-text">{{$profile->created_at->format('d-m-Y')}}</p>
            <strong class="card-text">Email: {{$profile->email}}</strong>
            <p class="card-text">{{$profile->bio}}</p>
        </div>
    </div>

</div>
