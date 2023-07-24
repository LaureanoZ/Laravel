<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', 
        ['blogs' => $blogs]);
    }
    public function view($id)
    {
        $blogs = Blog::findOrFail($id);


        return view(
            'blogs.view',
            ['blogs' => $blogs]
        );
    }
    public function formNew()
    {
        return view('blogs.new');
    }
    public function processNew(Request $request)
    {
        $data = $request->except(['_token']);

        $request->validate(Blog::validationRules(), Blog::validationMessages());


        if($request->hasFile('profile_image')) {
            $data['profile_image'] = $this->uploadImage($request);
        }

        Blog::create($data);
        return redirect()
        ->route('blogs.index')
        ->with('feedback.message', 'El blog <b>' . e($data['title']) . '</b> se publico correctamente');
    }

    public function formUpdate($id)
    {
        return view('blogs.formUpdate', [
            'blog' => Blog::findOrFail($id)
        ]);
    }

    
    public function processUpdate($id, Request $request)
    {
        $blog = Blog::findOrFail($id);

        $request->validate(Blog::validationRules(), Blog::validationMessages());

        $data = $request->except(['_token']);
        $oldImage = null;

        if($request->hasFile('profile_image')) {
            $data['profile_image'] = $this->uploadImage($request);
            $oldImage = $blog->profile_image;
        }

        $blog->update($data);

        $this->deleteImage($oldImage);

        return redirect()
            ->route('admin.blogsDashboard')
            ->with('feedback.message', 'La publicación <b>' . e($blog->title) . '</b> se editó con éxito.');
    }


    public function confirmDelete($id)
    {
        return view('blogs.confirmDelete',[
            'blog' => Blog::findOrFail($id),
        ]);
    }
    public function processDelete($id)
    {
        $blog = Blog::findOrFail($id);

        $blog->delete();

        return redirect()
            ->route('admin.blogsDashboard')
            ->with('feedback.message', 'La publicación <b>' . e($blog->title) . '</b> se eliminó con éxito.');
    }


    protected function uploadImage(Request $request): string
    {
        $image = $request->file('profile_image');
        $imageName = date('YmdHis_') . Str::slug($request->input('title')) . "." . $image->guessExtension();

        $image->storeAs('imgs', $imageName);

        return $imageName;
    }

    protected function deleteImage(?string $file): void
    {
        if($file !== null && Storage::has('imgs/' . $file)) {
            Storage::delete('imgs/' . $file);
        }
    }



}
