@extends('layouts.app')

@section('content')
<style>
    .login-container {
        min-height: 100vh;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px 0;
    }
    
    .login-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        overflow: hidden;
        transition: transform 0.3s ease;
    }
    
    .login-card:hover {
        transform: translateY(-5px);
    }
    
    .login-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        text-align: center;
        position: relative;
    }
    
    .login-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }
    
    .login-header h3 {
        margin: 0;
        font-size: 2rem;
        font-weight: 700;
        position: relative;
        z-index: 1;
    }
    
    .login-header .subtitle {
        margin-top: 0.5rem;
        opacity: 0.9;
        font-size: 0.95rem;
        position: relative;
        z-index: 1;
    }
    
    .login-body {
        padding: 2.5rem;
    }
    
    .form-floating {
        margin-bottom: 1.5rem;
    }
    
    .form-floating > .form-control {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 1rem 0.75rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: rgba(248, 249, 250, 0.8);
    }
    
    .form-floating > .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        background: white;
        transform: translateY(-2px);
    }
    
    .form-floating > label {
        color: #6c757d;
        font-weight: 500;
    }
    
    .btn-login {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 12px;
        padding: 0.875rem 2rem;
        font-size: 1.1rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .btn-login::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }
    
    .btn-login:hover::before {
        left: 100%;
    }
    
    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
    }
    
    .alert-danger {
        border: none;
        border-radius: 12px;
        background: linear-gradient(135deg, #ff6b6b, #ee5a52);
        color: white;
        border-left: 4px solid #ff5252;
        font-weight: 500;
        animation: slideInDown 0.3s ease;
    }
    
    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .login-footer {
        text-align: center;
        padding-top: 1rem;
        border-top: 1px solid #e9ecef;
        margin-top: 1rem;
    }
    
    .login-footer a {
        color: #667eea;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }
    
    .login-footer a:hover {
        color: #764ba2;
        text-decoration: underline;
    }
    
    .icon-wrapper {
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        position: relative;
        z-index: 1;
    }
    
    .icon-wrapper svg {
        width: 30px;
        height: 30px;
        fill: white;
    }
    
    @media (max-width: 768px) {
        .login-container {
            padding: 10px;
        }
        
        .login-header,
        .login-body {
            padding: 1.5rem;
        }
        
        .login-header h3 {
            font-size: 1.5rem;
        }
    }
</style>

<div class="login-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="login-card">
                    <div class="login-header">
                        <div class="icon-wrapper">
                            <svg viewBox="0 0 24 24">
                                <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 1H5C3.89 1 3 1.89 3 3V21C3 22.11 3.89 23 5 23H11V21H5V3H13V9H21Z"/>
                            </svg>
                        </div>
                        <h3>Welcome Back</h3>
                        <p class="subtitle">Sign in to your account</p>
                    </div>
                    
                    <div class="login-body">
                        @if($errors->any())
                            <div class="alert alert-danger mb-4">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                {{ $errors->first() }}
                            </div>
                        @endif
                        
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            
                            <div class="form-floating">
                                <input type="email" 
                                       name="email" 
                                       class="form-control" 
                                       id="floatingEmail" 
                                       placeholder="name@example.com" 
                                       required>
                                <label for="floatingEmail">Email Address</label>
                            </div>
                            
                            <div class="form-floating">
                                <input type="password" 
                                       name="password" 
                                       class="form-control" 
                                       id="floatingPassword" 
                                       placeholder="Password" 
                                       required>
                                <label for="floatingPassword">Password</label>
                            </div>
                            
                            <button type="submit" class="btn btn-login w-100">
                                Sign In
                            </button>
                        </form>
                        
                        <div class="login-footer">
                            <p class="mb-0 text-muted">
                                Don't have an account? 
                                <a href="#" class="fw-bold">Create one here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection