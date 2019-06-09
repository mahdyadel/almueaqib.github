<?php

namespace App\Http\Controllers\Dashboard;

use App\Cashier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CashierController extends Controller
{
    public function index(Request $request)
    {
        $cashiers = Cashier::where(function ($q) use ($request) {

            $q->where('name','LIKE', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.cashiers.index', compact('cashiers'));

    }//end of index

    public function create()
    {
        return view('dashboard.cashiers.create');

    }//end of create

    public function store(Request $request)
    {
        $rules = [

            'name' => 'required',


        ];
        $msg =  [

            'name.required' => 'اسم  مطلوبة',

        ];
        $this->validate($request , $rules , $msg);

        Cashier::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.cashiers.index');

    }//end of store

    public function edit($id)
    {
        $cashiers = Cashier::findOrFail($id);
        return view('dashboard.cashiers.edit', compact('cashiers'));

    }//end of edit

    public function update(Request $request,$id)
    {
        $rules = [

            'name' => 'required',


        ];
        $msg =  [

            'name.required' => 'اسم  مطلوبة',

        ];
        $this->validate($request , $rules , $msg);
        $cashiers = Cashier::findOrFail($id);
        $cashiers->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.cashiers.index');

    }//end of update

    public function destroy($id)
    {
        $cashiers = Cashier::findOrFail($id);
        $cashiers->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.cashiers.index');

    }//end of destroy


}
