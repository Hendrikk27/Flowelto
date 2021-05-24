<?php

namespace App\Http\Controllers;

use App\Category;
use App\Flower;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //menampilkan flower berdasarkan category
    public function index(Request $request, $id){
        $c = Category::find($id);

        $flowers = Flower::where('category_id', $c->id);

        if($request->search_by != null){
            if($request->search_by == 'name') {
                $flowers = $flowers->where('name', 'like', '%'.$request->search.'%');
            } else {
                $flowers = $flowers->where('price', $request->search);
            }
        }
        
        $flowers = $flowers->paginate(8);
        return view('view-product', compact('c', 'flowers'));
    }

    //untuk view manage category
    public function manageCategory()
    {
        $categoryArr = Category::all();
        return view('manage-category', compact('categoryArr', $categoryArr));
    }

    //menghapus category
    public function delete($id)
    {
        Category::where('id', $id)->delete();
        return back();
    }

    //tampilan update category
    public function updateView($id)
    {
        $c = Category::find($id);
        return view('update-category', compact('c'));
    }

    //mengupdate category
    public function update(Request $request, $id)
    {
        $c = Category::find($id);

        $request->validate([
            'name' => 'required|unique:categories,name,' . $c->id . '|min:5'
        ]);

        $c->name = $request->name;

        if ($request->image != null) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('storage/', $image);

            $c->image = $image;
        }

        $c->save();

        return redirect('/');
    }
}
