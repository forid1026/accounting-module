<li class="ml-4 border-l border-gray-300 pl-4">

    <div class="py-1">
        <span class="font-semibold">
            @if($account->is_group)
                📂
            @else
                📄
            @endif
            {{ $account->code }} - {{ $account->name }}
        </span>
    </div>

    @if($account->children->count())
        <ul class="ml-4">
            @foreach($account->children as $child)
                @include('accounts.tree',['account'=>$child])
            @endforeach
        </ul>
    @endif
</li>
