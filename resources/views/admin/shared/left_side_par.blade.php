<div class="row">
    <div class="col-9">
        <div class="card overflow-hidden">
            <div class="card-body pt-3">
                <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                    <li class="nav-item">
                        <a class="{{ Route::is('admin.dashboard') ? 'text-white bg-primary rounded' : '' }} nav-link text-dark"
                            href="{{ route('admin.dashboard') }}">
                            <span>ADMIN DASHBOARD</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ Route::is('admin.users.index') ? 'text-white bg-primary rounded' : '' }} nav-link text-dark"
                            href="{{ route('admin.users.index') }}">
                            <span> users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ Route::is('admin.ideas.index') ? 'text-white bg-primary rounded' : '' }} nav-link text-dark"
                            href="{{ route('admin.ideas.index') }}">
                            <span> IDEAS</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ Route::is('admin.comments.index') ? 'text-white bg-primary rounded' : '' }} nav-link text-dark"
                            href="{{ route('admin.comments.index') }}">
                            <span> comments</span>
                        </a>
                    </li>
        
                </ul>
            </div>
            <div class="card-footer text-center py-2">
                <a class="btn btn-link btn-sm" href="{{ route('lang', 'en') }}">
                    <h4>en</h4>
                </a>
                <a class="btn btn-link btn-sm" href="{{ route('lang', 'zh_CN') }}">
                    <h4>zh</h4>
                </a>
            </div>
        </div>
    </div>
</div>