<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>Sign In - Your System Name</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
</head>

<body class="app">
    <div id="loader">
        <div class="spinner"></div>
    </div>
    <div class="peers ai-s fxw-nw h-100vh">
        <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv"
            style='background-image:url("images/bg.jpg")'>
            <div class="pos-a centerXY">
                <div class="row text-center">
                    <div>
                        <img class="mw-50" src="images/logo.png" alt="">
                    </div>
                </div>
                <div class="row" style="color:white">
                    <h3>YOUR INFORMATION SYSTEM NAME</h3>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style="min-width:320px">
            <div class="row text-center" id="mobile-logo">
                <div class="col-offset-5 mb-1">
                    <img class="img-fluid" src="images/logo.png" alt="">
                    <h3>YOUR INFORMATION SYSTEM NAME</h3>
                </div>
            </div>
            <h4 class="fw-300 c-grey-900 mB-10">Login</h4>
            @if (count($errors) > 0)
            <div class="alert alert-danger" style="margin-bottom: unset; padding: .3rem;">
                @foreach($errors->all() as $message)
                <small class="text-danger"><strong>
                        <p style="margin-bottom: unset;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16"
                                role="img" aria-label="Warning:">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                            {{ $message }}</p>
                    </strong></small>
                @endforeach
            </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label class="text-normal text-dark form-label">Username</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="text-normal text-dark form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="">
                    <div class="peers ai-c jc-sb fxw-nw">
                        <div class="peer">
                            <div class="checkbox checkbox-circle checkbox-info peers ai-c"><input type="checkbox"
                                    id="inputCall1" name="inputCheckboxesCall" class="peer"> <label for="inputCall1"
                                    class="peers peer-greed js-sb ai-c form-label"><span
                                        class="peer peer-greed">Remember Me</span></label></div>
                        </div>
                        <div class="peer"><button type="submit" class="btn btn-primary btn-color">Login</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

<script>
    window.addEventListener("load", (function () {
        const t = document.getElementById("loader");
        setTimeout((function () {
            t.classList.add("fadeOut")
        }), 300)
    }))

    var x = document.getElementById("mobile-logo");

    if ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
</script>
</html>
