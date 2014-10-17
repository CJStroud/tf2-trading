<?php

class Currency extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'currency';
    public static function ConvertCurrency($values)
    {
        $scrapValue = 0;

        if (!is_array($values)) return 0;

        $currencies = Currency::all();

        foreach($currencies as $currency)
        {
            $itemType = $currency->item_name;
            if (array_key_exists($itemType, $values))
            {
                $quantity = $values[$itemType];
                if ($quantity != null && $quantity > 0)
                {
                    $scrapValue += Currency::ConvertToScrap($quantity, $itemType);
                }
            }

        }

        return $scrapValue;

    }


    private static function ConvertToScrap($itemQuantity, $itemType)
    {
        $currency = Currency::where('item_name', '=', $itemType)->get()->first();

        if($currency != null)
        {
            return (int) $currency->scrap_value * (int) $itemQuantity;
        }
        return 0;
    }

}
