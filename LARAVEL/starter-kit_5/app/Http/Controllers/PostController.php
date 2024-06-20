<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
  public function index()
  {
    try {
      if (request()->ajax()) {
        $posts = Post::with('category');

        return DataTables::of($posts)
          ->addIndexColumn()
          ->editColumn('category.name', function ($post) {
            return $post->category ? $post->category->name : null;
          })
          ->editColumn('created_at', function ($post) {
            return $post->created_at->diffForHumans();
          })
          ->editColumn('description', function ($post) {
            return substr($post->description, 0, 20);
          })
          ->editColumn('moral', function ($post) {
            return substr($post->moral, 0, 20);
          })
          ->editColumn('action', function ($post) {
            return view('datatables.views.posts.action', ['post' => $post]);
          })
          ->filterColumn('title', function($query, $value) {
              $query->whereRaw("title like ?", ["%{$value}%"]);
          })
          ->make();
      }
      return view('admin.posts.index');
    } catch (Exception $e) {
      toastr('Something went wrong', 'error');
      return redirect()->route('admin.dashboard');
    }
  }
  public function create()
  {
    try {
      $categories = Category::all();
      return view('admin.posts.create', compact('categories'));
    } catch (Exception $e) {
      toastr('Something went wrong. Please try again', 'error');
      return redirect()->route('admin.dashboard');
    }
  }
  public function store(PostStoreRequest $request)
  {
    try {
      DB::transaction(function () use ($request) {
        $post = Post::create([
          'title' => $request->title,
          'user_id' => Auth::id(),
          'category_id' => $request->category_id,
          'description' => $request->description,
          'moral' => $request->moral,
        ]);

        if ($files = $request->file('file')) {
          $images = [];
          $i = 0;
          foreach ($files as $file) {
            $images[$i++] = ['path' => $file->store('uploads/images', 'public')];
          }
          $post->images()->createMany($images);
        }
      });
      toastr('Post created successfully');
      return redirect()->route('posts.index');
    } catch (Exception $e) {
      toastr('Something went wrong, please try again', 'error');
      return redirect()->route('admin.dashboard');
    }
  }
  public function show($id)
  {
    try {
      $post = Post::with('images', 'category')->find($id);
      return view('admin.posts.show', compact('post'));
    } catch (Exception $e) {
      toastr('Something went wrong, please try again', 'error');
      return redirect()->route('admin.dashboard');
    }
  }
  public function edit($id)
  {
    try {
      $categories = Category::all();
      $post = Post::with('images', 'category')->find($id);
      return view('admin.posts.edit', compact('post', 'categories'));
    } catch (Exception $e) {
      toastr('Something went wrong, please try again', 'error');
      return redirect()->route('admin.dashboard');
    }
  }

  public function update(PostUpdateRequest $request, $id)
  {
    try {
      $post = Post::findOrFail($id);
      $post->title = $request->title;
      $post->category_id = $request->category_id;
      $post->description = $request->description;
      $post->moral = $request->moral;

      DB::transaction(function () use ($request, $post) {
        if ($post->isDirty()) {
          $post->save();
        }

        if ($files = $request->file('file')) {
          $images = [];
          $i = 0;
          foreach ($files as $file) {
            $images[$i++] = ['path' => $file->store('uploads/images', 'public')];
          }
          $post->images()->createMany($images);
        }
      });
      toastr('Post Updated successfully');
      return redirect()->back();
    } catch (Exception $e) {
      toastr('Something went wrong, please try again', 'error');
      return redirect()->route('admin.dashboard');
    }
  }
  public function destroy($id)
  {
    try {
      Post::findorFail($id)->delete();
      toastr('Post deleted successfully', 'success');
      return redirect()->back();
    } catch (Exception $e) {
      toastr('Something went wrong. Please try again', 'error');
      return redirect()->route('admin.dashboard');
    }
  }
}
