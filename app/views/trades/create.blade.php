@if (count($errors->all()))
	<div class="alert alert-danger alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	@foreach($errors->all() as $error)

		<p>{{$error}}</p>

	@endforeach

	</div>
@endif

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

