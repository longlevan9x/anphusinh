@if(!empty($exception->getMessage()))
    @include('errors.error')
@else
    Error
@endif