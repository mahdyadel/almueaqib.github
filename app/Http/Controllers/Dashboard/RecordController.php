<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Record;
use App\Client;


class RecordController extends Controller
{ 
    public function index(Request $request){
        $records = Record::when($request->search, function($q) use ($request){

            return $q->where('name', 'like', '%' . $request->search . '%');
            
        })->latest()->paginate(5);

        return view('dashboard.records.index', compact('records'));

 }//end of index
    
    public function create()
    {
       
        // $clients = Client::all();
        return view('dashboard.records.create');

    }//end of createpublic


    public function store(Request $request)
     {
        $rules = [

            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'web' => 'required',

        ];
        $msg =  [
            'name.required' => 'اسم السجل',
            'email.required' => 'البريد الالكترونى',
            'phone.required' => 'الجوال',
            'web.required' => 'الموقع',
        ];
        $this->validate($request , $rules , $msg);

        Record::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.records.index');

    }//end of store

    public function edit($id )
    
    {       
        $records = Record::findOrFail($id);

        return view('dashboard.records.edit', compact('records'));

    }//end of edit

    public function update(Request $request,$id)
     {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'web' => 'required',

        ];
        $msg =  [
            'name.required' => 'اسم السجل',
            'email.required' => 'البريد الالكترونى',
            'phone.required' => 'الجوال',
            'web.required' => 'الموقع',
        ];
        $this->validate($request , $rules , $msg);

        $records = Record::findOrFail($id);
        $records->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.records.index');

    
}//end of update

    public function destroy($id )
    {
        $records = Record::find($id);
        $records->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.records.index');

    }//end of destroy


}
