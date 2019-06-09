<?php

namespace App\Http\Controllers\Dashboard;

use App\Worker;
use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkerController extends Controller
{

    public function index(Request $request)
    {
        $workers = Worker::when($request->search, function($q) use ($request){

            return $q->where('id_number', 'like', '%' . $request->search . '%');

        })->when($request->client_id, function ($q) use ($request) {

            return $q->where('client_id', $request->client_id);

        })->latest()->paginate(5);
        return view('dashboard.workers.index', compact('workers'));

    }//end of index
    public function show($id)
    {
        $workers = Worker::findOrFail($id);
        // return $users;
        return view('dashboard.workers.view', compact('workers'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('dashboard.workers.create',compact('clients'));

    }//end of create

    public function store(Request $request)
    {

        $rules = [

            'name' => 'required',
            'client_id' => 'required',
            'phone' => 'required|array|min:1',
            'ardy' => 'required|array|min:1',
            'address' => 'required',
            'post_code' => 'required',
            'id_number' => 'required|numeric|digits_between:5,15',

        ];
        $msg =  [

            'name.required' => 'اسم العامل',
            'client_id.required' => 'اسم الكفيل',
            'phone.required' => 'رقم الجوال',
            'ardy.required' => 'التليفون الارضي',
            'address.required' => 'العنوان',
            'id_number.required' => 'رقم الهوية',
            'post_code.required' => 'الرقم البريدي',
        ];

        $request->validate($rules,$msg);

        $request_data = $request->all();
        $request_data['phone'] = array_filter($request->phone);
        Worker::create($request_data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.workers.index');

    }//end of store

    public function edit($id)
    {
        $workers = Worker::findOrFail($id);
        $clients = Client::all();
        return view('dashboard.workers.edit', compact('workers','clients'));

    }//end of edit

    public function update(Request $request, $id )
    {
        $rules=[
            'name' => 'required',
            'client_id' => 'required',
            'phone' => 'required|array|min:1',
            'ardy' => 'required',
            'ardy.0' => 'required',
            'phone.0' => 'required',
            'address' => 'required',
            'client_id' => 'required',
        ];

        $request->validate($rules);
        $request_data = $request->all();
        $request_data['phone'] = array_filter($request->phone);
        $workers = Worker::findOrFail($id);
        $workers->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.workers.index');

    }//end of update

    public function destroy($id)
    {
        $workers = Worker::findOrFail($id);
        $workers->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.workers.index');

    }//end of destroy

}
