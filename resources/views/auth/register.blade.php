<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | {{config('app.name')}}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css?v=3.2.0">
    <script nonce="def0a19d-6550-4e6d-9857-2a7e46bfeb81">
        (function(w, d) {
            ! function(f, g, h, i) {
                f[h] = f[h] || {};
                f[h].executed = [];
                f.zaraz = {
                    deferred: [],
                    listeners: []
                };
                f.zaraz.q = [];
                f.zaraz._f = function(j) {
                    return function() {
                        var k = Array.prototype.slice.call(arguments);
                        f.zaraz.q.push({
                            m: j,
                            a: k
                        })
                    }
                };
                for (const l of ["track", "set", "debug"]) f.zaraz[l] = f.zaraz._f(l);
                f.zaraz.init = () => {
                    var m = g.getElementsByTagName(i)[0],
                        n = g.createElement(i),
                        o = g.getElementsByTagName("title")[0];
                    o && (f[h].t = g.getElementsByTagName("title")[0].text);
                    f[h].x = Math.random();
                    f[h].w = f.screen.width;
                    f[h].h = f.screen.height;
                    f[h].j = f.innerHeight;
                    f[h].e = f.innerWidth;
                    f[h].l = f.location.href;
                    f[h].r = g.referrer;
                    f[h].k = f.screen.colorDepth;
                    f[h].n = g.characterSet;
                    f[h].o = (new Date).getTimezoneOffset();
                    if (f.dataLayer)
                        for (const s of Object.entries(Object.entries(dataLayer).reduce(((t, u) => ({
                                ...t[1],
                                ...u[1]
                            }))))) zaraz.set(s[0], s[1], {
                            scope: "page"
                        });
                    f[h].q = [];
                    for (; f.zaraz.q.length;) {
                        const v = f.zaraz.q.shift();
                        f[h].q.push(v)
                    }
                    n.defer = !0;
                    for (const w of [localStorage, sessionStorage]) Object.keys(w || {}).filter((y => y.startsWith("_zaraz_"))).forEach((x => {
                        try {
                            f[h]["z_" + x.slice(7)] = JSON.parse(w.getItem(x))
                        } catch {
                            f[h]["z_" + x.slice(7)] = w.getItem(x)
                        }
                    }));
                    n.referrerPolicy = "origin";
                    n.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(f[h])));
                    m.parentNode.insertBefore(n, m)
                };
                ["complete", "interactive"].includes(g.readyState) ? zaraz.init() : f.addEventListener("DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
</head>

<body class="hold-transition register-page bg-dark">
    <div class="register-box">
        <div class="register-logo">
            <a href="{{url('/')}}" style="color: white;"><b>PIN</b>TU</a>
        </div>
        <div class="card">
            <div class="card-body register-card-body bg-dark">
                <p class="login-box-msg">Daftar</p>
                <form action="{{route('register.store')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{old('nama')}}" name="nama" placeholder="Nama" autofocus autocomplete="off" required>
                        <div class="input-group-append">
                            <div class="input-group-text bg-dark">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        
                        @error('nama')
                        <div class="invalid-feedback d-block d-block">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" value="{{old('email')}}" name="email" placeholder="Email" autocomplete="off" required>
                        <div class="input-group-append">
                            <div class="input-group-text bg-dark">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        
                        @error('email')
                        <div class="invalid-feedback d-block d-block">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" value="{{old('password')}}" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text bg-dark">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <div class="invalid-feedback d-block">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" value="{{old('password_confirmation')}}" name="password_confirmation" placeholder="Konfirmasi password" required>
                        <div class="input-group-append">
                            <div class="input-group-text bg-dark">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password_confirmation')
                        <div class="invalid-feedback d-block">{{$message}}</div>
                        @enderror
                    </div>
                    @captcha
                    <input type="text" id="captcha" name="captcha" autocomplete="off">
                    <button type="button" onclick="document.querySelector('img').src=document.querySelector('img').currentSrc; this.disabled = true; document.querySelector('img').onload=()=>this.disabled = false;"><i class="fas fa-undo"></i></button>
                    @error('captcha')
                    <div class="invalid-feedback d-block">{{$message}}</div>
                    @enderror
                    <div class="row">
                        <div class="col-8">
                            <a href="login" class="text-center">Sudah memiliki akun?</a>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fas fa-user-plus"></i> Daftar</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>


    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>

    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="/adminlte/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>