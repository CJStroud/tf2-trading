@include('partials.errors')

<div class="row row-table-header hidden-xs">
	<div class='col-sm-2 col-xs-12'>
		<p>Item Name</p>
	</div>

	<div class='col-sm-1 col-xs-12'>
		<p>Buy Price</p>
	</div>

	<div class='col-sm-1 col-xs-12'>
		<p>Sell Price</p>
	</div>

	<div class='col-sm-2 col-xs-12'>
		<p>Purchased Date</p>
	</div>

	<div class='col-sm-2 col-xs-12'>
		<p>Sold Date</p>
	</div>
</div>

@foreach($trades as $trade)

<div class="row trades-row
	@if($trade->sold && $trade->buy_price < $trade->sell_price)
		bg-success
	@elseif($trade->sold && $trade->buy_price == $trade->sell_price)
		bg-info
	@elseif($trade->sold && $trade->buy_price > $trade->sell_price)
		bg-danger
	@endif
	">
	<div class='col-sm-2 col-xs-12 row-table-cell'>
		<p>{{$trade->item_name}}</p>
	</div>

	<div class='col-sm-1 col-xs-12 row-table-cell'>
		<p>
			{{ $trade->buy_price }}
		</p>
	</div>

	<div class='col-sm-1 col-xs-12 row-table-cell'>
		<p>
			{{ $trade->sell_price }}
		</p>
	</div>

	<div class='col-sm-2 col-xs-12 row-table-cell'>
		<p>{{ date('d/m/Y', $trade->buy_date) }}</p>
	</div>

	<div class='col-sm-2 col-xs-12 row-table-cell'>
		@if ($trade->sold)
			<p>{{ date('d/m/Y', $trade->sell_date) }}</p>
		@else
			<p class="text-warning">Unsold</p>
		@endif
	</div>

	<div class='col-md-1 col-sm-2 col-xs-6'>
		<a class="btn btn-success" href="{{ route('trade.edit', ['trade' => $trade->id] ) }}">
			<i class="glyphicon glyphicon-pencil"></i> Edit</a>
	</div>
	@if (!$trade->sold)
		{{ Form::open(['action' => ['TradeController@sold', $trade->id], 'method' => 'POST']) }}
		<div class='col-md-1 col-sm-2 col-xs-6'>
			<button class="btn btn-info">
				<i class="glyphicon glyphicon-gbp"></i> Sold
			</button>
		</div>
		{{ Form::close() }}
	@endif
</div>
@endforeach
