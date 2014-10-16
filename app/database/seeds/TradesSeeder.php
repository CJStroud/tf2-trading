<?php

class TradesSeeder extends Seeder  {
 
    public function run() 
    {
        DB::table('trades')->delete();
        
        Trade::create(['buy_price' => 2.33,
                       'item_name' => 'example-hat',
                       'sell_price' => 3,
                       'is_active' => false,
                       'buy_date' => 1413460039,
                       'sell_date' => 1413470039
                      ]);
        
        Trade::create(['buy_price' => 1.33,
                       'item_name' => 'example-hat',
                       'sell_price' => 2,
                       'is_active' => false,
                       'buy_date' => 1413460039,
                       'sell_date' => 1413470039
                      ]);

    }
    
}
