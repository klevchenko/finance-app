<form method="POST" action="{{action('TransactionController@add')}}">

    {{ csrf_field() }}

    <!-- Default values -->
    <input type="hidden" value="0" name="type">
    <input type="hidden" value="0" name="currency">
    <input type="hidden" value="0" name="category">
    <input type="hidden" value="0" name="comment">

    <input type="hidden" value="0" name="amount_remove">
    <input type="hidden" value="0" name="amount_to_funds">

    <div class="input-group">
        <input type="number" name="amount" class="form-control">
        <div class="input-group-btn custom-radio">
            @foreach ($all_currencys as $currency)
                <input 
                    class="hidden" 
                    id="{{ $currency['code'] }}" 
                    type="radio" 
                    name="currency" 
                    <?=$currency['code'] == 'UAH' ? ' checked="checked" ' : ''?>
                    value="{{ $currency['id'] }}" />
                <label 
                    for="{{ $currency['code'] }}" 
                    type="button" 
                    class="btn btn-default">{{ $currency['name'] }}</label>
            @endforeach
        </div>
    </div>
    <span class="sep"></span>

    <div class="btn-group btn-group-justified" role="group">
        <div class="btn-group" role="group">
            <button type="submit" class="btn btn-primary">Додати</button>
        </div>
        <div class="btn-group" role="group">
            <button name="amount_remove" value="1" type="submit" class="btn btn-danger">Відняти</button>
        </div>
        <div class="btn-group" role="group">
            <button name="amount_to_funds" value="1" type="submit" class="btn btn-success">Відкласти</button>
        </div>
    </div>

</form>