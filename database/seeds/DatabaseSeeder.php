<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call(ProductType::class);
        $this->call(Product::class);
        $this->call(BillDetail::class);
        $this->call(Bill::class);
        $this->call(Customer::class);
        $this->call(Users::class);
        $this->call(Slide::class);
        $this->call(News::class);
    }


}

class ProductType extends Seeder{

	public function run(){
		DB::table('type_products')->insert([
			['name'=>'Women','description'=>'Quần áo Nữ','image'=>'abc.jpg'],
			['name'=>'Men','description'=>'Quần áo Nam','image'=>'abc.jpg'],
			['name'=>'Bag','description'=>'Túi','image'=>'abc.jpg'],
			['name'=>'Shoes','description'=>'Giày','image'=>'abc.jpg'],
			['name'=>'Watches','description'=>'Đồng Hồ','image'=>'abc.jpg'],
			

		]);
	}
}

class Product extends Seeder{

	public function run(){
		DB::table('products')->insert([
			['name'=>'Esprit Ruffle Shirt','id_type'=>'1','description'=>'Quần áo nữ chất đẹp','unit_price'=>'32','promotion_price'=>'11','image'=>'product-01.jpg','unit'=>'chiếc','new'=>'1'],
			['name'=>'Herschel supply ','id_type'=>'1','description'=>'Quần áo nữ chất đẹp','unit_price'=>'30','promotion_price'=>'10','image'=>'product-02.jpg','unit'=>'chiếc','new'=>'1'],
			['name'=>'Only Check Trouser ','id_type'=>'2','description'=>'Quần áo nữ chất đẹp','unit_price'=>'28','promotion_price'=>'15','image'=>'product-03.jpg','unit'=>'chiếc','new'=>'1'],
			['name'=>'Classic Trench Coat ','id_type'=>'1','description'=>'Quần áo nữ chất đẹp','unit_price'=>'40','promotion_price'=>'20','image'=>'product-04.jpg','unit'=>'chiếc','new'=>'1'],
			
			['name'=>'Front Pocket Jumper ','id_type'=>'1','description'=>'Quần áo nữ chất đẹp','unit_price'=>'23','promotion_price'=>'15','image'=>'product-05.jpg','unit'=>'chiếc','new'=>'1'],
			['name'=>'Vintage Inspired Classic ','id_type'=>'5','description'=>'Quần áo nữ chất đẹp','unit_price'=>'42','promotion_price'=>'21','image'=>'product-06.jpg','unit'=>'chiếc','new'=>'1'],
			['name'=>'Shirt in Stretch Cotton ','id_type'=>'1','description'=>'Quần áo nữ chất đẹp','unit_price'=>'21','promotion_price'=>'33','image'=>'product-07.jpg','unit'=>'chiếc','new'=>'1'],
			['name'=>'Pieces Metallic Printed ','id_type'=>'1','description'=>'Quần áo nữ chất đẹp','unit_price'=>'24','promotion_price'=>'52','image'=>'product-08.jpg','unit'=>'chiếc','new'=>'1'],
			
			['name'=>'Converse All Star Hi Plimsolls ','id_type'=>'4','description'=>'Quần áo nữ chất đẹp','unit_price'=>'23','promotion_price'=>'0','image'=>'product-09.jpg','unit'=>'chiếc','new'=>'0'],
			['name'=>'Femme T-Shirt In Stripe ','id_type'=>'1','description'=>'Quần áo nữ chất đẹp','unit_price'=>'51','promotion_price'=>'0','image'=>'product-10.jpg','unit'=>'chiếc','new'=>'0'],
			['name'=>'Herschel supply ','id_type'=>'1','description'=>'Quần áo nữ chất đẹp','unit_price'=>'11','promotion_price'=>'0','image'=>'product-11.jpg','unit'=>'chiếc','new'=>'0'],
			['name'=>'Herschel supply ','id_type'=>'3','description'=>'Quần áo nữ chất đẹp','unit_price'=>'22','promotion_price'=>'0','image'=>'product-12.jpg','unit'=>'chiếc','new'=>'0'],
			['name'=>'T-Shirt with Sleeve ','id_type'=>'1','description'=>'Quần áo nữ chất đẹp','unit_price'=>'44','promotion_price'=>'0','image'=>'product-13.jpg','unit'=>'chiếc','new'=>'0'],
			['name'=>'Pretty Little Thing ','id_type'=>'1','description'=>'Quần áo nữ chất đẹp','unit_price'=>'51','promotion_price'=>'0','image'=>'product-14.jpg','unit'=>'chiếc','new'=>'0'],
			['name'=>'Mini Silver Mesh Watch ','id_type'=>'5','description'=>'Quần áo nữ chất đẹp','unit_price'=>'36','promotion_price'=>'0','image'=>'product-15.jpg','unit'=>'chiếc','new'=>'0'],
			['name'=>'Square Neck Back ','id_type'=>'1','description'=>'Quần áo nữ chất đẹp','unit_price'=>'32','promotion_price'=>'51','image'=>'product-16.jpg','unit'=>'chiếc','new'=>'0'],
			

		]);
	}
}

class BillDetail extends Seeder{

	public function run(){
		DB::table('bill_detail')->insert([
			['id_bill'=>'1','id_product'=>'1','quantity'=>'3','unit_price'=>'33'],
			['id_bill'=>'2','id_product'=>'2','quantity'=>'3','unit_price'=>'30'],
			['id_bill'=>'3','id_product'=>'1','quantity'=>'3','unit_price'=>'33'],
			['id_bill'=>'4','id_product'=>'3','quantity'=>'3','unit_price'=>'45'],
			['id_bill'=>'5','id_product'=>'4','quantity'=>'3','unit_price'=>'60'],
			['id_bill'=>'6','id_product'=>'5','quantity'=>'3','unit_price'=>'45'],

		]);
	}
}

class Bill extends Seeder{

	public function run(){
		DB::table('bills')->insert([
			['id_customer'=>'1','date_order'=>'2018-07-06','total'=>'33','payment'=>'COD','note'=>'không được kiểm hàng'],
			['id_customer'=>'2','date_order'=>'2018-07-06','total'=>'30','payment'=>'COD','note'=>'không được kiểm hàng'],
			['id_customer'=>'3','date_order'=>'2018-07-06','total'=>'33','payment'=>'COD','note'=>'không được kiểm hàng'],
			['id_customer'=>'4','date_order'=>'2018-07-06','total'=>'45','payment'=>'COD','note'=>'không được kiểm hàng'],
			['id_customer'=>'5','date_order'=>'2018-07-06','total'=>'60','payment'=>'COD','note'=>'không được kiểm hàng'],
			['id_customer'=>'6','date_order'=>'2018-07-06','total'=>'45','payment'=>'ATM','note'=>'không được kiểm hàng'],
		]);
	}
}

class Customer extends Seeder{

	public function run(){
		DB::table('customer')->insert([
			['name'=>'nguyễn văn a','gender'=>'Nam','email'=>'phamthanhhung95tn@gmail.com','address'=>'Thái Nguyên','phone_number'=>'01627113888','note'=>'Giao hàng đúng hẹn'],
			['name'=>'nguyễn văn b','gender'=>'Nữ','email'=>'phamthanhhung95tn@gmail.com','address'=>'Thái Nguyên','phone_number'=>'01627113888','note'=>'Giao hàng đúng hẹn'],
			['name'=>'nguyễn văn c','gender'=>'Nữ','email'=>'phamthanhhung95tn@gmail.com','address'=>'Thái Nguyên','phone_number'=>'01627113888','note'=>'Giao hàng đúng hẹn'],
			['name'=>'nguyễn văn d','gender'=>'Nam','email'=>'phamthanhhung95tn@gmail.com','address'=>'Thái Nguyên','phone_number'=>'01627113888','note'=>'Giao hàng đúng hẹn'],
			['name'=>'nguyễn văn e','gender'=>'Nữ','email'=>'phamthanhhung95tn@gmail.com','address'=>'Thái Nguyên','phone_number'=>'01627113888','note'=>'Giao hàng đúng hẹn'],
			['name'=>'nguyễn văn f','gender'=>'Nam','email'=>'phamthanhhung95tn@gmail.com','address'=>'Thái Nguyên','phone_number'=>'01627113888','note'=>'Giao hàng đúng hẹn'],
			
		]);
	}
}

class Users extends Seeder{

	public function run(){
		DB::table('users')->insert([
			['full_name'=>'chiperlove','email'=>'phamthanhhung95tn@gmail.com','password'=>bcrypt('123456'),'phone'=>'01627113888','address'=>'Thái Nguyên','quyen'=>'1','remember_token'=>''],
			['full_name'=>'chiperlove2','email'=>'phamthanhhung91tn@gmail.com','password'=>bcrypt('123456'),'phone'=>'01627113888','address'=>'Thái Nguyên','quyen'=>'1','remember_token'=>''],
			['full_name'=>'chiperlove3','email'=>'phamthanhhung92tn@gmail.com','password'=>bcrypt('123456'),'phone'=>'01627113888','address'=>'Thái Nguyên','quyen'=>'1','remember_token'=>''],
			['full_name'=>'chiperlove4','email'=>'phamthanhhung93tn@gmail.com','password'=>bcrypt('123456'),'phone'=>'01627113888','address'=>'Thái Nguyên','quyen'=>'1','remember_token'=>''],
			['full_name'=>'chiperlove5','email'=>'phamthanhhung94tn@gmail.com','password'=>bcrypt('123456'),'phone'=>'01627113888','address'=>'Thái Nguyên','quyen'=>'1','remember_token'=>''],
			['full_name'=>'chiperlove6','email'=>'phamthanhhung96tn@gmail.com','password'=>bcrypt('123456'),'phone'=>'01627113888','address'=>'Thái Nguyên','quyen'=>'1','remember_token'=>''],
			['full_name'=>'chiperlove7','email'=>'phamthanhhung97tn@gmail.com','password'=>bcrypt('123456'),'phone'=>'01627113888','address'=>'Thái Nguyên','quyen'=>'1','remember_token'=>''],
			['full_name'=>'chiperlove8','email'=>'phamthanhhung98tn@gmail.com','password'=>bcrypt('123456'),'phone'=>'01627113888','address'=>'Thái Nguyên','quyen'=>'1','remember_token'=>''],

			
			
		]);
	}
}

class Slide extends Seeder{

	public function run(){
		DB::table('slide')->insert([
			['link'=>'','image'=>'slide01.jpg'],
			['link'=>'','image'=>'slide02.jpg'],
			['link'=>'','image'=>'slide03.jpg'],
			['link'=>'','image'=>'slide04.jpg'],
			['link'=>'','image'=>'slide05.jpg'],
			['link'=>'','image'=>'slide06.jpg'],
			['link'=>'','image'=>'slide07.jpg'],
			
		]);
	}
}

class News extends Seeder{

	public function run(){
		DB::table('news')->insert([
			['title'=>'Mùa trung thu năm nay,','content'=>'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ','image'=>'sample1.jpg'],
			['title'=>'Mùa trung thu năm nay,','content'=>'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ','image'=>'sample2.jpg'],
			['title'=>'Mùa trung thu năm nay,','content'=>'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ','image'=>'sample3.jpg'],
			['title'=>'Mùa trung thu năm nay,','content'=>'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ','image'=>'sample4.jpg'],
			
			
		]);
	}
}

