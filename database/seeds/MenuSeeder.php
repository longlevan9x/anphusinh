<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 * @return void
	 * @throws Exception
	 */
	public function run() {
		$menu             = new \App\Models\Menu;
		$menu->title      = "Tin Tức";
		$menu->is_active  = 1;
		$menu->slug       = 'tin-tuc';
		$menu->sort_order = 1;
		$menu->save();

		$menu             = new \App\Models\Menu;
		$menu->title      = "Sản phẩm";
		$menu->is_active  = 1;
		$menu->slug       = 'san-pham';
		$menu->sort_order = 1;
		$menu->save();

		$menu             = new \App\Models\Menu;
		$menu->title      = "Các loại bệnh";
		$menu->is_active  = 1;
		$menu->type       = 'category';
		$menu->slug       = '#';
		$menu->sort_order = 1;
		$menu->save();

		$menu             = new \App\Models\Menu;
		$menu->title      = "Chia sẻ của mẹ";
		$menu->slug       = 'chia-se';
		$menu->sort_order = 2;
		$menu->is_active  = 1;
		$menu->save();

		$menu             = new \App\Models\Menu;
		$menu->title      = "Chuyên gia";
		$menu->slug       = 'chuyen-gia';
		$menu->sort_order = 2;
		$menu->is_active  = 1;
		$menu->save();

		$menu             = new \App\Models\Menu;
		$menu->title      = "Hỏi đáp";
		$menu->slug       = 'hoi-dap';
		$menu->sort_order = 2;
		$menu->is_active  = 1;
		$menu->save();

		$menu             = new \App\Models\Menu;
		$menu->title      = "Hệ thống nhà thuốc";
		$menu->slug       = 'he-thong-nha-thuoc';
		$menu->sort_order = 2;
		$menu->is_active  = 1;
		$menu->save();

		$menu             = new \App\Models\Menu;
		$menu->title      = "Đặt hàng";
		$menu->slug       = 'dat-hang';
		$menu->sort_order = 2;
		$menu->is_active  = 1;
		$menu->save();
	}
}
