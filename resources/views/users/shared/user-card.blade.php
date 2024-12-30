@if ($editing ?? false)
    @include('users.shared.user-edit-card')
@else
    <div class="card">
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImage() }}"
                        alt="Mario Avatar">
                    <div>
                        <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                            </a></h3>
                        <span class="fs-6 text-muted">{{ $user->email }}</span>
                    </div>

                </div>
           

                    @can('userUpdate',$user)
                        
                    
                        <div><a href="{{ route('users.edit', $user->id) }}">Edit</a></div>
                   @endcan
                
            </div>
            <div class="px-2 mt-4">




                <p class="fs-6 fw-light">
                    {{ $user->bio }}
                </p>
@include('users.shared.user-status')

               

                    @if (!auth()->user()->is( $user))
                        <div class="mt-3">
                            @if (Auth::user()->followes($user))
                                <form action="{{ route('user.unfollow', $user->id) }}" method="POST">
                                    @csrf

                                    <button type="submit" class="btn btn-danger btn-sm"> UnFollow </button>
                                </form>
                            @else
                                <form action="{{ route('user.follow', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm"> Follow </button>
                                </form>
                            @endif
                        </div>
                    @endif
                
            </div>
        </div>
    </div>


@endif
