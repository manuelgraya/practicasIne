<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductController extends Controller
{


    public function create()
    {
        return view('product.edit', [ 'product' => null]);
    }

    public function store(Request $request)
    {
        $fieldValidation = $request->validate([
            'name' => 'string|required|max:128|unique:product,name,',
            'description'=>'string|max:128',
            'price'=> 'numeric|required|min:0',
            'company_id'=>'integer|exists:company,id|required',   
        ]);

        $product = new Product();

        try{

        
            $product->name = $request->get("name");
            $product->description = $request->get("description");
            $product->price = $request->get("price");
            // $product->company = $request->get("company", null);
            $product->company_id = $request->get("company_id");
            $product->save();
            return redirect()->route('product.edit', [ 'product' => $product ])-> with('sState', 'El producto se ha almacenado correctamente.');
            
        }catch(\Exception $e){
            return redirect()->route('product.edit', [ 'product' => $product ])->with('sState',$e->getMessage());
        }
    }    

    public function update(Product $product, Request $request)
    {

        $fieldValidation = $request->validate([
            'name' => 'string|required|max:128|unique:product,name,' . $product->id,
            'description'=>'string|max:128',
            'price'=> 'numeric|required|min:0',
            'company_id'=>'integer|exists:company,id|required',   
        ]);

        try{

        
            $product->name = $request->get("name");
            $product->description = $request->get("description");
            $product->price = $request->get("price");
            // $product->company = $request->get("company", null);
            $product->company_id = $request->get("company_id");
            $product->save();
            return redirect()->route('product.edit', [ 'product' => $product ])-> with('sState', 'El producto se ha almacenado correctamente.');
            
        }catch(\Exception $e){
            return redirect()->route('product.edit', [ 'product' => $product ])->with('sState',$e->getMessage());
        }
    }      
    
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }        

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function index(Request $request)
    {
        $sText = $request->get("text", null); //text porque es el nombre del campo de busqueda
        $variable = $request->get("variable", null);
        $order = $request->get("order", null);
        $company = \App\Models\Product::with('Company')->get();

        if ($sText == null) {
            if($order == 'asc')
                $aProduct = \App\Models\Product::orderBy($variable)->paginate(10);
            else if($order == 'desc')
                $aProduct = \App\Models\Product::orderByDesc($variable)->paginate(10);
            else
                $aProduct = \App\Models\Product::paginate(10);
            return view('product.index',compact('aProduct'));
        }
        else{
                if($order == 'asc')
                    $aProduct = \App\Models\Product::where('name', 'like', '%'.$sText.'%')->orWhereHas('Company', function(Builder $query)use($sText){$query->where('name', 'like', '%'.$sText.'%');})->orderBy($variable)->paginate(10)->appends(['text'=> $sText, 'variable'=> $variable, 'order'=> $order]);
                else if($order == 'desc')
                $aProduct = \App\Models\Product::where('name', 'like', '%'.$sText.'%')->orWhereHas('Company', function(Builder $query)use($sText){$query->where('name', 'like', '%'.$sText.'%');})->orderByDesc($variable)->paginate(10)->appends(['text'=> $sText, 'variable'=> $variable, 'order'=> $order]);
                else
                $aProduct = \App\Models\Product::where('name', 'like', '%'.$sText.'%')->orWhereHas('Company', function(Builder $query)use($sText){$query->where('name', 'like', '%'.$sText.'%');})->paginate(10)->appends(['text'=> $sText, 'variable'=> $variable, 'order'=> $order]);
                return view('product.index',compact('aProduct'));
            }
        }
    }

