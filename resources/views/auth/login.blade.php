@extends('layout.common')
@section('title', 'Нэвтрэх')
@include('layout.header')
@section('content')
<section class="vh-50 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-3 col-lg-6 col-xl-5">
        <div class="card bg-black text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <form method="POST" action="{{ route('login') }}">
              @csrf
            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase">Нэвтрэх</h2>
              <p class="fw-bold mb-2 text-uppercase">Та и-мэйлмэйл нууц үгээ оруулна уу!</p>
              <div class="form-outline form-white mb-4">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="И-мэйл" />
                @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              <div class="form-outline form-white mb-4">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Нууц үг" >
                  @error('password')
                  <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
              </div>
              <div class="row mb-3">
                <div class="col-md-5 offset-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Нууц үг санах ') }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-5 offset-md-3">
                  <button class="btn btn-outline-light btn-lg px-5" type="submit">Нэвтрэх</button>
                </div>
           </div>
           
          </form>
          </div>
          <div>
            @if (Route::has('password.request'))
            <p class="mb-0"> <a href="{{ route('password.request') }}" class="text-light bg-dark">Нууц үг мартсан</a>
            @endif
            <p class="mb-0"> <a href="{{ route('register') }}" class="text-light bg-dark">Шинээр бүртгүүлэх</a>
            </p>
          </div>
      </div>
    </div>
    
  </div>
</section>
@endsection
@include('layout.footer')