@extends("layout.default")
@section("title", "Register")
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 500px; /* Set width of the container */
            height: 500px; /* Set height of the container (adjust as needed) */
            text-align: center;
            display: flex;
            flex-direction: column; /* Aligns children vertically */
            justify-content: center; /* Centers children vertically */
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%; /* Full width of the container */
            height: 40px; /* Set height of input fields */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px; /* Adjust font size if needed */
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }

        .text-danger {
            color: red;
            font-size: 0.875em;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%; /* Full width of the button */
            font-size: 16px;
            height: 45px; /* Set height of the button */
        }

        button:hover {
            background-color: #0056b3;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        @if (session()->has("success"))
        <div class="alert alert-success">
            {{ session()->get("success") }}
        </div>
        @endif

        @if (session()->has("error"))
        <div class="alert alert-error">
            {{ session()->get("error") }}
        </div>
        @endif

        <h2>Register</h2>
        <form method="POST" action="{{ route('register.post') }}">
            @csrf

            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required autofocus>
            @if ($errors->has('fullname'))
            <span class="text-danger">
                {{ $errors->first('fullname') }}
            </span>
            @endif

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            @if ($errors->has('email'))
            <span class="text-danger">
                {{ $errors->first('email') }}
            </span>
            @endif

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            @if ($errors->has('password'))
            <span class="text-danger">
                {{ $errors->first('password') }}
            </span>
            @endif

            <button type="submit">Sign Up</button>
            <div class="flex items-center mt-2">
                <p class="mr-2">Already have an account?</p>
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login here</a>
            </div>
        </form>
    </div>
</body>
</html>
@endsection
