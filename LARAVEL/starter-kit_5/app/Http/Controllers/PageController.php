<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageCreateRequest;
use App\Http\Requests\PageUpdateRequest;
use App\Models\Page;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PageController extends Controller
{
  public function index()
  {
    try {
      if (request()->ajax()) {
        $pages = Page::with(['images'])->whereHas('post');
        return DataTables::of($pages)
          ->addIndexColumn()
          ->editColumn('images.path', function ($page) {
            return view('datatables.views.image', ['image' => $page->images->first()->path]);
          })
          ->editColumn('description', function ($page) {
            return substr($page->description, 0, 20);
          })
          ->editColumn('moral', function ($page) {
            return substr($page->moral, 0, 20);
          })
          ->editColumn('action', function ($page) {
            return view('datatables.views.pages.action', ['page' => $page]);
          })
          ->editColumn('created_at', function ($page) {
            return $page->created_at->diffForHumans();
          })
          ->make();
      }
      return view('admin.pages.index');
    } catch (Exception $e) {
      toastr('Something went wrong, please try again', 'error');
      return redirect()->route('admin.dashboard');
    }
  }
  public function create($post_id )
  {
    try {
      $post = Post::findOrFail($post_id);
      return view('admin.pages.create', compact('post'));
    } catch (Exception $e) {
      toastr('Something went wrong, please try again', 'error');
      return redirect()->route('admin.dashboard');
    }
  }
  public function store(PageCreateRequest $request)
  {
    try {
      $post = Post::withTrashed()->findOrFail($request->post_id);
      DB::transaction(function () use ($request, $post) {
        $page = $post->pages()->create([
          'title' => $request->title,
          'description' => $request->description,
          'moral' => $request->moral,
        ]);

        if ($files = $request->file('file')) {
          $images = [];
          $i = 0;
          foreach ($files as $file) {
            $images[$i++] = ['path' => $file->store('uploads/images', 'public')];
          }
          $page->images()->createMany($images);
        }
      });
      toastr('Page created successfully');
      return redirect()->route('posts.pages', compact('post'));
    } catch (Exception $e) {
      toastr('Something went wrong, please try again', 'error');
      return redirect()->route('admin.dashboard');
    }
  }
  public function show($id){
    try{
        $page = Page::with(['images'])->findOrFail($id);
        return view('admin.pages.show', compact('page'));
    }
    catch(Exception $e){
        toastr('Something went wrong, please try again', 'error');
        return redirect()->route('admin.dashboard');
    }
  }
  public function edit($id){
    try{
      $page = Page::with(['images'])->findOrFail($id);
      return view('admin.pages.edit', compact('page'));
    }
    catch(Exception $e){
      toastr('Something went wrong, please try again', 'error');
      return redirect()->route('admin.dashboard');
    }
  }
  public function update($id , PageUpdateRequest $request){
    try{
      $page = Page::findOrFail($id);
      DB::transaction(function () use ($request, $page) {
        $page->update([
          'title' => $request->title,
          'description' => $request->description,
          'moral' => $request->moral,
        ]);

        if ($files = $request->file('file')) {
          $images = [];
          $i = 0;
          foreach ($files as $file) {
            $images[$i++] = ['path' => $file->store('uploads/images', 'public')];
          }
          $page->images()->createMany($images);
        }
      });
      toastr('Page updated successfully');
      return redirect()->back();
    }
    catch(Exception $e){
      toastr('Something went wrong, please try again', 'error');
      return redirect()->route('admin.dashboard');
    }
  }
  
  public function destroy($id){
    try{
        $page = Page::destroy($id);
        toastr('Page deleted successfully');
        return redirect()->back();
    }
    catch(Exception $e){
        toastr('Something went wrong, please try again', 'error');
        return redirect()->route('admin.dashboard');
    }
  }
}
