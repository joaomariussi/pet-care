<div class="invoice-action d-flex">
    <a title="Visualizar Currículo"
       href="{{route('jobs.view-details-resumes', $id)}}"
       class="invoice-action-edit cursor-pointer alert-heading">
        <i class="fa-solid fa-eye"></i>
    </a>
    <a type="button"
       class="invoice-action-edit cursor-pointer ms-3 alert-heading"
       onclick="return confirmDeletion('{{ route('jobs.delete-resume', ['id' => $id]) }}')"
       title="Remover">
        <i class="fa-solid fa-trash-alt"></i>
    </a>
</div>
