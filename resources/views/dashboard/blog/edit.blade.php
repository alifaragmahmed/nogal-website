 
@php 
    $builder = $category->getViewBuilder()->loadEditView();
@endphp

<!-- category modal -->
{!! $builder->loadEditView() !!} 