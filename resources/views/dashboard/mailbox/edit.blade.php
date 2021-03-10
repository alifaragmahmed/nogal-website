 
@php 
    $builder = $category->getViewBuilder();
@endphp

<!-- category modal -->
{!! $builder->loadEditView() !!} 