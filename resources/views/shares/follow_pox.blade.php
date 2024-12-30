<div class="card mt-3">
    <div class="card-header pb-0 border-0">
        <h5 class="">who to follow</h5>
    </div>



    <div class="card-body">
        @foreach ($whoToFollow as $user)
        <div class="hstack gap-2 mb-3">
            <div class="avatar">
                <a href="#!"><img style="width:40px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImage()}}"> </a>
            </div>



            <div class="overflow-hidden">
                <a class="h6 mb-0" href="{{route('users.show',$user->id)}}">{{ $user->name}} </a>

            </div>
            @auth
                
          
            <form method="GET" action="{{ route('users.show',$user->id) }}" style="display: inline" >
                @csrf
                <button type="submit"  class="btn btn-primary-soft rounded-circle icon-md ms-auto"> <i class="fa-solid fa-plus">
                </i></button></form> 
                 @endauth
        </div>
        @endforeach



    </div>
</div>