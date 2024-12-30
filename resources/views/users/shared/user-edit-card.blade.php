<div class="card">



    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="px-3 pt-4 pb-2">

            @foreach ($errors->all() as $error)
                <li class=" text-danger">{{ $error }}</li>
            @endforeach

            <div class="d-flex align-items-center justify-content-between">

                <div class="d-flex align-items-center">

                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImage() }}"
                        alt="Mario Avatar">
                    <br>

                    <input type="text" class=" form-control" name='name' value="{{ $user->name }}">
                    @error('user')
                        <p class="fs-6 fw-light d-block text-danger">
                            {{ $message }}
                        </p>
                    @enderror

                </div>
                <div><a href="{{ route('profile', $user->id) }}">view</a></div>


            </div>







            <div class="px-2 mt-4">

                <div class=" mb-3 ">


                    <div class=" mb-4">
                        <label for="image">profile image
                            <input type="file" class=' form-control' id="image" name="image">
                        </label>
                    </div>


                    <label for="bio">bio:

                        <textarea name="bio" id="bio" cols="60" rows="4">{{ $user->bio }}</textarea>

                    </label>

                    @error('bio')
                        <p class="fs-6 fw-light d-block text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
               

                <button type="submit" class=" btn btn-dark btn-sm mb-3">save</button>


    </form>

 @include('users.shared.user-status')



</div>
</div>
</div>
