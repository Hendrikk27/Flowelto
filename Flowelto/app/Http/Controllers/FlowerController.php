<?php

namespace App\Http\Controllers;

use App\Category;
use App\Flower;
use Illuminate\Http\Request;

class FlowerController extends Controller
{
    //menghapus flower berdasarkan id
    public function delete($id)
    {
        Flower::where('id', $id)->delete();
        return back();
    }

    public function updateView($id)
    {
        $f = Flower::find($id);
        $categoryArr = Category::all();
        return view('update-flower', compact('f', 'categoryArr'));
    }

    public function addView()
    {
        $categoryArr = Category::all();
        return view('add-flower', compact('categoryArr'));
    }

    //menampilkan flower berdasarkan id
    public function index(Request $request, $id)
    {
        $f = Flower::find($id);
        return view('detail-flower', compact('f'));
    }

    public function update(Request $request, $id)
    {
        $f = Flower::find($id);

        $request->validate([
            'category_id' => 'required',
            'name' => 'required|unique:flowers,name,'.$f->id.'|min:5',
            'price' => 'required|integer|gte:50000',
            'description' => 'required|min:20'
        ]);

        $f->name = $request->name;
        $f->price = $request->price;
        $f->description = $request->description;
        $f->category_id = $request->category_id;

        if ($request->image != null) {
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('storage/', $image);

            $f->image = $image;
        }

        $f->save();

        return back();
    }

    public function add(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|unique:flowers,name|min:5',
            'price' => 'required|integer|gte:50000',
            'description' => 'required|min:20',
            'image' => 'required'
            ]);
            
        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->move('storage/', $image);

        $f = new Flower();
        $f->name = $request->name;
        $f->price = $request->price;
        $f->description = $request->description;
        $f->image = $image;
        $f->category_id = $request->category_id;
        $f->save();

        return redirect('flower/'.$f->id);
    }
}
