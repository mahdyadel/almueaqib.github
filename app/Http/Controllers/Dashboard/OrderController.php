<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Client;


class OrderController extends Controller
{ 
    public function index(Request $request){
        //return auth()->user()->roles()->first()->permissions;
//        $clients = Client::all();
//        $orders = Order::when($request->search, function($q) use ($request){
//
//            return $q->where('name', 'like', '%' . $request->search . '%')
//            ->orWhere('number', 'like', '%' . $request->search . '%');
//        })->when($request->client_id, function ($q) use ($request) {
//
//            return $q->where('client_id', $request->client_id);
//
//        })->latest()->paginate(10);

        $orders = Order::where(function ($q) use ($request) {

            $q->where('number','LIKE', '%' . $request->search . '%');

        })->when($request->client_id, function ($q) use ($request) {

            return $q->where('client_id', $request->client_id);

        })->latest()->paginate(5);

        return view('dashboard.orders.index', compact('orders'));

 }//end of index

    
    public function create()
    {
       
        $clients = Client::all();
        return view('dashboard.orders.create', compact('clients'));

    }//end of createpublic

    public function status($id)
    {
        $orders = Order::findOrFail($id);
        $orders->status = 'yes';
        $orders->save();
        return back();
    }




    public function store(Request $request)
     {
        $rules = [

            'client_id' => 'required',
            'type' => 'required',
            'number' => 'required',
            'fees' => 'required',
            'fee' => 'required',

        ];
        $msg =[
            'client_id.required' => 'الاسم',
            'type.required' => 'نوع الخدمه',
            'number.required' => 'رقم الهويه',
            'fees.required' => 'الرسوم',
            'fee.required' => 'الاتعاب',

        ];
        $this->validate($request , $rules , $msg);

        $request->validate($rules);

        Order::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.orders.index');

    }//end of store

    public function edit($id )
    
    {       
        $orders = Order::findOrFail($id);
        $clients = Client::all();

        return view('dashboard.orders.edit', compact('orders','clients'));

    }//end of edit

    public function update(Request $request,$id)
     {
        $rules = [
            'client_id' => 'required',
            'type' => 'required',
            'number' => 'required',
            'fees' => 'required',
            'fee' => 'required',

        ];
        $request->validate($rules);
        $orders = Order::findOrFail($id);
        $orders->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.orders.index');

    
}//end of update

    public function destroy($id )
    {
        $orders = Order::find($id);
        $orders->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.orders.index');

    }//end of destroy


}
