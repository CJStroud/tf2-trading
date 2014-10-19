@include('partials.errors')

{{ Form::open(array('route' => 'trade.store', 'class' => 'form-horizontal', 'role' => 'form')) }}

	@include('partials.trade-fields')
	<div class="form-group">
		<div class="col-xs-12">
			{{ Form::submit('Submit', ['class' => 'btn btn-default']) }}
		</div>
	</div>
{{ Form::close() }}

@section('javascript')
	@parent

	<script>
		$(document).ready(function(){
			$('.buy_date').datepicker({
				format: "dd/mm/yyyy",
				todayBtn: "linked",
				endDate: Date('dd/mm/yyyy')
			});
		});

	</script>
@stop

