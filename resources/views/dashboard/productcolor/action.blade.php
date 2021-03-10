<div style="width: 120px" >
    <i class="fa fa-edit w3-text-orange w3-button" onclick="edit('{{ url('/dashboard/productcolor/edit') . '/' . $productcolor->id }}')" ></i>
    <i class="fa fa-trash w3-text-red w3-button" onclick="remove('', '{{ url('/dashboard/productcolor/remove/') .'/' . $productcolor->id }}')" ></i>
</div>