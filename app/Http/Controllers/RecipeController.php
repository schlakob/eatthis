<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Routing\Route;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::where('private', '<>', '1')->orderBy('updated_at', 'desc')->paginate(20);
        return view('recipes/index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|min:3|max:255',
            'description' => 'required',
            'ingredients' => 'required'
        ]);

        $recipe = new Recipe;
        $recipe->title = $request->input('title');
        $recipe->description = $request->input('description');
        $recipe->ingredients = $request->input('ingredients');
        $recipe->user_id = auth()->user()->id;
        $recipe->private = $request->has('private');
        $recipe->save();

        return redirect('/dashboard')->with('success', 'Added a new Recipe');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);
        if ($recipe->private == 1  && auth()->user()->id !== $recipe->user_id) {
            return redirect('/recipes')->with('error', 'That is not your Recipe');
        }
        return view('recipes/show', compact('recipe'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::find($id);

        if (auth()->user()->id !== $recipe->user_id) {
            return redirect('/recipes')->with('error', 'That is not your Recipe');
        }

        return view('recipes/edit', compact('recipe'));
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
        $this->validate($request, [
            'title' => 'required|string|min:3|max:255',
            'description' => 'required',
            'ingredients' => 'required'
        ]);

        $recipe = Recipe::find($id);
        $recipe->title = $request->input('title');
        $recipe->description = $request->input('description');
        $recipe->ingredients = $request->input('ingredients');
        $recipe->user_id = auth()->user()->id;
        $recipe->private = $request->has('private');
        $recipe->save();

        $redirectPage = '/recipes'.'/'.$id;
        return redirect($redirectPage)->with('success', 'Edited the Recipe');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        if (auth()->user()->id !== $recipe->user_id) {
            return redirect('/recipes')->with('error', 'That is not your Recipe');
        }

        $recipe->delete();
        if (str_replace(url('/'), '', url()->previous()) == '/dashboard') {
            return redirect('/dashboard')->with('success', 'Deleted the Recipe');
        }
        return redirect('/recipes')->with('success', 'Deleted the Recipe');
    }

    /**
     * Copy the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function copy($id)
    {
        $recipe = Recipe::find($id);
        return view('recipes/copy', compact('recipe'));
    }

    public function delete($id){
        $recipe = Recipe::find($id);
        if (auth()->user()->id !== $recipe->user_id) {
            return redirect('/recipes')->with('error', 'That is not your Recipe');
        }
        $recipe->delete();
    }
}
