<p class="text-muted mb-3">
    <i class="fas fa-info-circle mr-1"></i>
    Pastikan akun Anda menggunakan password yang panjang dan acak untuk tetap aman.
</p>

<form method="post" action="{{ route('password.update') }}">
    @csrf
    @method('put')

    @if (session('status') === 'password-updated')
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <i class="fas fa-check-circle mr-2"></i>
            Password berhasil diupdate!
        </div>
    @endif

    <div class="form-group">
        <label for="update_password_current_password" class="form-label">
            <i class="fas fa-lock mr-1"></i>Password Saat Ini
        </label>
        <input type="password" 
               id="update_password_current_password" 
               name="current_password" 
               class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" 
               autocomplete="current-password"
               placeholder="Masukkan password saat ini">
        @error('current_password', 'updatePassword')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="update_password_password" class="form-label">
            <i class="fas fa-key mr-1"></i>Password Baru
        </label>
        <input type="password" 
               id="update_password_password" 
               name="password" 
               class="form-control @error('password', 'updatePassword') is-invalid @enderror" 
               autocomplete="new-password"
               placeholder="Masukkan password baru">
        @error('password', 'updatePassword')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="update_password_password_confirmation" class="form-label">
            <i class="fas fa-key mr-1"></i>Konfirmasi Password Baru
        </label>
        <input type="password" 
               id="update_password_password_confirmation" 
               name="password_confirmation" 
               class="form-control" 
               autocomplete="new-password"
               placeholder="Konfirmasi password baru">
    </div>

    <div class="form-group mb-0">
        <button type="submit" class="btn btn-warning">
            <i class="fas fa-save mr-2"></i>Update Password
        </button>
    </div>
</form>
