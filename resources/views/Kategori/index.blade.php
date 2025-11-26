@extends('layouts.adminlte')

@section('title','Data Kategori')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Manajemen Kategori</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Kategori</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Tambah Kategori -->
        <div class="card card-primary card-outline mb-4">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-plus mr-1"></i>
                    Tambah Kategori
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_kategori">Nama Kategori</label>
                                <input type="text" 
                                       name="nama_kategori" 
                                       id="nama_kategori"
                                       class="form-control @error('nama_kategori') is-invalid @enderror" 
                                       placeholder="Masukkan nama kategori"
                                       value="{{ old('nama_kategori') }}"
                                       required>
                                @error('nama_kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <button type="submit" class="btn btn-success btn-block">
                                    <i class="fas fa-save"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Daftar Kategori -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-list mr-1"></i>
                    Daftar Kategori
                </h3>
                <div class="card-tools">
                    <span class="badge badge-primary">{{ $kategori->count() }} Kategori</span>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle table-hover">
                    <thead>
                        <tr>
                            <th width="60">#</th>
                            <th>Nama Kategori</th>
                            <th class="text-center">Jumlah Transaksi</th>
                            <th width="220" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kategori as $k)
                        <tr style="cursor: pointer;" data-href="{{ route('kategori.edit', $k->id_kategori) }}" class="row-clickable">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $k->nama_kategori }}</strong>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-info">{{ $k->transaksi_count ?? 0 }}</span>
                                <small class="text-muted d-block">transaksi</small>
                            </td>
                            <td class="text-center row-actions">
                                <a href="{{ route('kategori.edit', $k->id_kategori) }}" class="btn btn-warning btn-sm" title="Edit Kategori">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('kategori.destroy', $k->id_kategori) }}" method="POST" style="display: inline-block;" class="delete-form" data-nama="{{ $k->nama_kategori }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus Kategori">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                                <p class="text-muted mb-0">Belum ada kategori. Silakan tambah kategori baru.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    // Handle row click
    var clickableRows = document.querySelectorAll('.row-clickable');
    clickableRows.forEach(function(row) {
        row.addEventListener('click', function(e) {
            if (!e.target.closest('.row-actions')) {
                var href = row.getAttribute('data-href');
                if (href) {
                    window.location.href = href;
                }
            }
        });
    });

    // Handle delete form
    var deleteForms = document.querySelectorAll('.delete-form');
    deleteForms.forEach(function(form) {
        form.addEventListener('submit', function(e) {
            var nama = form.getAttribute('data-nama');
            var message = 'Hapus kategori "' + nama + '"? Semua transaksi yang terkait akan terpengaruh.';
            if (!confirm(message)) {
                e.preventDefault();
            }
        });
    });
});
</script>
@endsection
