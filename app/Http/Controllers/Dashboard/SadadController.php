<?php

namespace App\Http\Controllers\Dashboard;
use App\Cashier;
use App\Category;
use App\Client;
use App\Http\Controllers\Controller;
use App\Sadad;
use DB;
use Illuminate\Http\Request;

class SadadController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::all();


        $sadads = Sadad::where(function ($q) use ($request) {

            $q->where('num_saned','LIKE', '%' . $request->search . '%');


        })->when($request->category_id, function ($q) use ($request) {

            return $q->where('category_id', $request->category_id);


        })->latest()->paginate(5);


        return view('dashboard.sadads.index', compact('categories', 'sadads'));

    }//end of index


    public function status ($id)
    {
        $sadads = Sadad::findOrFail($id);
        $sadads->status = 'yes';
        $sadads->save();
        return back();
    }

    public function show($id)
    {
        $category = Category::all();
        $clients = Client::all();
        $cashiers = Cashier::all();
        $sadads = Sadad::findOrFail($id);

        // return $users;
        return view('dashboard.sadads.view', compact('sadads','category','clients', 'cashiers'));
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        $clients = Client::all();
        $cashiers = Cashier::all();
        return view('dashboard.sadads.create', compact('categories','clients', 'cashiers'));

    }//end of create

    public function store(Request $request)
    {
        $rules = [
            'client_id' => 'required',
            'cashier_id' => 'required',
            'number' => 'required|numeric|digits_between:5,15',
            'num_saned' => 'required|unique:products',
            'category_id' => 'required',
            'type_of_transaction' => 'required',
            'fees' => 'required',

        ];

        $msg =[
            'client_id.required'=> 'اسم العميل مطلوب',
            'cashier_id.required'=> 'اسم امين الصندوق مطلوب',
            'number.required'=> ' رقم الهويه مطلوب',
            'num_saned.required'=> ' رقم السند مطلوب',
            'category_id.required' => 'اسم الإداره مطلوب',
            'type_of_transaction.required'=> 'نوع المعامله مطلوبه ',
            'fees.required'=> 'الرسوم مطلوبه',

        ];

        $this->validate($request,$rules ,$msg);

        $request_data = $request->all();


        Sadad::create($request_data);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.sadads.index');

    }//end of store

    public function edit($id)
    {
        $categories = Category::all();
        $sadads = Sadad::findOrFail($id);
        $clients = Client::all();
        $cashiers = Cashier::all();

        return view('dashboard.sadads.edit', compact('categories', 'clients','sadads', 'cashiers'));

    }//end of edit

    public function update(Request $request,$id)
    {
        $rules = [
            'client_id' => 'required',
            'cashier_id' => 'required',
            'number' => 'required',
            'num_saned' => 'required',
            'category_id' => 'required',
            'type_of_transaction' => 'required',
            'fees' => 'required',
        ];
        $msg =[
            'client_id.required'=> 'اسم العميل مطلوب',
            'cashier_id.required'=> 'اسم امين الصندوق مطلوب',
            'number.required'=> ' رقم الهويه مطلوبه',
            'num_saned.required'=> ' رقم السند مطلوب',
            'type_of_transaction.required'=> 'نوع المعامله مطلوبه ',
            'fees.required'=> 'الرسوم مطلوبه',
            'category_id.required' => 'اسم الإداره مطلوب',

        ];

        $this->validate($request,$rules ,$msg);


        $request_data = $request->all();
        $sadads = Sadad::findOrFail($id);
        $sadads->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.sadads.index');

    }//end of update

    public function destroy($id)
    {
        $sadads = Sadad::findOrFail($id);
        $sadads->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.sadads.index');

    }//end of destroy
}
