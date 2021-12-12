<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $images = [];

        if ($request->hasFile('images')){
            $i = 0;
            $files = $request->file('images');
            foreach ($files as $file){
                $extension = $file->getClientOriginalExtension();
                $imageName = $i.'-'.'Product_'.time().'.'.$extension;
                Image::make($file)->resize(500, 400)->save(public_path()."/assets/images/product/".$imageName);

                $images[] = $imageName;

                $i++;
            }
        }

        $product = new Product();

        $product->image = json_encode($images);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        $notification = array(
            'message'    => 'Product Added Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product){

            if ($request->hasFile('images')){
                $images = json_decode($product->image);
                foreach ($images as $image){
                    unlink(public_path()."/assets/images/product/".$image);
                }

                $images = [];
                $i = 0;

                $files = $request->file('images');
                foreach ($files as $file){
                    $extension = $file->getClientOriginalExtension();
                    $imageName = $i.'-'.'Product_'.time().'.'.$extension;
                    Image::make($file)->resize(500, 400)->save(public_path()."/assets/images/product/".$imageName);

                    $images[] = $imageName;
                    $product->image = json_encode($images);

                    $i++;
                }
            }


            $product->name = $request->name;
            $product->description = $request->description;
            $product->save();

        }else{
            $images = [];

            if ($request->hasFile('images')){
                $i = 0;
                $files = $request->file('images');
                foreach ($files as $file){
                    $extension = $file->getClientOriginalExtension();
                    $imageName = $i.'-'.'Product_'.time().'.'.$extension;
                    Image::make($file)->resize(500, 400)->save(public_path()."/assets/images/product/".$imageName);

                    $images[] = $imageName;

                    $i++;
                }
            }

            $product = new Product();

            $product->image = json_encode($images);
            $product->name = $request->name;
            $product->description = $request->description;
            $product->save();
        }

        $notification = array(
            'message'    => 'Product Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::findOrFail($id);

        $images = json_decode($product->image);
        foreach ($images as $image){
            unlink(public_path()."/assets/images/product/".$image);
        }
        $product->delete();

        $notification = array(
            'message'    => 'Product Added Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
