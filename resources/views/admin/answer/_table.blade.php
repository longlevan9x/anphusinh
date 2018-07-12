<tr>
    <td class="a-center vertical-middle ">
        @include('admin.layouts.widget.table.input-check-one')
    </td>
    <td class="vertical-middle">{{$model->getQuestion()}}</td>
    <td class="vertical-middle">{{$model->getName()}}</td>
    <td class="vertical-middle">{{$model->getPhone()}}</td>
    <td class="vertical-middle">{{$model->getContentQuestion()}}</td>
    <td class="vertical-middle">{{$model->getAnswer()}}</td>
    <td class="vertical-middle">{!! $model->showStatus() !!}</td>
    <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1 vertical-middle">
        @include('admin.layouts.widget.button.button_link.button', ['url' => \App\Http\Controllers\Admin\AnswerController::getEditUrlAdmin($model->id), 'icon' => "comment-o", 'text' => __('admin/q-a.answer')])
    </td>
</tr>