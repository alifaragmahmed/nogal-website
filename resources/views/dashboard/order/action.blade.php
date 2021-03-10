<div style="min-width: 220px" > 

    <form class="form" method="post" action="{{ url('/dashboard/order/change-status') }}/{{ $order->id }}" >
        @csrf
        <div class="form-group" >
            <select class="form-control status-{{ $order->id }}" name="status" > 
                <option value="new" >{{ __('new') }}</option>
                <option value="ready" >{{ __('ready') }}</option>
                <option value="delivered" >{{ __('delivered') }}</option>
                <option value="user_refused" >{{ __('user_refused') }}</option>
                <option value="admin_refused" >{{ __('admin_refused') }}</option>
            </select>
            <button class="btn btn-sm btn-primary" >
                {{ __('change') }}
            </button>
    </div>
    </form>

    <i class="fa fa-desktop w3-text-orange w3-button" onclick="edit('{{ url('/dashboard/order/show') . '/' . $order->id }}')" ></i>
    <i class="fa fa-trash w3-text-red w3-button" onclick="remove('', '{{ url('/dashboard/order/remove/') .'/' . $order->id }}')" ></i>
</div>

<script>
    $('.status-{{ $order->id }}').val('{{ $order->status }}');
    formAjax();
</script>