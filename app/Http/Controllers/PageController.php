<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slide;
use App\Product;
use App\ProductType;

use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use Response;
use Cart;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
   public function getIndex(){

   	$slide = Slide::all();
   	$new_product = Product::where('new',1)->paginate(4);
      $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
   	return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
   }
   public function getLoaisanpham($type){
      $type_product =  Product::where('id_type',$type)->get()->chunk(3);
      
      $sanpham_khac = Product::where('id_type','<>',$type)->paginate(3);
      $loai = ProductType::where('id',$type)->get();
      $danhmuc= ProductType::all();
   	return view('page.loai_sanpham',compact('type_product','loai','sanpham_khac','danhmuc'));
   }
   public function getChitietsanpham($sp){
      $sanpham = Product::where('id',$sp)->first();
      $sanpham_khac = Product::where('id','<>',$sp)->simplePaginate(3);
      $sp_new = Product::where('new',1)->inRandomOrder()->paginate(3);
      $sp_sell = Product::where('promotion_price','<>',0)->inRandomOrder()->paginate(3);
   	return view('page.chitiet_sanpham',compact('sanpham','sanpham_khac','sp_new','sp_sell'));
   }
   public function getDangky(){
   	return view('page.dangky');
   }
   
   public function getLienhe(){
   	return view('page.lienhe');
   }
   public function getGioithieu(){
   	return view('page.gioithieu');
   }

   public function getAddtoCart(Request $req, $id){

      $product = Product::find($id);

      $giohang = Cart::add(['id' => $id, 'name' => $product->name, 'qty' => 1, 'price' => $product->unit_price,'options' => ['image' => $product->image]]);
       /*$this->data['title'] = 'Giỏ hàng của bạn';
       $cartInfo = [
                'id' => $id,
                'name' => $product->name,
                'price' => $product->unit_price,
                'qty' => '1'
            ];
   
     
     Cart::add($cartInfo);
     
         
      $cart = Cart::content();
      $this->data['cart'] = $cart;
      dd($cart);*/
      
   /*   $oldCart = Session('cart')?Session::get('cart'):null;
      $cart = new Cart($oldCart);
      $cart->add($product,$id);*/
    
     /* return Response::json($product);*/
      /*return redirect()->route('index');*/
      
      return view('page.header_content_dow');  
   }

   public function getUpdateQty($id,$qty){
      $rowId = $id;
      $sl = $qty;
      Cart::update($rowId, $sl);
      return view('page.order_content');
   }

   public function getDeleteItemCart($id){
      $rowId = $id;
      Cart::remove($rowId);
      
      return view('page.header_content_dow');
   }
   public function removeProduct($id){
      $rowId = $id;
      Cart::remove($rowId);
      
      return view('page.order_content');
   } 

   public function getDathang(){
      return view('page.dat_hang');
   }
   public function postDathang(Request $req){
      if (!Auth::check()) {
         return view('admin.login');
      } 
      else { 
         $total = Cart::subtotal();
         $cart = Cart::content();
         $customer = new Customer;
         $customer->name = $req->name;
         $customer->gender = $req->gender;
         $customer->email = $req->email;
         $customer->address = $req->address;
         $customer->phone_number = $req->phone;
         $customer->note =$req->notes;
         $customer->save();
         $bill = new Bill;
         $bill->id_customer = $customer->id;
         $bill->date_order = date('Y-m-d');
         $bill->total = $total;
         $bill->payment = 'COD';
         $bill->note =$req->notes;
         $bill->save();

         foreach ($cart as $key => $value) {
         $bill_detail = new BillDetail;
         $bill_detail->id_bill = $bill->id;
         $bill_detail->id_product = $value->id;
         $bill_detail->quantity = $value->qty;
         $bill_detail->unit_price= $value->price;
         $bill_detail->save();


         }
         Session::forget('cart');
         /*return redirect()->route('index');*/
         return redirect()->route('index')->with('thongbao','Order Successfully');  
      } 
   }


   public function get_Timkiem(Request $req){
      $tukhoa = $req->tukhoa;

      $timkiem = Product::where('name','like',"%$tukhoa%")->paginate(10);


      return view('page.timkiem',compact('tukhoa','timkiem'));
   }
   


}

