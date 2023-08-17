<div class="d-flex action-button">

    <a href="{{ isset($notification->data['id'])?route('admin.contracts.show',Illuminate\Support\Facades\Crypt::encrypt($notification->data['id']) ):'#'}}" class="btn btn-info btn-xs light px-2 m-1"
       title="{{ trans('contracts.show')}}">
        <i class="fa fa-eye"
           style="font-size: 16px;"></i>
    </a>

</div>
