<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Product extends Component
{
    /**
     * Create a new component instance.
     */


    public function __construct(public \App\Models\Product $product, public bool $bIndexOrShow)
    {
        $this->product = $product;
        $this->bIndexOrShow = $bIndexOrShow;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.product', [
            'product' => $this->product,
            'bIndexOrShow' => $this->bIndexOrShow,
        ]);
    }
}
