<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Backend\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('backend.pages.category.categorymanage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=validator::make($request->all(),[
            'name'=>'required',
            'des'=>'required',
            'tag'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
              'status'=>'faild',
              'errors'=>$validator->messages()
           ]);

        }
        else{
           $category=new Category;
           $category->name= $request->name;
           $category->des= $request->des;
           $category->tag= $request->tag;
           $category->status= $request->status;
           $category->save();
           return response()->json([
              'message'=>'Category Added Successfully',
           ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $alldata=Category::all();
        return response()->json([
            'data'=>$alldata
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alldata=Category::find($id);
        if($alldata){
            return response()->json([
                'data'=>$alldata
            ]);
        }
        else{
            return response()->json([
                'status'=>'400',
                'error'=>'Data not Found'
            ]); 
        }
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
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'des' => 'required',
            'tag' => 'required',
            'status' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'faild'=>'404',
                'errors' => $validator->messages()
            ]);
        }
        else{
            $category = Category::find($id);
            $category->name = $request->name;
            $category->des = $request->des;
            $category->tag = $request->tag;
            $category->status = $request->status;
            $category->update();
            return response()->json([
                'message' => 'SUCCESSFULLY Category INSERTED'
            ]);
        }
        
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
    }
}
