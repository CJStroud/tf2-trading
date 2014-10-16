

@foreach($trades as $trade)

    <div class="row">
        <div class='col-md-3'>
            <p>{{$trade->item_name}}</p>
        </div>

        <div class='col-md-3'>
            <p>{{$trade->buy_price}}</p>
        </div>

        <div class='col-md-3'>
            <p>{{$trade->sell_price}}</p>
        </div>

    </div>

@endforeach
