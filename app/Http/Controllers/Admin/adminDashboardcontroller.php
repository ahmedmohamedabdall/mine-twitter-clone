<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class adminDashboardcontroller extends Controller
{
    public function index (){
$this->authorize('admin');
$count=DB::select("
select
(select count(*) from ideas) as ideas,
(select count(*) from users) as users,
(select count(*) from comments) as comments,
(select count(*) from idea_likes) as likes
");
$count=$count[0];
        return view('admin.dashboard',compact('count'));
    }
}
