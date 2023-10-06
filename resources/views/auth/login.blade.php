@extends('layouts.app')

@section('content')

<style>
    body {
      background: #fff;
      font-family: 'PT Sans', sans-serif;
    }
    a {
      color: #333;
      text-decoration: none;
    }
    a:hover {
      color: #da5767;
    }
    .card {
      border: 0.4rem solid #f8f9fa;
      top: 10%;
    }
    .form-control {
      background-color: #f8f9fa;
      padding: 20px;
      padding: 25px 15px;
      margin-bottom: 1.3rem;
    }
    .form-control:focus {
      color: #000000;
      background-color: #ffffff;
      border: 3px solid #da5767;
      outline: 0;
      box-shadow: none;
    }
    .btn {
      padding: 0.6rem 1.2rem;
      background: #da5767;
      border: 2px solid #da5767;
    }
    .btn-primary:hover {
      background-color: #df8c96;
      border-color: #df8c96;
      transition: 0.3s;
    }
</style>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-title text-center">{{ __('Login')}}</div>
                  <div class="card-body">
                      <form method="POST" action="{{ route('login')}}">
                          @csrf
                          <div class="form-group input-group">
                                <input type="text" class="form-control" id="email" placeholder="Email" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                  <span style="height: 47px;" class="input-group-text"><i class="bi bi-envelope"></i></span>

                                @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                          </div>
                          <div class="form-group input-group">
                              <input type="password" placeholder="password" class="form-control" id="password" @error('password') is-invalid @enderror name="password" required autocomplete="current-password"/>
                                <span style="height: 47px;" class="input-group-text"><i class="bi bi-key"></i></span>
                              @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>

                          <div class="d-flex flex-row align-items-center justify-content-between">
                              @if(Route::has('password.request'))
                                  <a style="font-size: 1rem" href="{{ route('password.request') }}">{{ __('Forgot Your Password ?')}}</a>
                              @endif

                              <button type="submit" class="btn btn-primary">{{ __('Login')}}</button>
                          </div>
                      </form>
                  </div>
            </div>
        </div>
    </div>
@endsection
