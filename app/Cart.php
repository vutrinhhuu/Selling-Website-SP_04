<?php

namespace App;

use  App\SizeColors;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	
	//add more than one product
	public function addWithAmount($item, $id,$id_size_color, $amount){
		$size_color = SizeColors::where('id',$id_size_color)->first();
		
		if($item->promotion_price == $item->unit_price){
			$giohang = ['size_color'=>$size_color, 'qty'=>0, 'price' => $item->unit_price, 'item' => $item];
		}
		else{
			$giohang = ['size_color'=>$size_color, 'qty'=>0, 'price' => $item->promotion_price, 'item' => $item];
		}
		if($this->items){
			if(array_key_exists($id_size_color, $this->items)){
				$giohang = $this->items[$id_size_color];
			}
		}
		$giohang['qty']+= $amount;
		if($item->promotion_price == $item->unit_price){
			$giohang['price'] = $item->unit_price * $giohang['qty'];
		}
		else{
			$giohang['price'] = $item->promotion_price * $giohang['qty'];
		}
		$this->items[$id_size_color] = $giohang;

		$this->totalQty+= $amount;
		if($item->promotion_price == $item->unit_price){
			$this->totalPrice+= $item->unit_price * $amount;
		}
		else{
			$this->totalPrice+= $item->promotion_price * $amount;
		}
		
	}
	

	//remove more than one product
	public function removeWithAmount($item, $id,$id_size_color, $amount){
		$size_color = SizeColors::where('id',$id_size_color)->first();
		
		if($item->promotion_price == $item->unit_price){
			$giohang = ['size_color'=>$size_color, 'qty'=>0, 'price' => $item->unit_price, 'item' => $item];
		}
		else{
			$giohang = ['size_color'=>$size_color, 'qty'=>0, 'price' => $item->promotion_price, 'item' => $item];
		}
		if($this->items){
			if(array_key_exists($id_size_color, $this->items)){
				$giohang = $this->items[$id_size_color];
			}
		}
		$giohang['qty']-= $amount;
		if($item->promotion_price == $item->unit_price){
			$giohang['price'] = $item->unit_price * $giohang['qty'];
		}
		else{
			$giohang['price'] = $item->promotion_price * $giohang['qty'];
		}
		$this->items[$id_size_color] = $giohang;

		$this->totalQty-= $amount;
		if($item->promotion_price == $item->unit_price){
			$this->totalPrice-= $item->unit_price * $amount;
		}
		else{
			$this->totalPrice-= $item->promotion_price * $amount;
		}
		
		
	}
	
	public function UpdateAmount($item, $id,$id_size_color, $amount){
		$size_color = SizeColors::where('id',$id_size_color)->first();

		if($item->promotion_price == $item->unit_price){
			$giohang = ['size_color'=>$size_color, 'qty'=>0, 'price' => $item->unit_price, 'item' => $item];
		}
		else{
			$giohang = ['size_color'=>$size_color, 'qty'=>0, 'price' => $item->promotion_price, 'item' => $item];
		}
		if($this->items){
			if(array_key_exists($id_size_color, $this->items)){
				$giohang = $this->items[$id_size_color];
			}
		}
		$old_amount = $giohang['qty'];
		$giohang['qty'] = $amount;

		if($item->promotion_price == $item->unit_price){
			$giohang['price'] = $item->unit_price * $giohang['qty'];
		}
		else{
			$giohang['price'] = $item->promotion_price * $giohang['qty'];
		}
		$this->items[$id_size_color] = $giohang;

		$this->totalQty+= $amount - $old_amount;
		if($item->promotion_price == $item->unit_price){
			$this->totalPrice+= $item->unit_price * ($amount-$old_amount);
		}
		else{
			$this->totalPrice+= $item->promotion_price * ($amount-$old_amount);
		}
		
	}
	
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}

	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}





}