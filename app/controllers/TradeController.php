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

        foreach($trades as $trade)
        {
            $currency = Currency::find(Session::get('currency'));
            if($currency != null){
                $trade->buy_price = substr((string)($trade->buy_price / $currency->scrap_value), 0, 4);
                $trade->sell_price = substr((string)($trade->sell_price / $currency->scrap_value), 0, 4);
            }
            else {
                $trade->buy_price = (string)((float)$trade->buy_price);
                $trade->sell_price = (string)((float)$trade->sell_price);
            }
        }
        $this->layout->showCurrencySelector = true;
        $this->layout->title = 'Trades';
        $this->layout->content = View::make('trades.index')->withTrades($trades);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->layout->title = 'New Trade';
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

        $buyScrapValue = Currency::ConvertTo($buyValues, 'scrap');

        $sellValues = ['scrap' => Input::get('sell_price_scrap'),
                    'reclaimed' => Input::get('sell_price_reclaimed'),
                    'refined' => Input::get('sell_price_refined')];

        $sellScrapValue = Currency::ConvertTo($sellValues, 'scrap');

        $trade->buy_price = $buyScrapValue['scrap'];
        $trade->sell_price = $sellScrapValue['scrap'];
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
        $trade = Trade::find($id);

        $trade->buy_price = json_decode(json_encode(Currency::ConvertTo(['scrap' => $trade->buy_price], 'refined')));
        $trade->sell_price = json_decode(json_encode(Currency::ConvertTo(['scrap' => $trade->sell_price], 'refined')));

        $trade->buy_date = ($trade->buy_date > 1000000) ? date('d/m/Y', $trade->buy_date) : '';
        $trade->sell_date = ($trade->sell_date > 1000000) ? date('d/m/Y', $trade->sell_date) : '';

        $this->layout->title = 'Edit Trade - ' . $trade->item_name;
        $this->layout->content = View::make('trades.edit')->withTrade($trade);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
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


        if ($validator->fails())
        {
            return Redirect::back()->with('errors', $validator->messages());
        }

        $trade = Trade::find($id);

        $trade->item_name = Input::get('item_name');

        $buyValues = ['scrap' => Input::get('buy_price_scrap'),
                    'reclaimed' => Input::get('buy_price_reclaimed'),
                    'refined' => Input::get('buy_price_refined')];

        $buyScrapValue = Currency::ConvertTo($buyValues, 'scrap');

        $sellValues = ['scrap' => Input::get('sell_price_scrap'),
                    'reclaimed' => Input::get('sell_price_reclaimed'),
                    'refined' => Input::get('sell_price_refined')];

        $sellScrapValue = Currency::ConvertTo($sellValues, 'scrap');

        $trade->buy_price = $buyScrapValue['scrap'];
        $trade->sell_price = $sellScrapValue['scrap'];
        date_default_timezone_set('Europe/London');

        $dateTime = DateTime::createFromFormat("d/m/Y", Input::get('buy_date'));
        $timeStamp = $dateTime->getTimeStamp();

        $trade->buy_date = $timeStamp;

        $dateTime = DateTime::createFromFormat("d/m/Y", Input::get('sell_date'));
        $timeStamp = $dateTime->getTimeStamp();

        $trade->sell_date = $timeStamp;

        $trade->save();
        return Redirect::route('trade.index');
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

        return Redirect::route('trade.index');	}

    public function currency()
    {
        Session::put('currency', Input::get('currency'));

        return Redirect::back();
    }

    public function sold($id)
    {
        $trade = Trade::find($id);

        $trade->sold = true;
        $trade->sell_date = time();

        $trade->save();

        return Redirect::back();
    }


}
