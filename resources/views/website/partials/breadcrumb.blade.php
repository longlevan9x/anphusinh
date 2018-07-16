<ol class="breadcrumb">
    @forelse($breadcrumb as $item)
        <li class="@if($loop->index == $loop->count - 1) active @endif">
            <a href="{{$item['url']}}">{{$item['text']}}</a>
        </li>
    @empty
    @endforelse
</ol>