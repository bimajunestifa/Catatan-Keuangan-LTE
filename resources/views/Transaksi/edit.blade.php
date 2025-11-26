@extends('layouts.adminlte')

@section('title','Edit Transaksi')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Transaksi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('transaksi.index') }}">Transaksi</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Transaksi</h3>
                    </div>
                    <form action="{{ route('transaksi.update', $transaksi->id_transaksi) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tgl_transaksi">Tanggal Transaksi</label>
                                        <input type="date" 
                                               class="form-control @error('tgl_transaksi') is-invalid @enderror" 
                                               id="tgl_transaksi" 
                                               name="tgl_transaksi" 
                                               value="{{ old('tgl_transaksi', $transaksi->tgl_transaksi) }}" 
                                               required>
                                        @error('tgl_transaksi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id_kategori">Kategori</label>
                                        <select class="form-control @error('id_kategori') is-invalid @enderror" 
                                                id="id_kategori" 
                                                name="id_kategori" 
                                                required>
                                            <option value="">Pilih Kategori</option>
                                            @foreach($kategori as $k)
                                                <option value="{{ $k->id_kategori }}" 
                                                    {{ old('id_kategori', $transaksi->id_kategori) == $k->id_kategori ? 'selected' : '' }}>
                                                    {{ $k->nama_kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_kategori')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_transaksi">Jenis Transaksi</label>
                                        <select class="form-control @error('jenis_transaksi') is-invalid @enderror" 
                                                id="jenis_transaksi" 
                                                name="jenis_transaksi" 
                                                required>
                                            <option value="">Pilih Jenis</option>
                                            <option value="pemasukan" {{ old('jenis_transaksi', $transaksi->jenis_transaksi) == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                                            <option value="pengeluaran" {{ old('jenis_transaksi', $transaksi->jenis_transaksi) == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                                        </select>
                                        @error('jenis_transaksi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nominal">Nominal (Rp)</label>
                                        <input type="number" 
                                               class="form-control @error('nominal') is-invalid @enderror" 
                                               id="nominal" 
                                               name="nominal" 
                                               value="{{ old('nominal', $transaksi->nominal) }}" 
                                               min="0" 
                                               step="0.01" 
                                               required>
                                        @error('nominal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" 
                                               class="form-control @error('keterangan') is-invalid @enderror" 
                                               id="keterangan" 
                                               name="keterangan" 
                                               value="{{ old('keterangan', $transaksi->keterangan) }}" 
                                               required>
                                        @error('keterangan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update
                            </button>
                            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

