
@extends('layout.common')
@section('title', 'Бүргүүлэх')
@include('layout.header')
@section('content')
<section class="vh-50 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-3 col-lg-6 col-xl-5">
        <div class="card bg-black text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <form method="POST" action="{{ route('register') }}">
                @csrf
            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase">Бүртгүүлэх</h2>
              <p class="fw-bold mb-2 text-uppercase">Манайд бүртгүүлсэн танд баярлалаа!</p>
              <div class="form-outline form-white mb-4">
                   <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Нэр">
                    @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
              </div>
              <div class="form-outline form-white mb-4">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="N-мэйл">
                @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
              </div>
              <div class="form-outline form-white mb-4">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Нууц үг">
                    @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
              </div>
              <div class="form-outline form-white mb-4">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Нууц үг баталгаажуулах">
              </div>
            <div class="row mb-0">
                <div class="col-md-5 offset-md-3">
                  <button class="btn btn-outline-light btn-lg px-5" type="submit">Бүртгүүлэх</button>
                </div>
           </div>
          </form>
          </div>
      </div>
    </div>
  </div>
</section>
@endsection
@include('layout.footer')
