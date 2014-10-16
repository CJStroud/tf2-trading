<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class='navbar-header'>
            {{ link_to_route('trade.index', 'Home', null, ['class' => 'navbar-brand']) }}
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href='#'><i class='glyphicon glyphicon-ok'></i>Trades</a></li>
                <li><a href='#'>New Trade</a></li>
            </ul>
        </div>
    </div>
</nav>