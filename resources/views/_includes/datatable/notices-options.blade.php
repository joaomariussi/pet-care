<div class="invoice-action d-flex">
    <a title="Editar"
       href="{{route('blog.view-update-notices', $id)}}"
       class="invoice-action-edit cursor-pointer alert-heading">
        <i class="fas fa-edit"></i>
    </a>
    <a type="button"
       class="invoice-action-edit cursor-pointer ms-3 alert-heading"
       onclick="return confirmDeletion('{{ route('blog.delete-notices', ['id' => $id]) }}')"
       title="Visualizar">
        <i class="fa-solid fa-trash-alt"></i>
    </a>
</div>
