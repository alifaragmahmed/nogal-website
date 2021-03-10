<div style="width: 120px" >
    <i class="fa fa-edit w3-text-orange w3-button" onclick="edit('{{ url('/dashboard/productphoto/edit') . '/' . $productphoto->id }}')" ></i>
    <i class="fa fa-trash w3-text-red w3-button" onclick="remove('', '{{ url('/dashboard/productphoto/remove/') .'/' . $productphoto->id }}')" ></i>
</div>