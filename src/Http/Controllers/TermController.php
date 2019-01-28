<?php

namespace Raystech\StarterKit\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Raystech\StarterKit\Models\Term;
use Raystech\StarterKit\Models\TermTaxonomy;

class TermController extends BaseController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */


  public function index(Request $request)
  {
    $parent = $request->get('term_id') ?? 0;
    if($request->has('taxonomy')) {
      $taxonomy = $request->taxonomy;
    } else {
      $taxonomy = 'rt_data_structure';
    }
    $term_taxonomy = TermTaxonomy::where('taxonomy', $taxonomy)->where('parent', $parent)->get();
    $term = Term::find($parent);
      // $terms = Term::where('')->get();
    return view('rt-starter-kit::terms.index', compact([
      'taxonomy', 'term_taxonomy', 'term'
    ]));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // dd($request->all());
    $request->validate([
      'name'     => 'required',
      'taxonomy' => 'required',
    ]);

    $term = Term::create([
      'name' => $request->get('name')
    ]);

    $term_taxonomy = TermTaxonomy::create([
      'term_id'     => $term->id,
      'taxonomy'    => $request->taxonomy,
      'description' => $request->description,
      'parent'      => $request->get('term_id') ?? 0,
      'count'       => 0
    ]);
    return redirect()->back();

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
}
