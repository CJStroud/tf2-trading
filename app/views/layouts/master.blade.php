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
