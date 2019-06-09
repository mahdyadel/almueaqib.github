<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Input;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:update_users'])->only('edit');
        $this->middleware(['permission:delete_users'])->only('destroy');

    }//end of constructor

    public function index(Request $request)
    {
        $users = User::whereRoleIs('admin')->where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query->where('first_name', 'like', '%' . $request->search . '%')
                    ->orWhere('last_name', 'like', '%' . $request->search . '%');

            });

        })->latest()->paginate(5);

        return view('dashboard.users.index', compact('users'));


    }//end of index

    public
    function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('dashboard.users.create', compact('categories','users'));

    }//end of create

    public function show($id)
    {
        $users = User::findOrFail($id);
        $categories = Category::all();

//        $tokens = Token::whereIn('client_id',$clientsIds)->where('token','!=',null)->pluck('token')->toArray();
        // return $users;
        return view('dashboard.users.view', compact('users','categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'image' => 'image',
            'id_number' => 'required|unique:users|numeric|digits_between:5,15',
            'gender' => 'required|in:male,female',
            'status' => 'required|in:married,single',
            'Section' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
            'salary' => 'required',
            'start' => 'required',
            'end' => 'required',
            'categroy_id' => 'required',
            'password' => 'required|confirmed',
            'permissions' => 'required|min:1'
        ]);

        $msg =[
            'Section.required' => 'الفرع مطلوب',
            'id_number.required' => 'رقم الهوية مطلوب',
            'salary.required' => ' المرتب مطلوب',
            'start.required' => ' تاريخ التجديد مطلوب',
            'end.required' => ' تاريخ الإنتهاء مطلوب',
            'categroy_id.required' => '  الإدارة مطلوبه',
        ];
        $this->validate($request ,$msg);


        $request_data = $request->except(['password', 'password_confirmation', 'permissions', 'image', 'categroy_id', 'image_scan']);
        $request_data['password'] = bcrypt($request->password);
//dd($request_data);
        if ($request->image) {

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/user_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of if


        if ($request->image_scan) {

            Image::make(file('image_scan')->getRealPath())->resize(120,75)

            ->save(public_path('uploads/img_scan/' . $request->image_scan->hashName()));

            $request_data['image_scan'] = $request->image_scan->hashName();


        }//end of if
////        if ($request->hasFile('image_scan')) {
////
////            foreach ($request->file('image_scan') as $file) {
////
////                //get filename with extension
////                $filenamewithextension = $file->getClientOriginalName();
////
////                //get filename without extension
////                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
////
////                //get file extension
////                $extension = $file->getClientOriginalExtension();
////
////                //filename to store
////                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;
////
////                Storage::put('uploads/img_scan/' . $filenametostore, fopen($file, 'r+'));
////                Storage::put('uploads/img_scan/' . $filenametostore, fopen($file, 'r+'));
//
//                //Resize image here
//                $thumbnailpath = public_path('uploads/img_scan/' . $filenametostore);
//                $img = Image::make($thumbnailpath)->resize(100, 100)->save($thumbnailpath);

                $user = User::create($request_data);
                $user->categories()->sync($request->categroy_id);
                $user->attachRole('admin');
                $user->syncPermissions($request->permissions);
                $categories = Category::all();

                session()->flash('success', __('site.added_successfully'));
                return redirect()->route('dashboard.users.index', compact('categories'));
            }


    public function edit(User $user)
    {
        $categories = Category::all();
        $users = User::all();
        return view('dashboard.users.edit', compact('user', 'categories','users'));

    }//end of user

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user->id),],
            'image' => 'image',
            'id_number' => 'required|numeric|digits_between:5,15',
            'gender' => 'required|in:male,female',
            'status' => 'required|in:married,single',
            'Section' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
            'salary' => 'required',
            'start' => 'required',
            'end' => 'required',

            'permissions' => 'required|min:1',
        ]);

        $request_data = $request->except(['permissions', 'image']);

        if ($request->image) {

            if ($user->image != 'default.png') {

                Storage::disk('public_uploads')->delete('/user_images/' . $user->image);

            }//end of inner if

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/user_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }


//        if ($request->image_scan) {
//
//            if ($user->image_scan != 'scan.png') {
//
//                Storage::disk('public_uploads')->delete('/img_scan/' . $user->image_scan);
//
//            }//end of inner if
//
//            Image::make($request->image_scan)
//                ->resize(300, null, function ($const) {
//                    $const->aspectRatio();
//                })
//                ->save(public_path('uploads/img_scan/' . $request->image_scan->hashName()));
//
//            $request_data['image_scan'] = $request->image_scan->hashName();
//
//        }//end of external if

        $user->update($request_data);
        $user->categories()->sync($request->categroy_id);

        $user->syncPermissions($request->permissions);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.users.index');

    }//end of update

    public
    function destroy(User $user)
    {
        if ($user->image != 'default.png') {

            Storage::disk('public_uploads')->delete('/user_images/' . $user->image);

        }elseif($user->image_scan != 'scan.png'){
            Storage::disk('public_uploads')->delete('/user_images/' . $user->image_scan);
        }

        $user->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.users.index');

    }//end of destroy

}//end of controller
