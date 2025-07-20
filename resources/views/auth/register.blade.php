@extends('layouts.app')

@section('content')
<style>
    .register-wrapper {
        min-height: 100vh;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    
    .register-container {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        width: 100%;
        max-width: 450px;
    }
    
    .register-header {
        background: #27ae60;
        color: white;
        padding: 2rem;
        text-align: center;
    }
    
    .register-header h3 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
    }
    
    .register-header p {
        margin: 0.5rem 0 0 0;
        opacity: 0.9;
        font-size: 0.9rem;
    }
    
    .register-body {
        padding: 2rem;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: #495057;
        font-size: 0.9rem;
    }
    
    .form-control {
        width: 100%;
        padding: 0.875rem 1rem;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        font-size: 1rem;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
        background: #fff;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #27ae60;
        box-shadow: 0 0 0 3px rgba(39, 174, 96, 0.1);
    }
    
    .btn-register {
        width: 100%;
        padding: 0.875rem;
        background: #27ae60;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.2s ease, transform 0.1s ease;
    }
    
    .btn-register:hover {
        background: #2ecc71;
        transform: translateY(-1px);
    }
    
    .btn-register:active {
        transform: translateY(0);
    }
    
    .alert {
        padding: 1rem;
        margin-bottom: 1.5rem;
        border: none;
        border-radius: 8px;
        background: #f8d7da;
        color: #721c24;
        font-size: 0.9rem;
        border-left: 4px solid #dc3545;
    }
    
    .register-footer {
        text-align: center;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e9ecef;
    }
    
    .register-footer a {
        color: #27ae60;
        text-decoration: none;
        font-size: 0.9rem;
    }
    
    .register-footer a:hover {
        text-decoration: underline;
    }
    
    .brand-icon {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.5rem;
    }
    
    .form-row {
        display: flex;
        gap: 1rem;
    }
    
    .form-row .form-group {
        flex: 1;
    }
    
    @media (max-width: 480px) {
        .register-wrapper {
            padding: 10px;
        }
        
        .register-header,
        .register-body {
            padding: 1.5rem;
        }
        
        .form-row {
            flex-direction: column;
            gap: 0;
        }
    }
</style>

<div class="register-wrapper">
    <div class="register-container">
        <div class="register-header">
            <div class="brand-icon">
                👤
            </div>
            <h3>Buat Akun Baru</h3>
            <p>Daftar untuk memulai berbelanja</p>
        </div>
        
        <div class="register-body">
            @if($errors->any())
                <div class="alert">
                    {{ $errors->first() }}
                </div>
            @endif
            
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="form-group">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" 
                           id="name"
                           name="name" 
                           class="form-control" 
                           placeholder="Masukkan nama lengkap Anda"
                           value="{{ old('name') }}"
                           required>
                </div>
                
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" 
                           id="email"
                           name="email" 
                           class="form-control" 
                           placeholder="Masukkan email Anda"
                           value="{{ old('email') }}"
                           required>
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" 
                           id="password"
                           name="password" 
                           class="form-control" 
                           placeholder="Minimal 8 karakter"
                           required>
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" 
                           id="password_confirmation"
                           name="password_confirmation" 
                           class="form-control" 
                           placeholder="Ulangi password Anda"
                           required>
                </div>
                
                <button type="submit" class="btn-register">
                    Daftar Sekarang
                </button>
            </form>
            
            <div class="register-footer">
                <p class="mb-0 text-muted">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}">Masuk di sini</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection