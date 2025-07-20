@extends('layouts.app')

@section('content')
<style>
    .login-wrapper {
        min-height: 100vh;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    
    .login-container {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        width: 100%;
        max-width: 420px;
    }
    
    .login-header {
        background: #2c3e50;
        color: white;
        padding: 2rem;
        text-align: center;
    }
    
    .login-header h3 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
    }
    
    .login-header p {
        margin: 0.5rem 0 0 0;
        opacity: 0.9;
        font-size: 0.9rem;
    }
    
    .login-body {
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
        border-color: #2c3e50;
        box-shadow: 0 0 0 3px rgba(44, 62, 80, 0.1);
    }
    
    .btn-login {
        width: 100%;
        padding: 0.875rem;
        background: #2c3e50;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.2s ease, transform 0.1s ease;
    }
    
    .btn-login:hover {
        background: #34495e;
        transform: translateY(-1px);
    }
    
    .btn-login:active {
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
    
    .login-footer {
        text-align: center;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e9ecef;
    }
    
    .login-footer a {
        color: #2c3e50;
        text-decoration: none;
        font-size: 0.9rem;
    }
    
    .login-footer a:hover {
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
    
    @media (max-width: 480px) {
        .login-wrapper {
            padding: 10px;
        }
        
        .login-header,
        .login-body {
            padding: 1.5rem;
        }
    }
</style>

<div class="login-wrapper">
    <div class="login-container">
        <div class="login-header">
            <div class="brand-icon">
                🛒
            </div>
            <h3>Masuk ke Akun</h3>
            <p>Silakan masuk untuk melanjutkan</p>
        </div>
        
        <div class="login-body">
            @if($errors->any())
                <div class="alert">
                    {{ $errors->first() }}
                </div>
            @endif
            
            <form action="{{ route('login') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" 
                           id="email"
                           name="email" 
                           class="form-control" 
                           placeholder="Masukkan email Anda"
                           required>
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" 
                           id="password"
                           name="password" 
                           class="form-control" 
                           placeholder="Masukkan password Anda"
                           required>
                </div>
                
                <button type="submit" class="btn-login">
                    Masuk
                </button>
            </form>
            
            <div class="login-footer">
                <p class="mb-0 text-muted">
                    Belum punya akun? 
                    <a href="{{ route('register') }}">Daftar di sini</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection