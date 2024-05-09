<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'question' => 'Account ဖွင့်လျှင်ဘာတွေလိုမလဲ',
            'answer' => 'မိမိကိုယ်ပိုင် email သို့မဟုတ် ဖုန်းနံပါတ်ဖြင့် register ပြုလုပ်အသုံးပြုနိုင်မည်ဖြစ်ပါသည်။'
        ]);

        Faq::create([
            'question' => 'ဘယ်လိုငွေပေးချေနိုင်မလဲ',
            'answer' => 'အိမ်ရောက်ငွေချေဖြစ်စေ၊ Mobile Money များနှင့်ဖြစ်စေ အဆင်ပြေလွယ်ကူစွာပေးချေနိုင်ပါသည်။'
        ]);

        Faq::create([
            'question' => 'Order Cancel လုပ်လို့ရမလား',
            'answer' => 'Refund/ Return တော့လုပ်လို့မရပါ။'
        ]);

        Faq::create([
            'question' => 'Order ဘယ်လိုမှာမလဲ',
            'answer' => 'အောက်ပါ လုပ်ငန်းစဉ်အတိုင်း Order မှာယူနိုင်ပါသည်။ ဖတ်ရှုလိုသောစာအုပ်ကိုရွေးပါ။ Add to card ကိုနိပ်ပြီး ခြင်းတောင်းထဲထည့်ပါ။ Checkout ကိုနိပ်ပြီး အဆင့်အတိုင်းသွားပေးပါ'
        ]);
    }
}
