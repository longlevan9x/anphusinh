<tr>
    <td class="a-center vertical-middle ">
        <input type="checkbox" class="check-one" name="table_records">
    </td>
    <td class="vertical-middle">{{$model->quesion}}</td>
    <td class="vertical-middle">{{$model->name}}</td>
    <td class="vertical-middle">{{$model->phone}}</td>
    <td class="vertical-middle">{{$model->content}}</td>
    <td class="vertical-middle">{{$model->status}}</td>
    <td class="vertical-middle">{{$model->anwser}}</td>
    <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2 vertical-middle">
        @include('admin.layouts.widget.button.button_link.button', ['url' => \App\Http\Controllers\Admin\AnswerController::getEditUrlAdmin($model->id), 'icon' => "comment-o"])
    </td>
</tr>