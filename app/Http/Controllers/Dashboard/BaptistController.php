<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Baptist;
use App\Offec;

class BaptistController extends Controller
{ 
    public function index(Request $request){
        //return auth()->user()->roles()->first()->permissions;

        $baptists = Baptist::when($request->search, function($q) use ($request){

            return $q->where('num_saned', 'like', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.baptists.index', compact('baptists'));

 }//end of index


    public function create()
    {

        return view('dashboard.baptists.create');

    }//end of create

    public function store(Request $request)
     {
        $rules = [

            'num_saned' => 'required',
            'name1' => 'required',
            'name2' => 'required',
            'phone1' => 'required|numeric|digits_between:5,15',
            'mobile1' => 'required|numeric|digits_between:5,15',
            'account1' => 'required',
            'account2' => 'required',
            'bank1' => 'required',
            'bank2' => 'required',


        ];
         $msg = [
             'num_saned.required' => 'رقم السند مطلوب',
             'name1.required' => ' اسم المعمد مطلوب',
             'name2.required' => 'اسم المنفذ مطلوب',
             'phone1.required' => 'رقم جوال المعمد مطلوب',
             'phone2.required' => 'رقم جوال المنفذ مطلوب',
             'mobile1.required' => 'رقم تليفون المعمد مطلوب',
             'mobile2.required' => 'رقم تليفون المنفذ مطلوب',
             'account1.required' => 'رقم حساب المعمد مطلوب',
             'account2.required' => 'رقم حساب المنفذ مطلوب',
             'bank1.required' => ' اسم بنك المعمد مطلوب',
             'bank2.required' => ' اسم بنك المنفذ مطلوب',
         ];
         $request->validate($rules,$msg);
         Baptist::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.baptists.index');

    }//end of store

    public function edit($id )
    
    {
        // $categories = Category::all();
       
        $baptists = Baptist::findOrFail($id);

        return view('dashboard.baptists.edit', compact('baptists'));

    }//end of edit

    public function update(Request $request, Baptist $baptists)
     {
        $rules = [
            
            'name1' => 'required',
            'name2' => 'required',
            'phone1' => 'required|numeric|digits_between:5,15',
            'mobile1' => 'required|numeric|digits_between:5,15',
            'account1' => 'required',
            'account2' => 'required',
            'bank1' => 'required',
            'bank2' => 'required',
        ];

        $msg = [
            'name1.required' => 'الإسم مطلوب',
            'name2.required' => 'الإسم مطلوب',
            'phone1.required' => 'رقم الجوال مطلوب',
            'phone2.required' => 'رقم الجوال مطلوب',
            'mobile1.required' => 'رقم الهاتف مطلوب',
            'mobile2.required' => 'رقم الهاتف مطلوب',
            'account1.required' => 'رقم الحساب مطلوب',
            'account2.required' => 'رقم الحساب مطلوب',
            'bank1.required' => ' اسم البنك مطلوب',
            'bank2.required' => ' اسم البنك مطلوب',
        ];
        $request->validate($rules,$msg);

        $baptists->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.baptists.index');

    
}//end of update

    public function destroy($id)
    {
        $baptists = Baptist::findOrFail($id);
        $baptists->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.baptists.index');

    }//end of destroy

}
