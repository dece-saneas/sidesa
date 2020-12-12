<div class="modal fade" id="modal-delete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4 class="modal-title">title</h4>
                <p class="mb-0 modal-note">note</p>
            </div>
            <div class="modal-body text-center">
                <form action="url" method="POST" class="delete">
                    <input type="hidden" name="_method" value="DELETE">
				    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>