<!DOCTYPE html>
<html>

	<head>
		{{ HTML::style('components/bootstrap/dist/css/bootstrap.min.css') }}
		{{ HTML::style('components/font-awesome/css/font-awesome.min.css') }}
		{{ HTML::style('components/bootstrap-datepicker/css/datepicker.css') }}
		{{ HTML::style('css/styles.css') }}
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Trading Manager</title>
	</head>

	<body>
		@include('partials.navigation')
		<div class="container">
			<h3 class="title col-sm-8">{{$title}}</h3>
			@if(isset($showCurrencySelector) && $showCurrencySelector)
				{{ Form::open(['action' => 'TradeController@currency', 'class' => 'col-sm-4 form-horizontal currency-form ', 'role' => 'form']) }}
					<?php
						$currencies = Currency::all();
						$currencies_array = [];
						foreach($currencies as $currency)
						{
							$currencies_array[$currency->id] = ucfirst($currency->item_name);
						}
					?>
					<div class="form-group">
						{{ Form::label('currency', 'Currency:', ['class' => 'col-sm-4 control-label']) }}
						<div class="col-sm-8">
							{{ Form::select('currency', $currencies_array, Session::get('currency'), ['class' => ' form-control currency-type']) }}
						</div>
					</div>
				{{ Form::close() }}
			@endif
			{{ $content }}
		</div>
	</body>
	@section('javascript')
		{{ HTML::script('components/jquery/dist/jquery.min.js') }}
		{{ HTML::script('components/bootstrap/dist/js/bootstrap.min.js') }}
		{{ HTML::script('components/bootstrap-datepicker/js/bootstrap-datepicker.js') }}

		<script type="text/javascript">
			$(document).ready(function(){
				$('.currency-type').change(function(){
					$('.currency-form').submit();
				});
			});
		</script>
	@show
</html>
