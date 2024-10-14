<div class="invoice-action d-flex">

    <a type="button"
       class="invoice-action-edit cursor-pointer alert-heading"
       href="{{ route('appointments.view-details', $id) }}"
       title="Visualizar">
        <i class="fa-solid fa-eye"></i>
    </a>

    <a type="button"
       class="invoice-action-edit cursor-pointer ms-3 alert-heading"
       onclick="return confirmDeletion('{{ route('appointments.delete', ['id' => $id]) }}')"
       title="Excluir">
        <i class="fa-solid fa-trash-alt"></i>
    </a>
</div>
