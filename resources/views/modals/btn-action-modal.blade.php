<style>

</style>
<div class="btn-group action_btn relative" style="position: relative">
    <button class="btn bg-teal btn-block btn-xs btn-flat dropdown-toggle" type="button" data-toggle="dropdown">
        <i class="fa fa-cogs" aria-hidden="true"></i> <i class="fa fa-angle-down" aria-hidden="true"></i>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li>
            <button href="{{ @$edit }}" class="btn btn-xs btn-primary btn-flat btn-edit" data-id="{{$id}}" data-detail="{{$detail}}" data-url="{{$urlEdit}}" data-toggle="modal"><i class="glyphicon glyphicon-edit"></i> Sửa</button>
        </li>
        <li>
            <button class="btn btn-xs btn-danger btn-flat list-item-delete-btn" data-url="{{ @$destroy }}" ><i class="glyphicon glyphicon-trash"></i> Xóa</button>
        </li>
    </ul>
</div>
