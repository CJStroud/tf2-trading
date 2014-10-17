<?php

class Currency extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'currency';
    public static function ConvertTo($values, $outputType)
    {
        $scrapValue = 0;

		$totalValue = [];


        if (!is_array($values)) return 0;

        $currencies = Currency::all();

		if($outputType == null){
			$outputType = $currencies->first()->item_name;
		}
        foreach($currencies as $currency)
        {
			array_push($totalValue, ['$currency->item_name' => 0]);

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



        return Currency::ConvertFromScrap($scrapValue, $outputType);

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

	private static function ConvertFromScrap($scrapTotal, $outputType)
	{
		$output = Currency::where('item_name', '=', $outputType)->get()->first();
		$currencies = Currency::where('scrap_value', '<', $output->scrap_value)->orderBy('scrap_value', 'desc')->get();


		$outputValue = floor($scrapTotal / $output->scrap_value);
		$outputRemainder = fmod((float)$scrapTotal, (float)$output->scrap_value);
		$currencyValues = [$outputType => $outputValue];

		foreach($currencies as $currency)
		{
			$outputValue = floor($outputRemainder / $currency->scrap_value);
			$outputRemainder = fmod((float)$outputRemainder, (float)$currency->scrap_value);
			$currencyValues[$currency->item_name] = $outputValue;
		}

		return $currencyValues;
	}

}
