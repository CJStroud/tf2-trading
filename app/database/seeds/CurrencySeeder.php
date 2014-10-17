<?php

class CurrencySeeder extends Seeder  {

    public function run()
    {
        DB::table('currency')->delete();

        Currency::create(['item_name' => 'scrap',
                       'scrap_value' => 1, ]);

        Currency::create(['item_name' => 'reclaimed',
                       'scrap_value' => 3, ]);

        Currency::create(['item_name' => 'refined',
                       'scrap_value' => 9, ]);

		Currency::create(['item_name' => 'key',
                       'scrap_value' => 81, ]);
    }

}
