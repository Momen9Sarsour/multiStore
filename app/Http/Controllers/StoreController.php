<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function storesList()
    {
        $store = Store::all();
        return view('adminStore.stores.storesList', compact('store'));
    }
    public function createStore()
    {
        return view('adminStore.stores.create');
    }
    public function store(Request $request){
        //validate data
        // dd($request->all());
        $request->validate([
            'name' =>'required',
            'image'=>'nullable',
            'phone' =>'required',
            'discription' =>'nullable',
            // 'vendor_id' =>'required',
        ]);
        // image add path
        if($request->has('image')){
            $image=rand() .time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/uploads'),$image);
        };

        // store data
        $store = new Store();
        $store->name = "$request->name";
        $store->image = $image;
        $store->phone = $request->phone;
        $store->discription = $request->discription;
        $store->vendor_id = $request->vendorEmail;
        $store->save();

        // Store::create([
        //     'name' => $request->name,
        //     'image' => $image,
        //     'phone' => $request->quantity,
        //     'discription' => $request->price,
        //     'vendor_id' => $request->category_id,
        // ]);

        //session message
        session()->flash('message', 'Store added!');
        // return redirect
        // return redirect(view('adminStore.stores.storesList'));
        return redirect()->route('admin/stores');
    }
    //edit
    public function edit($id){
        $store=Store::findOrFail($id);
        return view('adminStore.stores.edit',compact('store'));
    }
    //update
    public function update(Request $request, $id){
        //validate data
        $request->validate([
            'name' =>'required',
            'image'=>'nullable',
            'phone' =>'required',
            'discription' =>'nullable',
            // 'vendor_id' =>'required|email',
        ]);
        // image add path
        if($request->has('image')){
            $image=rand() .time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/uploads'),$image);
        };
        //store data
        $store=Store::findOrFail($id);
        $store->name = $request->name;
        $store->image = $image;
        $store->phone = $request->phone;
        $store->discription = $request->discription;
        $store->vendor_id = $request->vendorEmail;
        $store->save();
        //session message
        session()->flash('message', 'Employee updated!');
        // return back
        return redirect()->route('admin/stores');
    }
    //delete
    public function destroy($id){
        // delete employee
        Store::destroy($id);
        //delete image
        if ($image = Store::find($id)) {
            unlink(public_path(). $image);
        }
        //session message
        session()->flash('message', 'Employee deleted! & image deleted!');
        //redirect
        return redirect()->route('admin/stores');
    }






    // employee function
    public function empStoresList()
    {
        $store = Store::all();
        return view('employeeAdmin.stores.storesList', compact('store'));
    }
    public function empCreateStore()
    {
        return view('employeeAdmin.stores.create');
    }
    public function empStore(Request $request){
        //validate data
        $request->validate([
            'name' =>'required',
            'image'=>'nullable',
            'phone' =>'required',
            'discription' =>'nullable',
            // 'vendor_id' =>'required',
        ]);
        // image add path
        $image=rand() .time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images/uploads'),$image);

        // store data
        $store = new Store();
        $store->name = $request->name;
        $store->image = $image;
        $store->phone = $request->phone;
        $store->discription = $request->discription;
        $store->vendor_id = $request->vendorEmail;
        $store->save();

        //session message
        session()->flash('message', 'Store added!');
        // return redirect
        return redirect()->route('employeeAdmin/stores');
    }
    //edit
    public function empEdit($id){
        $store=Store::findOrFail($id);
        return view('employeeAdmin.stores.edit',compact('store'));
    }
    //update
    public function empUpdate(Request $request, $id){
        //validate data
        $request->validate([
            'name' =>'required',
            'image'=>'nullable',
            'phone' =>'required',
            'discription' =>'nullable',
            // 'vendor_id' =>'required|email',
        ]);
        // image add path
        if($request->has('image')){
            $image=rand() .time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/uploads'),$image);
        };
        //store data
        $store=Store::findOrFail($id);
        $store->name = $request->name;
        $store->image = $image;
        $store->phone = $request->phone;
        $store->discription = $request->discription;
        $store->vendor_id = $request->vendorEmail;
        $store->save();
        //session message
        session()->flash('message', 'Employee updated!');
        // return back
        return redirect()->route('employeeAdmin/stores');
    }
    //delete
    public function empDelete($id){
        // delete employee
        Store::destroy($id);
        //delete image
        if ($image = Store::find($id)) {
            unlink(public_path(). $image);
        }
        //session message
        session()->flash('message', 'Employee deleted! & image deleted!');
        //redirect
        return redirect()->route('employeeAdmin/stores');
    }
}
