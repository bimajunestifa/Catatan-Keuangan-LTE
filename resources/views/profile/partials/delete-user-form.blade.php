<div class="alert alert-danger">
    <i class="fas fa-exclamation-triangle mr-2"></i>
    <strong>Peringatan!</strong> Setelah akun Anda dihapus, semua data dan sumber daya akan dihapus secara permanen. 
    Sebelum menghapus akun, pastikan Anda telah mengunduh data atau informasi yang ingin disimpan.
</div>

<button type="button" 
        class="btn btn-danger" 
        data-toggle="modal" 
        data-target="#confirm-user-deletion">
    <i class="fas fa-trash mr-2"></i>Hapus Akun
</button>

<!-- Modal -->
<div class="modal fade" id="confirm-user-deletion" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    Konfirmasi Hapus Akun
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <p class="mb-3">
                        <strong>Apakah Anda yakin ingin menghapus akun?</strong>
                    </p>
                    <p class="text-muted">
                        Setelah akun dihapus, semua data dan sumber daya akan dihapus secara permanen. 
                        Masukkan password Anda untuk mengonfirmasi penghapusan akun.
                    </p>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               class="form-control @error('password', 'userDeletion') is-invalid @enderror" 
                               placeholder="Masukkan password untuk konfirmasi"
                               required>
                        @error('password', 'userDeletion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-2"></i>Batal
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash mr-2"></i>Hapus Akun
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
