<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Blog;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function admin()
    {
        $services = Service::with(['field'])->get();
        return view(
            'admin.servicesDashboard',
            ['services' => $services]
        );
    }
    public function adminBlog()
    {
        $blogs = Blog::all();
        return view(
            'admin.blogsDashboard',
            ['blogs' => $blogs]
        );
    }
    public function adminUser()
    {
        $users = User::with('services')->get();

        return view(
            'admin.usersDashboard',
            ['users' => $users]
        );
    }
    public function view($id)
    {
        $user = user::findOrFail($id);


        return view(
            'users.view',
            ['user' => $user]
        );
    }
}
