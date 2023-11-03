@props(['link'])
<button href="{{ $link }}" class="btn btn-light" data-link="{{ $link }}" data-toggle="modal" data-target="#modalDelete">
    <i class="fas fa-trash"></i>
</button>