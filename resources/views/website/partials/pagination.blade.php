@php
    /** @var \Illuminate\Pagination\LengthAwarePaginator $models */
@endphp
@if($models->lastPage() > 1)
    <!-- Paging -->
    <div class="pager_nav wow fadeIn text-center" data-wow-delay="600ms">
        <hr>
        <ul class="pagination font-weight-bold" style="font-size: 19px">
            @if($models->lastPage() > 2)
                <li class="{{$models->currentPage() == 1 ? 'hidden' : ''}}">
                    <a href="{{$models->url(1)}}" aria-label="First" title="@lang('pagination.first')">
                        <span aria-hidden="true"><i class="fa fa-angle-double-left"></i> &nbsp; </span>
                    </a>
                </li>
            @endif

            <li class="{{$models->currentPage() == 1 ? 'hidden' : ''}}">
                <a href="{{$models->previousPageUrl()}}"  aria-label="Previous" title="@lang('pagination.previous')">
                    <span aria-hidden="true"><i class="fa fa-angle-left"></i> &nbsp; </span>
                </a>
            </li>

            @for($page = 1; $page <= $models->lastPage(); $page++)
                <li><a href="{{$models->url($page)}}" class="{{$models->currentPage() == $page ? 'current_page' : ''}}">{{$page}}</a></li>
            @endfor

            <li class="{{$models->currentPage() == $models->lastPage() ? 'hidden' : ''}}">
                <a href="{{$models->nextPageUrl()}}" aria-label="Next" title="@lang('pagination.next')">
                    <span aria-hidden="true"> &nbsp; <i class="fa fa-angle-right"></i></span>
                </a>
            </li>

            @if($models->lastPage() > 2)
                <li class="{{$models->currentPage() == $models->lastPage() ? 'hidden' : ''}}">
                    <a href="{{$models->url($models->lastPage())}}" aria-label="Last" title="@lang('pagination.last')">
                        <span aria-hidden="true">&nbsp; <i class="fa fa-angle-double-right"></i></span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
    <!-- Paging -->
@endif