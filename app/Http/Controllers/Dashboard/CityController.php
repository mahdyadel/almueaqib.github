<?php

namespace App\Http\Controllers\Dashboard;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $cities = City::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('name', '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.cities.index', compact('cities'));

    }//end of index

    public function create()
    {
        return view('dashboard.cities.create');

    }//end of create

    public function store(Request $request)
    {
       $rules = [];

       foreach (config('translatable.locales') as $locale) {

           $rules += [$locale . 'name' => ['required', Rule::unique('city_translations', 'name')]];

       }//end of for each

       $request->validate($rules);

        City::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.cities.index');

    }//end of store

    public function edit(City $cities)
    {
        return view('dashboard.cities.edit', compact('cities'));

    }//end of edit

    public function update(Request $request, City $cities)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('city_translations', 'name')->ignore($cities->id, 'city_id')]];

        }//end of for each

        $request->validate($rules);

        $cities->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.cities.index');

    }//end of update

    public function destroy(City $cities)
    {
        $cities->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.cities.index');

    }//end of destroy

}//end of controller
