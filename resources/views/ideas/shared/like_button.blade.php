@auth
<div>


    @if (Auth::user()->likes_boste($idea))

        <form action="{{ route('idea.unlike', $idea->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn text-danger fw-light nav-link fs-6">
                <span class="fas fa-heart me-1"></span> {{ $idea->likes_count }} 
            </button>
        </form>




    @else
        <form action="{{ route('idea.like', $idea->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn text-secondary fw-light nav-link fs-6">
                <span class="far fa-heart me-1"></span> {{ $idea->likes_count  }} 
            </button>
        </form>
    @endif
</div>
@endauth