<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://use.fontawesome.com/6f05757a67.js"></script>
  <title>Lotere Amnida</title>
  <style>
    .pagination nav {
      background-color: #ececec !important;
    }

    body {
      background-color: #ececec;
    }

    nav {
      background-color: rgb(8, 51, 94);

    }

    li {
      font-weight: bold;
    }

        .btn-purple {
            background-color: rgb(8, 51, 94);
            font-weight: bold;
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar navbar-dark sticky-top mx-auto px-2 py-3">
        <div class="container-fluid">
            {{-- <a class="navbar-brand" href="/article">
        <img src="/images/logo2.png" width="50" alt="">
        </a> --}}
            <h3 class="mx-3 mt-1" style="color: white">
                <a href="/" class='mx-3 mt-1' style="color:white">
                    Lotere Amnida
                </a>
            </h3>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active mx-2 mt-1" style="text-align:center" aria-current="page"
                            href="/">{{__('template.home')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active mx-2 mt-1" style="text-align:center" aria-current="page"
                            href="/articles">{{__('template.artikel')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active mx-2 mt-1" style="text-align:center; color:aquamarine"
                            aria-current="page" href="/voting">{{__('template.vote-now')}}</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    @php $locale = session()->get('locale'); @endphp
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            v-pre>
                            @switch($locale)
                                @case('en')
                                    EN
                                @break

                                @case('id')
                                    ID
                                @break

                                @default
                                    ID
                            @endswitch
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="lang/en">EN</a>
                            <a class="dropdown-item" href="lang/id">ID</a>
                        </div>
                    </li>
                </ul> 
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-outline-danger ms-2" type="submit" name="logout">Log out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light ms-2">Log in</a>
                @endauth
            </div>
        </div>
    </nav>
    <div class="container m-auto">
        @yield('container')
    </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
  </script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
  </script>

</body>

</html>