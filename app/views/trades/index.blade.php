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
		<a class="row-link" href="{{ route('trade.show', ['trade' => $trade->id] ) }}">
			<div class='col-sm-3 col-xs-12 row-table-cell'>
				<p>{{$trade->item_name}}</p>
			</div>

			<div class='col-sm-3 col-xs-12 row-table-cell'>
				<p>{{$trade->buy_price}}</p>
			</div>

			<div class='col-sm-3 col-xs-12 row-table-cell'>
				<p>{{$trade->sell_price}}</p>
			</div>
		</a>
		<div class='col-sm-1 col-xs-12'>
			<a class="btn btn-info" href="{{ route('trade.show', ['trade' => $trade->id] ) }}">View</a>
		</div>

		<div class='col-sm-1 col-xs-12'>
			<a class="btn btn-success" href="{{ route('trade.edit', ['trade' => $trade->id] ) }}">Edit</a>
		</div>
	</div>

@endforeach
