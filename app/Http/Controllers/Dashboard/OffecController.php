<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Offec;
use App\Category;

class OffecController extends Controller
{ 
    public function index(Request $request){
        //return auth()->user()->roles()->first()->permissions;
        
        $offec = Offec::when($request->search, function($q) use ($request){

            return $q->where('name1', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.offecs.index', compact('offec'));

 }//end of index

    public function create()
    {
        $categories = Category::all();
       
        return view('dashboard.offecs.create', compact('categories'));
        return view('dashboard.offecs.create');

    }//end of create

    public function store(Request $request)
     {
        $rules = [

            'name' => 'required',
            'city' => 'required',
            'phone1' => 'required',
            'mobile1' => 'required',
            'category_id' => 'required',
            'branch' => 'required',

        ];
        $msg =  [
           
            'name.required' => 'اسم الداره',
            'city.required' => 'المدينه ',
            'phone1.required' => 'الجوال1 ',
            'mobile1.required' => ' الجوال2',
            'category_id.required' => ' الادارات',
            'branch.required' => ' فئه المعقب',
            
        ];
        $this->validate($request , $rules , $msg);

        Offec::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.offecs.index');

    }//end of store

    public function edit($id )
    
    {
        $categories = Category::all();
       
        $offec = Offec::findOrFail($id);

        return view('dashboard.offecs.edit', compact('offec','categories'));

    }//end of edit

    public function update(Request $request, Offec $offec)
     {
        $rules = [
            'name' => 'required',
            'city' => 'required',
            'phone1' => 'required',
            'mobile1' => 'required',
            'category_id' => 'required',
            'branch' => 'required',

        ];
        $request->validate($rules);

        $offec->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.offecs.index');

    
}//end of update

    public function destroy(Offec $offec)
    {
        $offec->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.offecs.index');

    }//end of destroy

}
