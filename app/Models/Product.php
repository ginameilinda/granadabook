<?php

namespace App\Models;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    public function images()
    {
        return $this->belongsToMany('App\Models\Image', 'product_images');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\product_review', 'product_id');
    }

    //sorting 

    public function orderProducts($order_by)
    {
        $query = DB::table('products');

        if ($order_by == 'best_seller') {
            $query -> leftJoin('order_items', 'order_items.product_id', '=', 'products.id')->select(DB::raw('sum(order_items.quantity) as quantity, products.*'))->groupBy('products.id', 'products.user_id', 'products.name', 'products.price', 'products.description', 'products.image_url', 'products.vidio_url', 'products.created_at', 'products.updated_at')->orderBy('quantity', 'desc');
        } 
        else if ($order_by == 'terbaik') {
            $query -> leftJoin('product_reviews', 'product_reviews.product_id', '=', 'product_id')->select(DB::raw('avg(product_reviews.rating) as rating, products.*'))->groupBy('products.id', 'products.user_id', 'products.name', 'products.price', 'products.description', 'products.image_url', 'products.vidio_url', 'products.created_at', 'products.updated_at')->orderBy('rating', 'desc');
        } 
        else if ($order_by == 'termurah') {
            $query -> orderBy('price','asc');
        }
        else if ($order_by == 'termahal') {
            $query -> orderBy('price','desc');
        }
        else if ($order_by == 'terbaru') {
            $query -> orderBy('updated_at','asc');
        }
        // return DB::select($query);
        return $query->get();
    }

    public function orderProducts2($order_by, $user_id)
    {
        $query = DB::table('products');

        if ($order_by == 'best_seller') {
            $query -> leftJoin('order_items', 'order_items.product_id', '=', 'products.id')->select(DB::raw('sum(order_items.quantity) as quantity, products.*'))->groupBy('products.id', 'products.user_id', 'products.name', 'products.price', 'products.description', 'products.image_url', 'products.vidio_url', 'products.created_at', 'products.updated_at')->orderBy('quantity', 'desc');
        } 
        else if ($order_by == 'terbaik') {
            $query -> leftJoin('product_reviews', 'product_reviews.product_id', '=', 'product_id')->select(DB::raw('avg(product_reviews.rating) as rating, products.*'))->groupBy('products.id', 'products.user_id', 'products.name', 'products.price', 'products.description', 'products.image_url', 'products.vidio_url', 'products.created_at', 'products.updated_at')->orderBy('rating', 'desc');
        } 
        else if ($order_by == 'termurah') {
            $query -> orderBy('price','asc');
        }
        else if ($order_by == 'termahal') {
            $query -> orderBy('price','desc');
        }
        else if ($order_by == 'terbaru') {
            $query -> orderBy('created_at','asc');
        }
        // return DB::select($query);
        return $query->where('products.user_id',$user_id)->get();
    }
}