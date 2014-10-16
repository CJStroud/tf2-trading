<!DOCTYPE html>
<html>
    
    <head>
        {{ HTML::style('components/bootstrap/dist/css/bootstrap.min.css') }}    
    </head>
    
    <body>
        @include('partials.navigation')
        
        <div class="container">
            {{ $content }}
        </div>
        
    </body>
    
    
    {{ HTML::script('components/jquery/dist/jquery.min.js') }}
    {{ HTML::script('components/bootstrap/dist/js/bootstrap.min.js') }}    
    
    
</html>