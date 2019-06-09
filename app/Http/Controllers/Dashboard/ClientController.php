<?php

namespace App\Http\Controllers\Dashboard;

use App\Client;
use App\City;
use App\Order;
use App\Worker;
use DemeterChain\C;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::when($request->search, function($q) use ($request){

            return $q->where('id_number', 'like', '%' . $request->search . '%');
            
        })->latest()->paginate(5);
        //$workers = Worker::all();

        return view('dashboard.clients.index', compact('clients'));

 }//end of index
    public function show($id)
    {
        $client = Client::findOrFail($id);
        // return $users;
        return view('dashboard.clients.view', compact('client'));
    }

    public function create()
    {
        return view('dashboard.clients.create');

    }//end of create

    public function store(Request $request)
    {
      
            $rules = [

                'name' => 'required',
                'phone' => 'required|array|min:1',
                'ardy' => 'required|array|min:1',
                'address' => 'required',
                'id_number' => 'required|numeric|digits_between:5,15',

            ];
            $msg =  [

                'name.required' => 'اسم العميل',
                'phone.required' => 'رقم الجوال',
                'ardy.required' => 'التليفون الارضي',
                'address.required' => 'العنوان',
                'id_number.required' => 'رقم الهوية',
            ];

        $request->validate($rules,$msg);

        $request_data = $request->all();
        $request_data['phone'] = array_filter($request->phone);
        Client::create($request_data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.clients.index');

    }//end of store

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('dashboard.clients.edit', compact('client'));

    }//end of edit

    public function update(Request $request,$id )
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|array|min:1',
            'ardy' => 'required',
            'phone.0' => 'required',
            'address' => 'required',
        ]);

        $request_data = $request->all();
        $request_data['phone'] = array_filter($request->phone);
        $client = Client::findOrFail($id);
        $client->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.clients.index');

    }//end of update

    public function destroy(Client $client)
    {
        $client->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.clients.index');

    }//end of destroy

}//end of controller
