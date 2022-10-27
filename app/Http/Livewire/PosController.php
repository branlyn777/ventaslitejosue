<?php

namespace App\Http\Livewire;

use App\Models\Denomination;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Component;

class PosController extends Component
{
    public $total=10, $itemsQuantity=1, $cart =[], $denominations = [], $efectivo, $change;



    public function render()
    {
         $this->denominations = Denomination::all();
         return view('livewire.pos.component')
            
        
            ->extends('layouts.theme.app')
            ->section('content');  
    }

    /* public function ACash($value){
        if($this->efectivo == "")
        {
            $this->efectivo = 0;
        }
        $this->efectivo += ($value == 0 ? $this->total : $value);
        $this->change = ($this->efectivo - $this->total);
    } */
}
