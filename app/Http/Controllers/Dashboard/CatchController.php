<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Catchs;
use App\Product;
use App\Client;

class CatchController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::all();
        $catch = Catchs::all();
        //dd($clients);
        return view('dashboard.catchs.index', compact('catch', 'clients'));

    }
    public function show($id)
    {
        $catch = Catchs::findOrFail($id);

        return view('dashboard.catchs.view', compact('catch'));

    }
//end of index

    public function create()
    {
        $products = Product::all();
        $clients = Client::all();

        return view('dashboard.catchs.create',compact('products','clients'));

    }
//end of create
//
    public function store(Request $request)
    {

        $rules = [
            'Payment_method' => 'required',
            'client_id' => 'required',
            'salary' => 'required',
            'ratio' => 'required',
            'commission' => 'required',
            'dareba' => 'required',
            'num_saned' => 'required',

        ];

        $msg =[
            'Payment_method.required'=> 'م طريقه الدفع مطلوبه',
            'client_id.required'=> 'إسم المستفيد مطلوبه',
            'salary.required'=> ' قيمة المعامله مطلوبه',
            'ratio.required'=> ' النسبه مطلوبه',
            'commission.required'=> 'عمولة البنك مطلوبه ',
            'num_saned.required'=> 'رقم السند مطلوب ',
            'dareba.required'=> ' الضريبة مطلوب ',
        ];


        $this->validate($request,$rules ,$msg);


        Catchs::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.catchs.index');

    }
//end of store

    public function edit(Catchs $catch)
    {
        $clients = Client::all();
        return view('dashboard.catchs.edit', compact('catch','clients'));

    }//end of edit

    public function update(Request $request, Catchs $catch)
    {
        $rules = [
            'Payment_method' => 'required',
            'salary' => 'required',
            'ratio' => 'required',
            'commission' => 'required',
            'dareba' => 'required',
            'num_saned' => 'required',


        ];

        $msg =[
            'Payment_method.required'=> 'طريقه الدفع',
            'salary.required'=> ' قيمة المعامله',
            'ratio.required'=> ' النسبه',
            'commission.required'=> 'عمولة البنك ',
            'dareba.required'=> ' الضريبه',
            'num_saned.required'=> ' رقم السند',
        ];


        $this->validate($request,$rules ,$msg);


        $catch->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.catchs.index');

    }//end of update
//
    public function destroy(Catchs $catch)
    {
        $catch->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.catchs.index');

    }//end of destroy
    public function catchs(Request $request){
        $catch = Catchs::where(function($query)use($request){

            if($request->has('product_id')){
                $query->where('product_id',$request->product_id);

            }
        })->get();
        return view('dashbourd.catchs.index',compact('catch'));
    }
//
}
