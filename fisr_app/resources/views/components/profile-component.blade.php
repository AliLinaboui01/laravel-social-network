@props(['users','links'])
<div class="row my-5">
            @foreach ($users as $user)
            <div class="col-sm-4">
                <div class="card" >
                    <img src="{{asset('storage/'.$user->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$user->name}}</h5>
                        <p class="card-text">{{Str::limit($user->bio,50)}}</p>
                        {{-- <strong>{{$user->email}}</strong> --}}


                        <a href="{{route('profiles.show',$user->id)}}" class="stretched-link"></a>
                    </div>
                    <div class="card-foot border-top bg-light px-3 py-3 " style="z-index: 9">
                        <form action="{{route('profiles.destroy',$user->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button   class="btn btn-danger float-end" >Delete</button>
                        </form>
                        <form action="{{route('profiles.edit',$user->id)}}" method="get">

                            @csrf
                            <button   class="btn btn-secondary float-end mx-2" >Update</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

</div>
{!! $links !!}
