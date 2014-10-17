<h3 class="title">Trades</h3>

<div class="row row-table-header hidden-xs">
        <div class='col-sm-3 col-xs-12'>
			<p>Item Name</p>
        </div>

        <div class='col-sm-3 col-xs-12'>
			<p>Buy Price</p>
        </div>

        <div class='col-sm-3 col-xs-12'>
			<p>Sell Price</p>
        </div>

    </div>

@foreach($trades as $trade)

    <div class="row trades-row">
        <div class='col-sm-3 col-xs-12'>
            <p>{{$trade->item_name}}</p>
        </div>

        <div class='col-sm-3 col-xs-12'>
            <p>{{$trade->buy_price}}</p>
        </div>

        <div class='col-sm-3 col-xs-12'>
            <p>{{$trade->sell_price}}</p>
        </div>

    </div>

@endforeach
