<div id="random_result" class="text-center">
    <h4>Your result: {{ $data['randomNumber'] }}</h4>
    <h4>You {{ $data['result'] }}!</h4>
    <h4>Win amount: ${{ number_format($data['winAmount'], 2, '.', '') }}</h4>
</div>