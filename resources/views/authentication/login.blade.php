@extends('authentication.layouts.app')

@section('title', 'Masuk')

@section('content')
<div class="row h-100">
  <div class="col-lg-5 col-12">
    <div id="auth-left">
      <h1 class="auth-title">Masuk</h1>
      <p class="auth-subtitle mb-5">
        Masuk untuk melanjutkan.
      </p>
      @include('utilities.alert')
      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
          <input type="email" name="email" class="form-control form-control-xl" placeholder="Email"
            value="{{ old('email') }}" autofocus required />
          <div class="form-control-icon">
            <i class="bi bi-person"></i>
          </div>
          @error('email', 'authentication')
          <div class="d-block invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
          <input type="password" name="password" class="form-control form-control-xl" placeholder="Password" required />
          <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
          </div>
          @error('password', 'authentication')
          <div class="d-block invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
          <select class="form-select" name="type" required>
            <option value="">Login Sebagai</option>
            <option value="administrator">Administrator</option>
            <!-- <option value="officer">Petugas</option> -->
            <option value="student">Mahasiswa</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
          Masuk
        </button>
      </form>
      <!-- <center><br><p>Repost by <a href='https://stokcoding.com/' title='StokCoding.com' target='_blank'>StokCoding.com</a></p></center> -->
    </div>
  </div>
  <div class="col-lg-7 d-none d-lg-block">
    <div id="auth-right"></div>
  </div>
</div>
@endsection
