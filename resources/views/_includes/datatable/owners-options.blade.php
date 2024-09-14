<div class="invoice-action d-flex">

    <a type="button"
       class="invoice-action-edit cursor-pointer alert-heading"
       onclick=""
       title="Visualizar">
        <i class="fa-solid fa-eye"></i>
    </a>

    <a title="Editar"
       href="{{ route('owners.view-update', $id) }}"
       class="invoice-action-edit cursor-pointer ms-3 alert-heading">
        <i class="fas fa-edit"></i>
    </a>

    <a type="button"
       class="invoice-action-edit cursor-pointer ms-3 alert-heading"
       onclick=""
       title="Excluir">
        <i class="fa-solid fa-trash-alt"></i>
    </a>
</div>
