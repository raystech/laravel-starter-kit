<?php

namespace Raystech\StarterKit\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Raystech\StarterKit\Traits\Crudable;
use Raystech\StarterKit\Models\Post;
use Raystech\StarterKit\Models\Term;
use Raystech\StarterKit\Models\TermTaxonomy;

class PostController extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  use Crudable;
  const ADD_MESSAGE = 'Added Successfully!';
  const DELETE_MESSAGE = 'Deleted Successfully!';
  const UPDATE_MESSAGE = 'Updated Successfully!';

  public function __construct() {
    // return '__construct';
  }

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

  public function store(Request $request)
  {
    $request->validate([
      'post_title'   => 'required',
      'post_content' => 'required',
      'submit'       => 'required'
    ]);
    $current_time = Carbon::now();
    $post = Post::create([
      'post_author'           => Auth::user()->id,
      'post_content'          => $request->get('post_content'),
      'post_title'            => $request->get('post_title'),
      'post_excerpt'          => '',
      'post_status'           => $request->get('submit'),
      'post_password'         => '',
      'to_ping'               => '',
      'pinged'                => '',
      'post_content_filtered' => '',
      'guid'                  => '',
      'post_mime_type'        => '',
      // 'post_name'             => $request->get('slug')
    ]);
    $guid = option('site_url') . "/post/{$post->id}";
    $post->guid = $guid;
    $post->save();

    return redirect()->route('posts.edit', $post->id);
  }

  public function show(Post $post)
  {
    // $post = Post::findOrFail($id);
    return view('rt-starter-kit::posts.show', compact(['post']));
  }

  public function edit($id)
  {
    $post = Post::find($id);
    $taxonomies = TermTaxonomy::where('taxonomy', 'like', 'property_%')->where('parent', 0)->get();
    return view('rt-starter-kit::posts.edit', compact(['post', 'taxonomies']));
  }
}
