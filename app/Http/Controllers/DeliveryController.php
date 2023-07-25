<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    // index
    public function index()
    {
        $delivery = Delivery::all();
        return view('adminStore.delivery.deliveryList',compact('delivery'));
    }
    //create
    public function create()
    {
        return view('adminStore.delivery.create');
    }
    //store
    public function store(Request $request)
    {
        //validate data
        $request->validate([
            'name' => 'required',
            'image' => 'nullable',
            'phone' => 'required',
            'address' => 'nullable',
            'deliveryEmail' => 'required|email',
            'ipan' => 'nullable',
        ]);
        // image add path
        $image = rand() . time() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images/uploads'), $image);

        //store data
        $delivery = new Delivery();
        $delivery->name = $request->name;
        $delivery->image = $image;
        $delivery->phone = $request->phone;
        $delivery->address = $request->address;
        $delivery->email = $request->deliveryEmail;
        $delivery->ipan = $request->ipan;
        $delivery->save();

        //session message
        session()->flash('message', 'Delivery added!');
        //redirect
        return redirect()->route('adminDelivery.index');
    }
    //edit
    public function edit($id)
    {
        //find object
        $delivery = Delivery::findOrFail($id);
        //return view and pass object
        return view('adminStore.delivery.edit', compact('delivery'));
    }
    //update
    public function update(Request $request, $id)
    {
        //validate data
        $this->validate($request, [
            'name' => 'required',
            'image' => 'nullable',
            'phone' => 'required',
            'address' => 'nullable',
            'deliveryEmail' => 'required|email',
            'ipan' => 'nullable',
        ]);
        // image add path
        $image = rand() . time() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images/uploads'), $image);
        //update data
        $delivery = Delivery::find($id);
        $delivery->name = $request->name;
        $delivery->image = $image;
        $delivery->phone = $request->phone;
        $delivery->address = $request->address;
        $delivery->email = $request->deliveryEmail;
        $delivery->ipan = $request->ipan;
        $delivery->save();

        //session message
        session()->flash('message', 'delivery updated!');
        //redirect
        return redirect()->route('adminDelivery.index');
    }
    //delete
    public function destroy($id)
    {
        // delete delivery
        Delivery::destroy($id);
        //delete image
        if ($image = Delivery::find($id)) {
            unlink(public_path(). $image);
        }
        //session message
        session()->flash('message', 'delivery deleted! & image deleted!');
        //redirect
        return redirect()->route('adminDelivery.index');
    }






    

    // index
    public function empDeliveryList()
    {
        $delivery = Delivery::all();
        return view('employeeAdmin.delivery.deliveryList',compact('delivery'));
    }
    //create
    public function empCreateDelivery()
    {
        return view('employeeAdmin.delivery.create');
    }
    //store
    public function empStore(Request $request)
    {
        //validate data
        $request->validate([
            'name' => 'required',
            'image' => 'nullable',
            'phone' => 'required',
            'address' => 'nullable',
            'deliveryEmail' => 'required|email',
            'ipan' => 'nullable',
        ]);
        // image add path
        $image = rand() . time() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images/uploads'), $image);

        //store data
        $delivery = new Delivery();
        $delivery->name = $request->name;
        $delivery->image = $image;
        $delivery->phone = $request->phone;
        $delivery->address = $request->address;
        $delivery->email = $request->deliveryEmail;
        $delivery->ipan = $request->ipan;
        $delivery->save();

        //session message
        session()->flash('message', 'Delivery added!');
        //redirect
        return redirect()->route('employeeAdmin/delivery');
    }
    //edit
    public function empEdit($id)
    {
        //find object
        $delivery = Delivery::findOrFail($id);
        //return view and pass object
        return view('employeeAdmin.delivery.edit', compact('delivery'));
    }
    //update
    public function empUpdate(Request $request, $id)
    {
        //validate data
        $this->validate($request, [
            'name' => 'required',
            'image' => 'nullable',
            'phone' => 'required',
            'address' => 'nullable',
            'deliveryEmail' => 'required|email',
            'ipan' => 'nullable',
        ]);
        // image add path
        $image = rand() . time() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images/uploads'), $image);
        //update data
        $delivery = Delivery::find($id);
        $delivery->name = $request->name;
        $delivery->image = $image;
        $delivery->phone = $request->phone;
        $delivery->address = $request->address;
        $delivery->email = $request->deliveryEmail;
        $delivery->ipan = $request->ipan;
        $delivery->save();

        //session message
        session()->flash('message', 'delivery updated!');
        //redirect
        return redirect()->route('employeeAdmin/delivery');
    }
    //delete
    public function empDestroy($id)
    {
        // delete delivery
        Delivery::destroy($id);
        //delete image
        if ($image = Delivery::find($id)) {
            unlink(public_path(). $image);
        }
        //session message
        session()->flash('message', 'delivery deleted! & image deleted!');
        //redirect
        return redirect()->route('employeeAdmin/delivery');
    }

}

