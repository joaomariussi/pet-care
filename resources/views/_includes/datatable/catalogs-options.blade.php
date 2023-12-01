<div class="invoice-action d-flex">
    <a title="Editar Catalogo"
       href="{{route('catalogs.view-update', ['id' => $id])}}"
       class="invoice-action-edit cursor-pointer alert-heading">
        <i class="fa-solid fa-edit"></i>
    </a>
    <a type="button"
       class="invoice-action-edit cursor-pointer ms-3 alert-heading"
       onclick="return confirmDeletion('{{ route('catalogs.delete', ['id' => $id]) }}')"
       title="Remover Formulário">
        <i class="fa-solid fa-trash-alt"></i>
    </a>
</div>
