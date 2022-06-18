<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\Subcategory;
use App\Models\Backend\Category;
use Image;
use File;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcat=Subcategory::all();
        return view("backend.pages.subcategory.subcatmanage",compact('subcat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view("backend/pages/subcategory/addsubcat",compact("category"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cat_id'=>'required',
            'name'=>'required',
            'slug'=>'required',
            'pic'=>'required',
            'status'=>'required'
        ]);

        $subcategory= new Subcategory();
        $subcategory->cat_id= $request->cat_id;
        $subcategory->name= $request->name;
        $subcategory->slug= Str::slug($request->name);
        $subcategory->status= $request->status;

        if($request->pic){
            $pic=$request->file('pic');
            $imageCustomName=rand().'.'.$pic->getClientOriginalExtension();
            $location=public_path('backend/subcategoryimages/'.$imageCustomName);
            Image::make($pic)->save($location);
            $subcategory->pic=$imageCustomName;
        }
         $subcategory->save();
         return redirect()->route('subcategorymanage');

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
        $subcat=Subcategory::find($id);
        $cat=Category::all();
        return view("backend/pages/subcategory/editsubcat",compact("subcat","cat"));
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
        $subcategory=Subcategory::find($id);
        $subcategory->cat_id= $request->cat_id;
        $subcategory->name= $request->name;
        $subcategory->slug= Str::slug($request->name);
        $subcategory->status= $request->status;

        if(!empty($request->pic)){
            if(File::exists('backend/subcategoryimages/'.$subcategory->pic)){
                File::delete('backend/subcategoryimages/'.$subcategory->pic);
            }
            $pic=$request->file('pic');
            $imageCustomName=rand().'.'.$pic->getClientOriginalExtension();
            $location=public_path('backend/subcategoryimages/'.$imageCustomName);
            Image::make($pic)->save($location);
            $subcategory->pic=$imageCustomName;                
        }     
        $subcategory->update();
        return redirect()->route('subcategorymanage');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcat=Subcategory::find($id);
        if(File::exists('backend/subcategoryimages/'.$subcat->pic)){
            File::delete('backend/subcategoryimages/'.$subcat->pic); 
        }
        $subcat->delete();
        return redirect()->route('subcategorymanage');
    }
}
