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

    <div class="row trades-row">
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
            @if ($trade->sell_date <= 100000)
                <p class="text-warning">Unsold</p>
            @else
                <p>{{ date('d/m/Y', $trade->sell_date) }}</p>
            @endif
        </div>

        @if ($trade->sell_date <= 100000)
            {{ Form::open(['action' => ['TradeController@sold', $trade->id], 'method' => 'POST']) }}
            <div class='col-md-1 col-sm-2 col-xs-6'>
                <button class="btn btn-info">
                    <i class="glyphicon glyphicon-gbp"></i> Sold
                </button>
            </div>
            {{ Form::close() }}

            <div class='col-md-1 col-sm-2 col-xs-6'>
                <a class="btn btn-success" href="{{ route('trade.edit', ['trade' => $trade->id] ) }}">
                    <i class="glyphicon glyphicon-pencil"></i> Edit</a>
            </div>
        @else
            <div class='col-md-1 col-sm-2 col-xs-12'>
                <a class="btn btn-warning" href="{{ route('trade.show', ['trade' => $trade->id] ) }}">
                <i class="glyphicon glyphicon-eye-open"></i> View</a>
            </div>
        @endif


    </div>

@endforeach
