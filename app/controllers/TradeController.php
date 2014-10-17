<?php


class TradeController extends \BaseController {

    public $layout = 'layouts.master';
    
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $trades = Trade::all();
        
        $this->layout->content = View::make('trades.index')->withTrades($trades);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $this->layout->content = View::make('trades.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

        $validator = Validator::make(Input::all(),
                                     ['item_name' => 'required',
                                     'buy_price_scrap' => 'numeric|min:0',
                                     'buy_price_reclaimed' => 'numeric|min:0',
                                     'buy_price_refined' => 'numeric|min:0',
                                     'sell_price_scrap' => 'numeric|min:0',
                                     'sell_price_reclaimed' => 'numeric|min:0',
                                     'sell_price_refined' => 'numeric|min:0',
                                     'buy_date' => 'required|date_format:d/m/Y'
                                     ]);

        // dd($validator->messages());

        if ($validator->fails())
        {
            return Redirect::route('trade.create')->with('errors', $validator->messages());
        }

        $trade = new Trade();

        $trade->item_name = Input::get('item_name');

        $buyValues = ['scrap' => Input::get('buy_price_scrap'),
                   'reclaimed' => Input::get('buy_price_reclaimed'),
                   'refined' => Input::get('buy_price_refined')];

        $buyScrapValue = Currency::ConvertCurrency($buyValues);

        $sellValues = ['scrap' => Input::get('sell_price_scrap'),
                   'reclaimed' => Input::get('sell_price_reclaimed'),
                   'refined' => Input::get('sell_price_refined')];

        $sellScrapValue = Currency::ConvertCurrency($sellValues);

        $trade->buy_price = $buyScrapValue;
        $trade->sell_price = $sellScrapValue;
        date_default_timezone_set('Europe/London');

        $dateTime = DateTime::createFromFormat("d/m/Y", Input::get('buy_date'));
        $timeStamp = $dateTime->getTimeStamp();

        $trade->buy_date = $timeStamp;

        $trade->save();

		return Redirect::route('trade.index');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$trade = Trade::find($id);

		$trade->delete();

		return Redirect::back();
	}


}
