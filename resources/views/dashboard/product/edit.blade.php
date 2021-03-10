 
@php 
    $builder = $product->getViewBuilder();
@endphp

<!-- product modal -->
{!! $builder->loadEditView() !!} 