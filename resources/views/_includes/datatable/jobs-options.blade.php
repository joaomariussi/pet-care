<div class="invoice-action d-flex">
    <a title="Currículos Recebidos" href="{{route('jobs.view-received', $id)}}" class="invoice-action-edit cursor-pointer alert-heading">
        <i class="fa-solid fa-file"></i>
    </a>
    <a title="Editar Vaga"
       href="{{route('jobs.view-update', $id)}}"
       class="invoice-action-edit cursor-pointer ms-3 alert-heading">
        <i class="fas fa-edit"></i>
    </a>
    <a type="button"
       class="invoice-action-edit cursor-pointer ms-3 alert-heading"
       onclick="return confirmDeletion('{{ route('jobs.delete', ['id' => $id]) }}')"
       title="Remover Vaga">
        <i class="fa-solid fa-trash-alt"></i>
    </a>
</div>
