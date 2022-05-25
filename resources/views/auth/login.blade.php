<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="d-flex align-items-center text-center min-vh-100 min-vw-100">
        <form action="{{ route('login') }}" method="POST" class="mx-auto w-25">
            @csrf
            <h1 class="mb-5 mt-n3 fw-bold font-monospace">LOTERE AMNIDA</h1>
            <h4 class="my-4 fw-normal">Sign In</h4>

            <div class="form-floating">
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="floatingEmail" placeholder="name@example.com">
                <label for="floatingEmail">Email address</label>
                @error('email')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
                @error('password')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="w-100 text-start mt-1">
                <a href="#">Forgot Password?</a>
            </div>
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Sign in</button>
            <h6 class="my-2 fw-normal">OR</h6>
            <a class="w-100 btn btn-lg btn-secondary" href="{{ route('register') }}">Register</a>
        </form>

    </div>
</body>

</html>