{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="icon" href="{{ asset('assets/logo-udinus.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
</head>
<body>
    <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8 px-6">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto h-20 w-auto" src="{{ asset('assets/logo-udinus.png') }}" alt="logo-udinus">
            <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                Sign in to your account
            </h2>
        </div>
    
    
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                @if (session('success'))
                    <div class="mt-3 bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="mt-3 bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                        {{ session('error') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium leading-5  text-gray-700">Email address</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="email" name="email" placeholder="user@example.com" type="email" required="" value="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            <div class="hidden absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
    
                    <div class="mt-6">
                        <label for="password" class="block text-sm font-medium leading-5 text-gray-700">Password</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="password" name="password" type="password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="********">
                        </div>
                    </div>
    
                    <div class="mt-6 flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox" value="1" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                            <label for="remember_me" class="ml-2 block text-sm leading-5 text-gray-900">Remember me</label>
                        </div>
    
                        <div class="text-sm leading-5">
                            <a href="#"
                                class="font-medium text-blue-500 hover:text-blue-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                                Forgot your password?
                            </a>
                        </div>
                    </div>
    
                    <div class="mt-6">
                        <span class="block w-full rounded-md shadow-sm">
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition duration-150 ease-in-out">
                  Sign in
                </button>
              </span>
                    </div>
                </form>
    
            </div>
        </div>
    </div>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="{{ asset('assets/logo-udinus.png') }}" type="image/x-icon">
    {{-- @vite('resources/css/app.css') --}}
    <link rel="stylesheet" href="{{ asset('build/assets/app-Czl1uA6v.css') }}">
    <script type="module" src="{{ asset('build/assets/app-z-Rg4TxU.js') }}"></script>
    <style>
        body {
            background-color: #ffffff;
            font-family: 'Poppins', sans-serif;
            color: #1e3a8a;
        }

        .glass-box {
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            padding: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .glass-box:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.2);
        }

        .custom-button {
            background-color: #f59e0b;
            font-weight: bold;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .custom-button:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 20px rgba(34, 44, 85, 0.4);
        }

        .neon-link {
            color: #f59e0b;
            font-weight: bold;
            text-shadow: 0 0 8px rgba(245, 158, 11, 0.6);
            transition: text-shadow 0.3s ease;
        }

        .neon-link:hover {
            text-shadow: 0 0 15px rgba(245, 158, 11, 1);
        }

        .logo-container {
            position: absolute;
            top: 5%;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            margin-bottom: 30px;
        }

        .logo-container img {
            width: 80px;
            height: 80px;
        }
    </style>
</head>

<body class="h-screen flex items-center justify-center relative">

    <!-- Form Login -->
    <div class="glass-box w-full max-w-md text-center">
        <h2 class="text-3xl font-bold text-blue-900 mb-6">Masuk ke akun Anda</h2>
        @if (session('success'))
            <div class="mt-3 bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="mt-3 bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                {{ session('error') }}
            </div>
        @endif
        <form id="loginForm" class="space-y-6" method="POST" action="{{ route('admin.login') }}">
            @csrf
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm text-blue-900 font-semibold">Alamat Email</label>
                <input type="email" id="email" name="email" placeholder="user@example.com"
                    class="w-full px-4 py-2 mt-2 rounded-lg bg-white text-blue-900 placeholder-blue-900 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                    required>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm text-blue-900 font-semibold">Kata Sandi</label>
                <input type="password" id="password" name="password" placeholder="••••••••"
                    class="w-full px-4 py-2 mt-2 rounded-lg bg-white text-blue-900 placeholder-blue-900 focus:outline-none focus:ring-2 focus:ring-yellow-300"
                    required>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between text-sm text-blue-900">
                <label class="flex items-center">
                    <input type="checkbox" class="mr-2 focus:ring-yellow-300">
                    Ingat Saya
                </label>
                <a href="#" class="neon-link">Lupa Kata Sandi?</a>
            </div>

            <!-- Tombol Login -->
            <button id="buttonSubmit" type="submit"
                class="custom-button w-full py-3 rounded-lg inline-flex text-center items-center justify-center">
                <span id="buttonText">Masuk</span>
                {{-- spinner --}}
                <svg id="spinner" aria-hidden="true"
                    class="hidden w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
            </button>
        </form>
    </div>
</body>
<script>
    const loginForm = document.getElementById('loginForm');
    loginForm.addEventListener('submit', function() {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const button = document.getElementById('buttonSubmit');
        const spinner = document.getElementById('spinner');
        const buttonText = document.getElementById('buttonText');

        button.disabled = true;
        buttonText.classList.add('hidden');
        spinner.classList.remove('hidden');

        if (email === '' || password === '') {
            alert('Email dan Password tidak boleh kosong!');
            event.preventDefault();
        }
    });
</script>

</html>
