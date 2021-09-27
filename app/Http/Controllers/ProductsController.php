<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{

    protected $array = ['error' => '', 'result' => []];

    public function index()
    {
        return Product::all();
    }


    public function store(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');

        if ($name && $description && $price) {

            $product = new Product();
            $product->name = $name;
            $product->description = $description;
            $product->price = $price;
            $product->save();

            $this->array['result'] = [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price
            ];
        } else {
            return $this->array['error'] = 'Campos não enviados!';
        }

        return $this->array;
    }


    public function show($id)
    {
	$product = Product::find($id);

	if($product) {
	$this->array['result'] = $product;
}else {
$this->array['error'] = 'id inexistente!';
}

        return $this->array;
    }


    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');

        if ($name && $description && $price) {

            $product = Product::find($id);

            if ($product) {

                $product->name = $name;
                $product->description = $description;
                $product->price = $price;
                $product->save();

                $this->array['result'] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'description' => $product->description,
                    'price' => $product->price
                ];
            } else {
                $this->array['error'] = 'Produto inexistente!';
            }
        } else {
            $this->array['error'] = 'Campos não enviados!';
        }

        return $this->array;
    }


    public function destroy($id)
    {
        return Product::destroy($id);
    }
}
