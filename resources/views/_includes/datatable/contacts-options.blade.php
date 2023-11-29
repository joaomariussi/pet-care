<div class="invoice-action d-flex">
    <a title="Visualizar Formulário"
       href="{{route('contacts.view-details', $id)}}"
       class="invoice-action-edit cursor-pointer alert-heading">
        <i class="fa-solid fa-eye"></i>
    </a>
    <a type="button"
       class="invoice-action-edit cursor-pointer ms-3 alert-heading"
       onclick="return confirmDeletion('{{ route('contacts.delete', ['id' => $id]) }}')"
       title="Remover Formulário">
        <i class="fa-solid fa-trash-alt"></i>
    </a>
</div>
