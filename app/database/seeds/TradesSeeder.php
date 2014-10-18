<?php

class TradesSeeder extends Seeder  {
 
    public function run() 
    {
        DB::table('trades')->delete();
        
        Trade::create(['buy_price' => 18,
                       'item_name' => 'example-hat',
                       'sell_price' => 30,
                       'buy_date' => 1413460039,
                      ]);
        
        Trade::create(['buy_price' => 12,
                       'item_name' => 'example-hat',
                       'sell_price' => 90,
                       'buy_date' => 1413460039,
                      ]);

        Trade::create(['buy_price' => 21,
                       'item_name' => 'example sold hat',
                       'sell_price' => 27,
                       'sold' => true,
                       'buy_date' => 1413460039,
                       'sell_date' => 1413470039
                      ]);

    }
    
}
