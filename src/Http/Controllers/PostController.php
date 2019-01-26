<?php

namespace Raystech\StarterKit\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Raystech\StarterKit\Traits\Crudable;
use Raystech\StarterKit\Models\Post;

class PostController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  use Crudable;
  const ADD_MESSAGE = 'Added Successfully!';
  const DELETE_MESSAGE = 'Deleted Successfully!';
  const UPDATE_MESSAGE = 'Updated Successfully!';

  public function index() {
    // return self::ADD_MESSAGE;
    $posts = Post::orderBy('created_at')->get();
    return view('rt-starter-kit::posts.index', compact('posts'));
  }

  public function create(Request $request) {
    $posts = Post::orderBy('created_at')->get();

    flashtoast()->success('Create Post');
    return view('rt-starter-kit::posts.create', compact('posts'));
  }

  public function store(Request $request) {
    dd($request->all());

  }
}
