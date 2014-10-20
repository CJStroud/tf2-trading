@include('partials.errors')

{{ Form::model($trade, ['route' => ['trade.update', $trade->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT']) }}

	<div class="form-group">
		<div class="col-xs-12">
			{{ Form::label('item_name', 'Item Name') }}
		</div>
		<div class="col-xs-12">
			{{ Form::text('item_name', null, ['class' => 'form-control', 'placeholder' => 'E.g. Ghastly Gibus']) }}
		</div>
	</div>
<!-- region Buy Price -->
	<div class="form-group">
		<div class="col-xs-12">
			{{ Form::label('buy_price', 'Buy Price') }}
		</div>
		<div class="col-xs-12 col-sm-4">
			<div class="input-group">
				<div class="input-group-addon">refined</div>
				{{ Form::number('buy_price_refined', (string)$trade->buy_price->refined, ['class' => 'form-control', 'placeholder' => 'E.g. 3']) }}
			</div>
		</div>
		<div class="col-xs-12 col-sm-4">
			<div class="input-group">
				<div class="input-group-addon">reclaimed</div>
				{{ Form::number('buy_price_reclaimed', (string)$trade->buy_price->reclaimed, ['class' => 'form-control', 'placeholder' => 'E.g. 2']) }}
			</div>
		</div>
		<div class="col-xs-12 col-sm-4">
			<div class="input-group">
				<div class="input-group-addon">scrap</div>
				{{ Form::number('buy_price_scrap', (string)$trade->buy_price->scrap, ['class' => 'form-control', 'placeholder' => 'E.g. 1']) }}
			</div>
		</div>
	</div>
<!-- endregion -->

<!-- region Sell Price -->
	<div class="form-group">
		<div class="col-xs-12">
			{{ Form::label('sell_price', 'Sell Price') }}
		</div>
		<div class="col-xs-12 col-sm-4">
			<div class="input-group">
				<div class="input-group-addon">refined</div>
				{{ Form::number('sell_price_refined',(string) $trade->sell_price->refined, ['class' => 'form-control', 'placeholder' => 'E.g. 3']) }}
			</div>
		</div>
		<div class="col-xs-12 col-sm-4">
			<div class="input-group">
				<div class="input-group-addon">reclaimed</div>
				{{ Form::number('sell_price_reclaimed', (string)$trade->sell_price->reclaimed, ['class' => 'form-control', 'placeholder' => 'E.g. 2']) }}
			</div>
		</div>
		<div class="col-xs-12 col-sm-4">
			<div class="input-group">
				<div class="input-group-addon">scrap</div>
				{{ Form::number('sell_price_scrap', (string)$trade->sell_price->scrap, ['class' => 'form-control', 'placeholder' => 'E.g. 1']) }}
			</div>
		</div>
	</div>
<!-- endregion -->
	<div class="form-group">
		<div class="col-xs-12">
			{{ Form::label('buy_date', 'Purchased Date') }}
		</div>

		<div class="col-xs-12">
			<div class="input-group date buy_date">
				<span class="input-group-addon">
					<i class="glyphicon glyphicon-th"></i>
				</span>
				{{ Form::text('buy_date', $trade->buy_date, ['class'=>'form-control']) }}
			</div>
		</div>

	</div>

	<div class="form-group">
		<div class="col-xs-12">
			{{ Form::label('sell_date', 'Sold Date') }}
		</div>

		<div class="col-xs-12">
			<div class="input-group date buy_date">
				<span class="input-group-addon">
					<i class="glyphicon glyphicon-th"></i>
				</span>
				{{ Form::text('sell_date', $trade->sell_date, ['class'=>'form-control']) }}
			</div>
		</div>

	</div>
	<div class="form-group">
		<div class="col-xs-3">
			<button class="btn btn-default">
				<i class="glyphicon glyphicon-ok"></i> <span class="data">Submit</span>
			</button>
		</div>
		{{ Form::close() }}

		{{ Form::open(['route' => ['trade.destroy', $trade->id], 'method' => 'DELETE']) }}
		<div class='col-xs-3'>
			<button class="btn btn-danger">
				<i class="glyphicon glyphicon-trash"></i> <span class="data">Delete</span>
			</button>
		</div>
		{{ Form::close() }}

		@if($trade->sold)
			{{ Form::open(['action' => ['TradeController@unsold', $trade->id], 'method' => 'POST']) }}
			<div class='col-xs-3'>
				<button class="btn btn-primary">
					<i class="glyphicon glyphicon-gbp"></i> <span class="data">Unsold</span>
				</button>
			</div>
			{{ Form::close() }}
		@endif
	</div>


@section('javascript')
	@parent

	<script>
		$(document).ready(function(){
			$('.buy_date').datepicker({
				format: "dd/mm/yyyy",
				todayBtn: "linked",
				startDate: '01/01/2012',
				endDate: Date('dd/mm/yyyy'),
				autoclose: true
			});
		});

		$(document).ready(function(){
			$('.buy_date').datepicker({
				format: "dd/mm/yyyy",
				todayBtn: "linked",
				endDate: Date('dd/mm/yyyy'),
				startDate: '01/01/2012',
				autoclose: true
			});
		});

	</script>
@stop
