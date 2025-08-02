<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Contact; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Categoryを直接作成
        $categories = [
            '1.商品についてのご質問',
            '2.在庫・入荷に関するお問い合わせ', 
            '3.配送・納期に関するお問い合わせ',
            '4.注文内容の確認・変更',
            '5.返品・交換について',
            '6.支払いに関するお問い合わせ',
            '7.アカウントに関するお問い合わせ',
            '8.不具合・故障に関するお問い合わせ',
            '9.キャンペーン・クーポンに関するお問い合わせ',
            '10.その他',
        ];

        foreach ($categories as $content) {
            Category::create(['content' => $content]);
        }
        
        // Contactでは既存のCategoryを使用
        Contact::factory(100)->create();
    }
}
