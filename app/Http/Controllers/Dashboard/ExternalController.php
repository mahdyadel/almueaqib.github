<?php

namespace App\Http\Controllers\Dashboard;

use App\External;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class ExternalController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:update_users'])->only('edit');
        $this->middleware(['permission:delete_users'])->only('destroy');

    }//end of constructor

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $externals = External::where(function ($q) use ($request) {

            $q->where('receipt_number','LIKE', '%' . $request->search . '%');

        })->latest()->paginate(5);
//        dd($externals);

        return view('dashboard.external.index', compact('externals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $externals = External::all();
        return view('dashboard.external.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'receipt_number' => 'required|unique:externals',
            'type_of_transaction' => 'required',
            'amount' => 'required',
            'name_of_operator' => 'required',
            'phone' => 'required',
            'name_of_baptist' => 'required',
            'duration_of_baptism' => 'required',
        ];

        $messages = [
            'name.required' => 'الاسم مطلوب',
            'receipt_number.required' => 'رقم سند الاستلام مطلوب',
            'type_of_transaction.required' => 'نوع المعامله مطلوب',
            'amount.required' => 'مبلغ التعميد مطلوب',
            'name_of_operator.required' => 'اسم المنفذ مطلوب',
            'phone.required' => 'الجوال مطلوب',
            'name_of_baptist.required' => 'اسم المعمد مطلوب',
            'duration_of_baptism.required' => 'مدة التعميد مطلوب',
        ];

        $this->validate($request, $rules, $messages);

        External::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.external.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $externals = External::findOrFail($id);
        //$externals->update($request->status('yes'));
        $externals->status = 'yes';
        $externals->save();
        return back();
    }

    public function edit($id)
    {
        $externals = External::findOrFail($id);
        return view('dashboard.external.edit',compact('externals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'receipt_number' => 'required',
            'type_of_transaction' => 'required',
            'amount' => 'required',
            'name_of_operator' => 'required',
            'phone' => 'required',
            'name_of_baptist' => 'required',
            'duration_of_baptism' => 'required',
        ];

        $messages = [
            'name.required' => 'الاسم مطلوب',
            'receipt_number.required' => 'رقم سند الاستلام مطلوب',
            'type_of_transaction.required' => 'نوع المعامله مطلوب',
            'amount.required' => 'مبلغ التعميد مطلوب',
            'name_of_operator.required' => 'اسم المنفذ مطلوب',
            'phone.required' => 'الجوال مطلوب',
            'name_of_baptist.required' => 'اسم المعمد مطلوب',
            'duration_of_baptism.required' => 'مدة التعميد مطلوب',
        ];

        $this->validate($request, $rules, $messages);
        $externals = External::findOrFail($id);
        $externals->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.external.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $externals = External::findOrFail($id);
        $externals->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.external.index');
    }
}
