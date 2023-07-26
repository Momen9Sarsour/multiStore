<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category= Category::all();
         return view('adminStore.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $parents = Store::all();
        $category = new Category();
        return view('adminStore.category.create', compact('parents', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' =>'required',
            'image'=>'nullable',
            'description' =>'nullable',
            'parent_id' =>'nullable',
            'status' =>'nullable',
        ]);
        // image add path
        if($request->has('image')){
            $image=rand() .time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/uploads'),$image);
        }
        else{
            $image="";
        };

        // store data
        $category = new Category();
        $category->name = $request->name;
        $category->image = $image;
        $category->description = $request->description;
        $category->store_id = $request->parent_id;
        $category->status = $request->status;
        $category->save();
        // $request->merge([
            //     'slug'=> Str::slug($request->post('name'))
        // ]);
        // $data = $request->except('image');
        // $data['image']= $this->uploadImage($request);

        // //mass assigment
        // $category = Category::create($data);
        //PRG
        return redirect()->route('adminCategory.index')
        ->with('success','Category created!');
        // return  redirect()->back()->with('success','Category created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        try{
            $category = Category::findorfail($id);
            }catch(Exception $e){
                return redirect()->route('adminCategory.index')
                ->with('info','Record not found');
              }
              $category=Category::findOrFail($id);
              $store=Store::findOrFail($id);
              $parents = Store::all();
            //   $parents= Category::where('id','<>',$id)
            //     ->where(function($query) use($id){
            //   $query->whereNull('store_id')
            //  ->orwhere('store_id','<>',$id);
            //   })
            // ->get();
            return view('adminStore.category.edit', compact('category','parents','store'));
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
         //validate data
        // dd($request->all());
        $request->validate([
            'name' =>'required',
            'image'=>'nullable',
            'description' =>'nullable',
            // 'parent_id' =>'nullable',
            'status' =>'nullable',
        ]);
        // image add path
        if($request->has('image')){
            $image=rand() .time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/uploads'),$image);
        }
        else{
            $image="";
        };
        //store data
        $category=Category::findOrFail($id);
        $category->name = $request->name;
        $category->image = $image;
        $category->description = $request->description;
        $category->store_id = $request->parent;
        $category->status = $request->status;
        // dd($request->all());
        $category->save();

        // $category=Category::findOrFail($id);
        // $old_image =$category->image;
        // $data = $request->except('image');
        //  $new_image= $this->uploadImage($request);
        //  if($new_image){
        //     $data['image']=$new_image;
        //   }
        //   $category->update($data);
        //   if($old_image && $new_image){
        //     Storage::disk('public')->delete($old_image);
        // }
        return redirect()->route('adminCategory.index')
          ->with('success','Category updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category=Category::findOrFail($id);
        $category->delete();
        if($category->image){
            // Storage::disk('public')->delete($category->image);
          }
        return redirect()->route('adminCategory.index')
        ->with('success','Category deleted!');
    }
    protected function uploadImage(Request $request){

        if(!$request->hasFile('image')){
          return;
        }
        $file =  $request->file('image');
        $path =  $file->store('uploads',[
              'disk'=>'public'
        ]);
        return $path;

    }
}
