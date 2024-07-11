<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Inter', sans-serif;
        }

        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 350px;
            margin: auto;
        }

        .card-header {
            background-color: #6366f1;
            color: #ffffff;
            padding: 1rem;
            text-align: center;
        }

        .card-body {
            padding: 1.5rem;
        }

        .form-control {
            border: 1px solid #d1d5db;
            border-radius: 5px;
            padding: 0.75rem;
            margin-bottom: 1rem;
            width: 100%;
            font-size: 0.875rem;
        }

        .form-control:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        .btn {
            background-color: #6366f1;
            color: #ffffff;
            border: none;
            padding: 0.75rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .btn:hover {
            background-color: #4338ca;
        }

        .link {
            color: #6366f1;
            text-decoration: underline;
            transition: color 0.3s ease;
        }

        .link:hover {
            color: #4338ca;
        }
    </style>
</head>

<body>
    <div class="min-h-screen flex items-center justify-center">
        <div class="card">
            <div class="card-header">
                <h2 class="text-2xl font-extrabold">Register</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('register.save') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Your name</label>
                        <input type="text" name="name" id="name" autocomplete="name" required class="form-control">
                        @error('name')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Your email</label>
                        <input type="email" name="email" id="email" autocomplete="email" required class="form-control">
                        @error('email')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password" autocomplete="new-password" required class="form-control">
                        @error('password')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password" required class="form-control">
                    </div>
                    <div class="flex items-center mt-4">
                        <input type="checkbox" id="terms" name="terms" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="terms" class="ml-2 block text-sm text-gray-900">I accept the <a href="#" class="link">Terms and Conditions</a></label>
                    </div>
                    <div>
                        <button type="submit" class="btn mt-4">Create an account</button>
                    </div>
                </form>
                <div class="text-sm text-center mt-4">
                    <p class="text-gray-600">Already have an account? <a href="{{ route('login') }}" class="link">Login here</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>