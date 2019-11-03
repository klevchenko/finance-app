@if (count($transactions) > 1)
    <span class="sep"></span>
    <ul class="list-group">
        @foreach ($transactions as $transaction)
            <li class="list-group-item">
                <span class="badge">x</span>
                {{ $transaction->amount }} {{ $transaction->currency }}
                <span class="label label-default">{{ $transaction->category }}</span>
                <span class="label label-primary">{{ $transaction->created_at }}</span>

                
            </li>
        @endforeach
    
@else
        <li class="list-group-item">I don't have any transactions!</li>
@endif
    </ul>
    <span class="sep"></span>

