<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lock Screen - Fortrigge PMS</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        body {
            background-color: #f4f6f9;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .lock-screen-container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .lock-screen-container img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="lock-screen-container">
        <div class="text-center mb-4">
            <img src="{{ asset('assets/images/users/' . (Auth::user()->profile_picture ?? 'default.jpg')) }}" alt="Profile Picture" class="img-thumbnail">
            <h3 class="mt-3">Your Account is Locked</h3>
            <p>Please enter your password to unlock your account and continue.</p>
        </div>

        <form action="{{ route('lock-screen.unlock') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @error('password')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Unlock</button>
        </form>
    </div>

    <!-- Include JavaScript files if necessary -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
