<div class="invoice-action d-flex">

    <a title="Editar"
       href="{{ route('employees.view-update', $id) }}"
       class="invoice-action-edit cursor-pointer alert-heading">
        <i class="fas fa-edit"></i>
    </a>

    <a type="button"
       class="invoice-action-edit cursor-pointer ms-3 alert-heading"
       onclick="return confirmDeletion('{{ route('employees.delete', ['id' => $id]) }}')"
       title="Excluir">
        <i class="fa-solid fa-trash-alt"></i>
    </a>
</div>
