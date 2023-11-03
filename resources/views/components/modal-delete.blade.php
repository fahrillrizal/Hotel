<div class="modal fade" id="modalDelete" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <form class="modal-content" method="post" action="#">
        @method('delete')
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <i class="fas fa-trash"></i> Hapus
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Hapus data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Ya</button>
            </div>
        </form>
    </div>
</div>

@push('js')
<script>
    $(function(){
        $('#modalDelete').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) 
            var recipient = button.data('link')
            var modal = $(this)
            modal.find('.modal-content').attr('action', recipient)
        })
    });
</script>
@endpush