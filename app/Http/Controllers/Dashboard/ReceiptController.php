<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Receipt;
use App\Product;
use App\Client;


class ReceiptController extends Controller
{
    public function index(Request $request)
    {
        $receipts = Receipt::all();

        return view('dashboard.receipts.index', compact('receipts'));

    }

    public function show($id)
    {
        $receipts = Receipt::findOrFail($id);
        return view('dashboard.receipts.view', compact('receipts'));

    }

//end of index

    public function create(Request $request)
    {
        $receipts = Receipt::all();
        $clients = Client::all();

        return view('dashboard.receipts.create', compact('receipts','clients'));
    }
// //end of create
// //
    public function store(Request $request)
    {
        $rules = [
            'Payment_method' => 'required',
            'salary' => 'required',
            'bank_name' => 'required',
            'client_id' => 'required',
            'num_saned' => 'required',
        ];
        $msg =[
            'Payment_method.required'=> 'طريقه الدفع',
            'salary.required'=> ' قيمة المعامله',
            'bank_name.required'=> ' اسم البنك',
            'client_id.required'=> 'اسم المستفيد',
            'num_saned.required'=> 'رقم السند',
        ];


        $this->validate($request,$rules ,$msg);


        Receipt::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.receipts.index');

    }

// //end of store

    public function edit($id)
    {
        $clients = Client::all();
        $receipts = Receipt::FindOrFail($id);
        return view('dashboard.receipts.edit', compact('receipts','clients'));

    }//end of edit

    public function update(Request $request,$id)
    {
        $rules = [
            'Payment_method' => 'required',
            'salary' => 'required',
            'bank_name' => 'required',
            'client_id' => 'required',
            'num_saned' => 'required',
        ];

        $msg =[
            'Payment_method.required'=> 'طريقه الدفع',
            'salary.required'=> ' قيمة المعامله',
            'bank_name.required'=> ' اسم البنك',
            'client_id.required'=> 'اسم المستفيد',
            'num_saned.required'=> 'رقم السند',
        ];


        $this->validate($request,$rules ,$msg);

        $request_data = Receipt::findOrFail($id)->update($request->all());


        $request->$request_data;
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.receipts.index');

    }//end of update


    //
    public function destroy($id)
    {
        $receipts = Receipt::find($id);
        $receipts->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.receipts.index');

    }//end of destroy

}
