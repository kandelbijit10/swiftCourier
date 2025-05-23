<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login - Swift Courier</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #75a0cb 0%, #98b4d8 100%)!
            display: flex;
            flex-direction: column;
        }
        
        .login-container {
            display: flex;
            flex-grow: 1;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        
        .login-wrapper {
            display: flex;
            max-width: 1000px;
            width: 100%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
        }
        
        .login-form-container {
            flex: 1;
            padding: 3rem;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .login-image {
            flex: 1;
            background: linear-gradient(rgba(59, 130, 246, 0.8), rgba(59, 130, 246, 0.8)), 
                        url('https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            padding: 2rem;
        }
        
        .login-image-content {
            text-align: center;
        }
        
        .login-image h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        
        .login-image p {
            opacity: 0.9;
            line-height: 1.6;
        }
        
        .login-form-container h2 {
            font-size: 2rem;
            color: #1e3a8a;
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .input-box {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .input-box input {
            width: 100%;
            padding: 1rem 1rem 1rem 2.5rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: #f8fafc;
        }
        
        .input-box input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
        
        .input-box label {
            position: absolute;
            left: 2.5rem;
            top: 1rem;
            color: #64748b;
            transition: all 0.3s ease;
            pointer-events: none;
        }
        
        .input-box input:focus + label,
        .input-box input:not(:placeholder-shown) + label {
            transform: translateY(-1.5rem) translateX(-1rem) scale(0.85);
            background: white;
            padding: 0 0.5rem;
            color: #3b82f6;
        }
        
        .input-box .icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
        }
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }
        
        .remember-forgot label {
            display: flex;
            align-items: center;
            color: #64748b;
            cursor: pointer;
        }
        
        .remember-forgot input {
            margin-right: 0.5rem;
            accent-color: #3b82f6;
        }
        
        .remember-forgot a {
            color: #3b82f6;
            text-decoration: none;
        }
        
        .remember-forgot a:hover {
            text-decoration: underline;
        }
        
        .btn {
            width: 100%;
            padding: 1rem;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }
        
        .btn:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3);
        }
        
        .login-register {
            text-align: center;
            color: #64748b;
        }
        
        .login-register a {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 600;
        }
        
        .login-register a:hover {
            text-decoration: underline;
        }
        
        .alert {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 8px;
            font-size: 0.9rem;
        }
        
        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }
        
        .alert-danger {
            background-color: #fee2e2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }
        
        .alert-danger ul {
            list-style-type: none;
        }
        
        @media (max-width: 768px) {
            .login-wrapper {
                flex-direction: column;
            }
            
            .login-image {
                display: none;
            }
        }
    </style>
</head>
<body>
    @include("header.nav")
    
    <div class="login-container">
        <div class="login-wrapper">
            <div class="login-form-container">
                <h2>Customer Login</h2>
                
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                
                <form action="{{ route('loginpost') }}" method="POST">
                    @csrf
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" id="email" name="email" required placeholder=" ">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" id="password" name="password" required placeholder=" ">
                        <label for="password">Password</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox" name="remember"> Remember me</label>
                        <a href="#">Forgot Password?</a>
                    </div>
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <button type="submit" class="btn">Login</button>
                    
                    <div class="login-register">
                        <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
                    </div>
                </form>
            </div>
            
            <div class="login-image">
                <div class="login-image-content">
                    <h2>Welcome Back to Swift Courier</h2>
                    <p>Track your shipments, manage deliveries, and experience seamless logistics with our premium services.</p>
                </div>
            </div>
        </div>
    </div>
    
    @include('footer.footer')
    
    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>