<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Cart
{
    // use HasFactory;

    public $items=[];
    public $totalQty;
    public $totalprice;

    public function __Construct($cart=null) {
        if($cart) {
            $this->items=$cart->items;
            $this->totalQty=$cart->totalQty;
            $this->totalprice=$cart->totalprice;
        }
        else {
            $this->items=[];
            $this->totalQty=0;
            $this->totalprice=0;
        }
    }
    public function add($meal)
    {
        $item=[
            "id"=>$meal->id,
            "meal_name"=>$meal->meal_name,
            "price"=>$meal->price,
            "image"=>$meal->image,
            "qty"=>0,
        ];
        if(!array_key_exists($meal->id,$this->items)) {
            $this->items[$meal->id]=$item;
            $this->totalQty +=1;
            $this->totalprice +=$meal->price;
        }
        else {
            $this->totalQty +=1;
            $this->totalprice +=$meal->price;
        }
        $this->items[$meal->id]['qty'] +=1;
    }
    public function remove($id)
    {
        if(array_key_exists($id,$this->items))
        {
            $this->totalQty -=$this->items[$id]['qty'];
            $this->totalprice -=$this->items[$id]['qty'] * $this->items[$id]['price'];
            unset($this->items[$id]);

        }
    }

    public function updateQty($id,$qty)
    {
        //reset qty and price in the cart
        $this->totalQty -=$this->items[$id]['qty'];
        $this->totalprice -=$this->items[$id]['price'] * $this->items[$id]['qty'];

        //add the item with new qty
        $this->items[$id]['qty']=$qty;

        //total price and total qty in cart
        $this->totalQty +=$qty;
        $this->totalprice +=$this->items[$id]['price'] * $qty;

    }

}
