@if(session('status')=='store')
<div class="alert alert-success alert- dismissible fade show" role="alert">
    <strong>Data berhasil disimpan.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('status')=='update')
<div class="alert alert-success alert- dismissible fade show" role="alert">
    <strong>Data berhasil diubah.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('status')=='destroy')
<div class="alert alert-success alert- dismissible fade show" role="alert">
    <strong>Data berhasil dihapus.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif