<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Mang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class MangController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $mangs = Mang::when($request->search, function($q) use ($request){

            return $q->where('name', 'like', '%' . $request->search . '%');

        })->when($request->category_id, function ($q) use ($request) {

            return $q->where('category_id', $request->category_id);

        })->latest()->paginate(5);
        
        return view('dashboard.mangs.index', compact('mangs' , 'categories'));

    }//end of index

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.mangs.create', compact('categories'));

    }//end of create

    public function store(Request $request)
    {
        $rules = [

            'name' => 'required',
            'category_id' => 'required',
            'fees' => 'required',
            'fee' => 'required',
            

        ];
        $msg =  [
           
            'name.required' => 'اسم الداره',
            'category_id.required' => 'الادارات ',
            'fees.required' => 'الرسوم ',
            'fee.required' => ' الاتعاب',
            
        ];
        $this->validate($request , $rules , $msg);

        $request_data = $request->all();


        Mang::create($request_data);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.mangs.index');

    }//end of store

    public function edit($id)
    
    {    $mangs = Mang::findOrFail($id);
        $categories = Category::all();
        return view('dashboard.mangs.edit', compact('categories', 'mangs'));
    }//end of edit

    public function update(Request $request, $id)
     {
        $rules = [
            'category_id' => 'required',
            'name' => 'required',
            'fees' => 'required',
            'fee' => 'required',

        ];
        $request->validate($rules);

        $request_data = Mang::findOrFail($id)->update($request->all());
        $request->$request_data;
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.mangs.index');

    
}//end of update

    public function destroy($id )
    {
        $mangs = Mang::find($id);
        $mangs->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.mangs.index');

    }//end of destroy


}//end of controller
