<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\product_review;
use Auth;
use App\User;
use DB;
use App\Image;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //menampilkan index public controller
        // $products=Product::all();
        $orderBy = $request->get('order_by');
        $productInstance = new Product();
        $products = $productInstance->orderProducts($orderBy);

        if ($request->ajax()) {
            return response()->json($products, 200);
        }

        return view('semua', compact('products'));
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
        $productReview = new product_review();
        $productReview->user_id = Auth::user()->id;
        $productReview->product_id = $request->post('product_id');
        $productReview->description = $request->post('description');
        
        $productReview->comen = $request->post('comen');
        $productReview->rating = $request->post('rating');
        
        if ($productReview->rating > 5) {
            return redirect('/')->with('error', 'Rating must be 1 - 5');
        }
        $productReview->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //detail public
        $product = Product::find($id);

        $rating = $product->reviews()->avg('rating');

        $description = DB::table('product_reviews')
                    ->join('users', 'product_reviews.user_id', '=', 'users.id')
                    ->join('products', 'product_reviews.product_id', '=', 'products.id')
                    ->select('product_reviews.description', 'product_reviews.created_at', 'users.name', 'product_reviews.comen')
                    ->where('product_reviews.product_id', '=', $id)
                    ->get();

        $reviews = product_review::where('product_id',$product->id)->get();

        return view('lihat', compact('product', 'rating', 'reviews','description'));
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
        //
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

    public function image($imageName)
    {
        $filePath = storage_path(env('PATH_IMAGE').'product/'.$imageName);

        return Image::make($filePath)->response();
    }
}
