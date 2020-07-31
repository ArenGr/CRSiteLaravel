<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscribersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscribers')->insert([
            [
                'email'=>'ispiryan.alber@yandex.ru',
                'recipient_id'=>'aXNwaXJ5YW4uYWxiZXJAeWFuZGV4LnJ1',
                'created_at'=>'2018-11-15 08:01:19'
            ],
            [
                'email'=>'icarhunnem@gmail.com',
                'recipient_id'=>'aWNhcmh1bm5lbUBnbWFpbC5jb20=',
                'created_at'=>'2018-11-15 08:04:31'
            ],
            [
                'email'=>'ispiryan.alber@gmail.com',
                'recipient_id'=>'aXNwaXJ5YW4uYWxiZXJAZ21haWwuY29t',
                'created_at'=>'2018-11-15 08:05:46'
            ],
            [
                'email'=>'gargantuaal@gmail.com',
                'recipient_id'=>'Z2FyZ2FudHVhYWxAZ21haWwuY29t',
                'created_at'=>'2018-11-16 10:59:42'
            ],
            [
                'email'=>'anna10ggg@gmail.com',
                'recipient_id'=>'YW5uYTEwZ2dnQGdtYWlsLmNvbQ==',
                'created_at'=>'2018-11-20 13:45:10'
            ],
            [
                'email'=>'adcdscghfckv@mail.ru',
                'recipient_id'=>'YWRjZHNjZ2hmY2t2QG1haWwucnU=',
                'created_at'=>'2018-11-23 06:52:40'
            ],
            [
                'email'=>'haruttosunyan@gmail.com',
                'recipient_id'=>'aGFydXR0b3N1bnlhbkBnbWFpbC5jb20=',
                'created_at'=>'2018-12-24 14:37:00'
            ],
            [
                'email'=>'artamirkhanyan@gmail.com',
                'recipient_id'=>'YXJ0YW1pcmtoYW55YW5AZ21haWwuY29t',
                'created_at'=>'2019-01-07 12:35:01'
            ]
        ]);
    }
}
