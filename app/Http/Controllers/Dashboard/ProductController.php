<?php

namespace App\Http\Controllers\Dashboard;

use App\Cashier;
use App\Catchs;
use App\Category;
use App\Client;
use App\Http\Controllers\Controller;
use App\Product;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request, Product $prod)
    {
        $categories = Category::all();


            $products = Product::where(function ($q) use ($request) {

                $q->where('num_saned','LIKE', '%' . $request->search . '%');


        })->when($request->category_id, function ($q) use ($request) {

            return $q->where('category_id', $request->category_id);


        })->latest()->paginate(5);


        $catch = Catchs::all();
        return view('dashboard.products.index', compact('categories', 'products', 'catch'));

    }//end of index


    public function status ($id)
    {
        $products = Product::findOrFail($id);
        $products->status = 'yes';
        $products->save();
        return back();
    }

    public function show($id)
    {
        $category = Category::all();
        $clients = Client::all();
        $cashiers = Cashier::all();
        $product = Product::findOrFail($id);

        // return $users;
        return view('dashboard.products.view', compact('product','category','clients', 'cashiers'));
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        $clients = Client::all();
        $cashiers = Cashier::all();
        return view('dashboard.products.create', compact('categories','clients', 'cashiers'));

    }//end of create 

    public function store(Request $request)
    {
        $rules = [
            'client_id' => 'required',
            'number' => 'required|numeric|digits_between:5,15',
            'num_saned' => 'required|unique:products',
            'category_id' => 'required',
            'type_of_transaction' => 'required',
            'fees' => 'required',
            'other_fees' => 'required',
            'cashier_id' => 'required',
        ];

        $msg =[
            'cashier_id.required'=> 'اسم امين الصندوق مطلوب',
            'name.required'=> 'الإسم مطلوب',
            'number.required'=> ' رقم الهويه مطلوب',
            'num_saned.required'=> ' رقم السند مطلوب',
            'type_of_transaction.required'=> 'نوع المعامله مطلوبه ',
            'fees.required'=> 'الرسوم مطلوبه',
            'other_fees.required'=> 'رسوم اخرى مطلوبه ',
        ];

        $this->validate($request,$rules ,$msg);

        $request_data = $request->all();


        Product::create($request_data);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.products.index');

    }//end of store

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        $clients = Client::all();
        $cashiers = Cashier::all();

        return view('dashboard.products.edit', compact('categories', 'clients','product','cashiers'));

    }//end of edit

    public function update(Request $request, Product $product)
    {
        $rules = [
            'number' => 'required',
            'name' => 'required',
            'num_saned' => 'required',
            'category_id' => 'required',
            'type_of_transaction' => 'required',
            'fees' => 'required',
            'other_fees' => 'required',
            'cashier_id' => 'required',

        ];
        $msg =[
            'cashier_id.required'=> 'اسم امين الصندوق مطلوب',
            'name.required'=> 'الإسم مطلوب',
            'number.required'=> ' رقم الهويه مطلوبه',
            'num_saned.required'=> ' رقم السند مطلوب',
            'type_of_transaction.required'=> 'نوع المعاملة مطلوبه ',
            'fees.required'=> 'الرسوم مطلوبه',
            'other_fees.required'=> 'رسوم اخرى مطلوبه ',
        ];

        $this->validate($request,$rules ,$msg);


        $request_data = $request->all();

        $product->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.products.index');

    }//end of update

    public function destroy(Product $product)
    {

        $product->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.products.index');

    }//end of destroy

}//end of controller
