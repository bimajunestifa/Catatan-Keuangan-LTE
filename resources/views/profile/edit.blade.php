@extends('layouts.adminlte')

@section('title','Profile')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    <i class="fas fa-user-circle mr-2"></i>
                    Profile
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        
        <!-- Profile Information Card -->
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-user mr-1"></i>
                            Informasi Profile
                        </h3>
                    </div>
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>
            
            <!-- User Info Sidebar -->
            <div class="col-md-4">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-info-circle mr-1"></i>
                            Informasi Akun
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'User') }}&background=007bff&color=fff&size=128" 
                                 class="img-circle elevation-2" 
                                 alt="User Image"
                                 style="width: 100px; height: 100px;">
                        </div>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b><i class="fas fa-user mr-2"></i>Nama</b>
                                <span class="float-right">{{ auth()->user()->name ?? 'User' }}</span>
                            </li>
                            <li class="list-group-item">
                                <b><i class="fas fa-envelope mr-2"></i>Email</b>
                                <span class="float-right text-break">{{ auth()->user()->email ?? '' }}</span>
                            </li>
                            <li class="list-group-item">
                                <b><i class="fas fa-at mr-2"></i>Username</b>
                                <span class="float-right">{{ auth()->user()->username ?? '-' }}</span>
                            </li>
                            <li class="list-group-item">
                                <b><i class="fas fa-calendar mr-2"></i>Bergabung</b>
                                <span class="float-right">{{ auth()->user()->created_at ? auth()->user()->created_at->format('d M Y') : '-' }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Password Card -->
        <div class="row">
            <div class="col-md-8">
                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-key mr-1"></i>
                            Update Password
                        </h3>
                    </div>
                    <div class="card-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Account Card -->
        <div class="row">
            <div class="col-md-8">
                <div class="card card-danger card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-exclamation-triangle mr-1"></i>
                            Hapus Akun
                        </h3>
                    </div>
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
