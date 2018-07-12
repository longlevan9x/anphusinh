<tr>
    <td class="a-center vertical-middle ">
        @include('admin.layouts.widget.table.input-check-one')
    </td>
    <td class="vertical-middle">{{$model->quesion}}</td>
    <td class="vertical-middle">{{$model->name}}</td>
    <td class="vertical-middle">{{$model->phone}}</td>
    <td class="vertical-middle">{{$model->content}}</td>
    <td class="vertical-middle">{{$model->status}}</td>
    <td class="vertical-middle">{{$model->anwser}}</td>
    <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1 vertical-middle">
        @include('admin.layouts.widget.button.button_link.button', ['url' => \App\Http\Controllers\Admin\AnswerController::getEditUrlAdmin($model->id), 'icon' => "comment-o", 'text' => __('admin/q-a.answer')])
    </td>
</tr>