    @extends('layouts.master')

@section('content')
 <div class="container">
     <div class="row">
        <form class="form-signin" method="POST" action="{{ route('login') }}">
             @csrf
              <h1 class="h3 mb-3 font-weight-normal" style="text-align: center;">{{ __('Login') }}</h1>
              <label for="inputEmail" class="sr-only">{{'Email address'}}</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
              @error('email')
                 <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror

              <label for="inputPassword" class="sr-only">{{'Password'}}</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
             @error('password')
                 <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                 </span>
             @enderror
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
     </div>
 </div>
@endsection
