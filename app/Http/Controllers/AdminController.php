<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ProductType;
use App\Product;
use App\User;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\Http\Requests\loginRequest;
class AdminController extends Controller
{
    // loại sản phẩm
    public function getList_lsp()
    {
    	$loaisanpham = ProductType::paginate(10);

    	return view('admin.loaisanpham.list_loaisanpham',compact('loaisanpham'));
    }
    //thêm loai sản phẩm
    public function getAddlsp()
    {
    	return view('admin.loaisanpham.add_loaisanpham');
    }

    public function postAdd_lsp(Request $req){

        $add_lsp = new ProductType;
        $add_lsp->name = $req->name;
        $add_lsp->description = $req->description;
        $add_lsp->image = 'khong can';
        $add_lsp->save();
        return redirect()->back()->with('thanhcong','Thêm thành công');
    }

    //sửa loại sản phẩm
    public function getEdit_lsp($id)
    {
        $loaisanpham = ProductType::find($id);
    	return view('admin.loaisanpham.edit_loaisanpham',compact('loaisanpham'));
    }

    public function postEdit_lsp(Request $req,$id){
        $lsp = ProductType::find($id);

        $lsp->name = $req->name;
        $lsp->description = $req->description;
        $lsp->save();
        return redirect()->back()->with('suathanhcong','Sửa thành công');
        
    }

    public function getDelete_lsp($id){
            ProductType::find($id)->delete();
            return redirect()->back();
    }

    // sản phẩm
    public function getList_sp()
    {
    	/*$sanpham = Product::select(DB::raw('products.*, type_products.name AS typeName'))
             ->leftJoin('type_products', 'products.id_type', '=', 'type_products.id')
             ->get();
    	
        
        dd($sanpham);*/
        $sanpham = Product::paginate(10);
    	return view('admin.sanpham.list_sp',compact('sanpham'));
    }
    public function getAdd_sp()
    {
        $loaisanpham =  ProductType::all();
        
    	return view('admin.sanpham.add_sp',compact('loaisanpham'));
    }

    public function postAdd_sp(Request $req){   
        
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            if ($file->getClientMimeType('image') == ("image/jpeg"&&"image/png"))
            {
                $fullfile=$file->getClientOriginalName('image');
                $file->move('source/image/product',$fullfile);
            
            }
        }
        $add_sp = new Product;   
        $add_sp->name = $req->name;
        $add_sp->id_type = $req->loai;
        $add_sp->unit_price = $req->unit_price;
        $add_sp->promotion_price = $req->promotion_price;
        $add_sp->description = $req->description;
        $add_sp->image = $fullfile;
        $add_sp->unit = $req->unit;
        $add_sp->new = $req->tinhtrang;
        $add_sp->save();
        return redirect()->back()->with('thanhcong','Thêm sản phẩm thành công');
    }
    public function getEdit_sp($id)
    {

        $sanpham = Product::where('id',$id)->first();
        
        $loaisanpham = ProductType::all();
        
    	return view('admin.sanpham.edit_sp',compact('sanpham','loaisanpham'));
    }

    public function postEdit_sp(Request $req, $id){
       
            $sp = Product::find($id); 


            
            if ($req->hasFile('image')) {
            $file = $req->file('image');
            if ($file->getClientMimeType('image') == ("image/jpeg"&&"image/png"))
                {
                $fullfile=$file->getClientOriginalName('image');
                $file->move('source/image/product',$fullfile);
            
                }
            }
            $sp->name = $req->name;
            $sp->id_type =$req->loai;
            $sp->description = $req->description;
            $sp->unit_price = $req->unit_price;
            $sp->promotion_price = $req->promotion_price;
            $sp->unit = $req->unit;
            if (empty($req->image)==true) {
                $sp->image = $sp->image;
            }
            else {
                 $sp->image = $fullfile;
             } 
              
          
            $sp->new = $req->tinhtrang;  
            $sp->save();
            return redirect()->back()->with('edit_sp','Sửa thành công');    

    }

    public function getDelete_sp($id){
        Product::find($id)->delete();
        return redirect()->back()->with('delete_sp','Đã xóa') ;
    }
    //user
    public function getList_user()
    {	
    	$user = User::orderBy('full_name','asc')->paginate(10);

    	return view('admin.user.list_users',compact('user'));
    }
    public function getAdd_user()
    {
    	return view('admin.user.add_users');
    }
    public function postAdd_user(loginRequest $req){
        $user = new User;
        $user->full_name = $req->name;
        $user->email = $req->email;
        $user->password = bcrypt($req->passwordAgain);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->remember_token = 'chưa có ';
        $user->quyen = $req->quyen;
        $user->remember_token = $req->_token;
        $user->save();
        return redirect()->back()->with('add_user','Bạn đã tạo tài khoản thành công');
       
    }   
    public function getDelete_user($id){

        User::find($id)->delete();
        $user = User::orderBy('full_name','asc')->paginate(10);
        return view('admin.user.content-delete-user',compact('user'));


    }
    public function getEdit_user($id)
    {
        $user = User::find($id);
    	return view('admin.user.edit_users',compact('user'));
    }


    public function postEdit_user(Request $req,$id){
        $user = User::find($id);
        
       
        $user->phone =$req->phone;
        $user->address =$req->address;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->quyen = $req->quyen;
        $user->remember_token = $req->_token;
        $user->save();

        return redirect()->back()->with('edit_user','Sửa thành công');

    }

    //Đơn hàng

    public function getList_donhang(){

        $bill = Bill::all();
        
        return view('admin.donhang.list_donhang',compact('bill'));
    }

    public function getDetail_donhang($id){
        $khachhang = Bill::find($id);
        $sanpham = BillDetail::where('id_bill',$id)->get();

        // dd($sanpham);
        
        
        return view('admin.donhang.detail_donhang',compact('khachhang','sanpham'));
    }
    public function getDelete_donhang($id){
            
            BillDetail::where('id_bill',$id)->delete();
            $delete = Bill::find($id);

            $dd =$delete->id_customer;
            Customer::where('id',$dd)->delete();
            Bill::find($id)->delete();
            return redirect()->back();
            
    }

}
