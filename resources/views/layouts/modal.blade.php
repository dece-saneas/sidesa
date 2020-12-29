<!-- Confirm Delete -->
<div class="modal fade" id="modal-delete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4 class="modal-title">title</h4>
                <p class="mb-0 modal-note">note</p>
            </div>
            <div class="modal-body text-center">
                <form action="url" method="POST" class="delete">
                    <input type="hidden" name="_method" value="DELETE">
				    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="button" class="btn btn-default mr-2" data-dismiss="modal"><i class="fas fa-times mr-2"></i>Cancel</button>
                <button type="submit" class="btn btn-dark"><i class="fas fa-trash mr-2"></i>Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>