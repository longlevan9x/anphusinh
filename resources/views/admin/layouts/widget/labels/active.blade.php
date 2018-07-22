@if($slot == '1')
    @include('admin.layouts.widget.labels.info', ['text' => $text_active ?? __('admin/common.active')])
@else
    @include('admin.layouts.widget.labels.warning', ['text' => $text_inactive ?? __('admin/common.inactive')])
@endif