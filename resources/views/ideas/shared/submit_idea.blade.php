@auth
    


<div class="row">
    <form action="{{ route('idea.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea class="form-control" id="idea" rows="3" name='content'></textarea>
            @error('idea')
            <span class=" fs-5 d-block text-danger">{{ $message }}</span>
                
            @enderror
        </div>
        <div class="">
            <button class="btn btn-dark"> Share </button>
    </form>
</div>
</div>
<hr>
@endauth
@guest
    
        @if (request()->session()->get('locale')=='zh_CN')
        <h2>@lang('zh_idea.login_to_share')</h2>
            @else
            <h2>@lang('en_idea.login_to_share')</h2>
        @endif 
@endguest