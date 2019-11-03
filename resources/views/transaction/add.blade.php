<form method="POST" action="{{action('TransactionController@add')}}">

    {{ csrf_field() }}

    <!-- Default values -->
    <input type="hidden" value="0" name="type">
    <input type="hidden" value="0" name="currency">
    <input type="hidden" value="0" name="category">
    <input type="hidden" value="0" name="comment">

    <div class="input-group">
        <input type="number" name="amount" class="form-control">
        <div class="input-group-btn custom-radio">
            <input class="hidden" id="UAH" type="radio" name="currency" checked="checked" value="UAH" />
            <label for="UAH" type="button" class="btn btn-default">грн</label>
            <input class="hidden" id="USD" type="radio" name="currency" value="USD" />
            <label for="USD" type="button" class="btn btn-default">дол</label>
        </div>
    </div>
    <span class="sep"></span>

    <div class="btn-group btn-group-justified" role="group">
        <div class="btn-group" role="group">
            <button name="add" type="submit" class="btn btn-primary">Додати</button>
        </div>
        <div class="btn-group" role="group">
            <button name="remove" type="submit" class="btn btn-danger">Відняти</button>
        </div>
        <div class="btn-group" role="group">
            <button mane="put" type="submit" class="btn btn-success">Відкласти</button>
        </div>
    </div>

</form>