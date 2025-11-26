<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ route('profile.update') }}">
    @csrf
    @method('patch')

    @if (session('status') === 'profile-updated')
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <i class="fas fa-check-circle mr-2"></i>
            Profile berhasil diupdate!
        </div>
    @endif

    <div class="form-group">
        <label for="name" class="form-label">
            <i class="fas fa-user mr-1"></i>Nama
        </label>
        <input type="text" 
               id="name" 
               name="name" 
               class="form-control @error('name') is-invalid @enderror" 
               value="{{ old('name', $user->name) }}" 
               required 
               autofocus 
               autocomplete="name">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email" class="form-label">
            <i class="fas fa-envelope mr-1"></i>Email
        </label>
        <input type="email" 
               id="email" 
               name="email" 
               class="form-control @error('email') is-invalid @enderror" 
               value="{{ old('email', $user->email) }}" 
               required 
               autocomplete="username">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="alert alert-warning mt-2">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                Email Anda belum diverifikasi.
                <button form="send-verification" class="btn btn-link p-0 ml-1">
                    Klik di sini untuk mengirim ulang email verifikasi.
                </button>
            </div>

            @if (session('status') === 'verification-link-sent')
                <div class="alert alert-success mt-2">
                    <i class="fas fa-check-circle mr-2"></i>
                    Link verifikasi baru telah dikirim ke email Anda.
                </div>
            @endif
        @endif
    </div>

    <div class="form-group mb-0">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save mr-2"></i>Simpan Perubahan
        </button>
    </div>
</form>
