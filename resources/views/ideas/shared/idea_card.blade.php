
<div class="card mt-2">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src=" {{ $idea->user->getImage() }} "
                    alt={{ $idea->user->name }}>
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user->id) }}">
                            {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                @auth


                    <form method="POST" action="{{ route('idea.destroy', $idea->id) }}">
                        @csrf
                        @method('delete')
                        <a class="btn " href="{{ route('idea.show', $idea->id) }}">show</a>

                        @can('update', $idea)

                            <a class="btn " href="{{ route('idea.edit', $idea->id) }}">edit</a>

                            <button class="btn btn-danger">X</button>
                        @endcan

                    </form>
                @endauth
            </div>
        </div>

    </div>
    <div class="card-body">

        <p class="fs-6 fw-light text-muted">
            {{ $idea->content }}
        </p>

        <div class="d-flex justify-content-between">
            @include('ideas.shared.like_button')
            {{-- like button --}}
            <div>

                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at->diffForHumans() }} </span>
            </div>
        </div>
        @include('ideas.shared.comments',['idea'=>$idea])
    </div>
</div>
