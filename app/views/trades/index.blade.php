@foreach($trades as $trade)
    <p>Bought for {{ $trade->buy_price }} and sold for {{ $trade->sell_price }}</p>
@endforeach