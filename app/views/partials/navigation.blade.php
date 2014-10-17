<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class='navbar-header'>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{ link_to_route('trade.index', 'TF2 Trading', null, ['class' => 'navbar-brand']) }}
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href={{ route('trade.index') }}><i class='glyphicon glyphicon-transfer'></i> Trades</a></li>
                <li><a href={{ route('trade.create') }}><i class='glyphicon glyphicon-flash'></i> New Trade</a></li>
				<li><a href='#'><i class='fa fa-line-chart'></i> Analytics</a></li>
            </ul>
        </div>
    </div>
</nav>
