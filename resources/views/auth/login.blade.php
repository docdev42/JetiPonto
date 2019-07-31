@extends('layouts.app')

@section('content')
  <section class="login is-fullheight">
      <div class="login-body">
        <div class="container v-middle">
          <div class="columns login-page">
              <div class="column is-5 login-sidebar is-hidden-mobile">
                <div class="login-gradient-background">
                  <img src="https://www.jetimob.com/wp-content/uploads/2018/09/logo-jetimob-branco.png">                        
                  
                </div>
              </div>
              
                <div class="column is-7 field-box">
                  <div class="column is-7 is-offset-1">
                    <h1 class="login-heading">Bem Vindo ao JetPonto</h1>                    
                    <form method="POST" action="{{ route('login') }}">
                      @csrf
                      <div class="field">

                        <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-Mail') }}</label>
                        <p class="control has-icons-left has-icons-right">                          
                          <input class="input is-medium @error('email') is-invalid @enderror" type="email" placeholder="E-mail" value="{{ old('email') }}" name="email" autofocus required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          <span class="icon is-medium is-left">
                            <i class="fa fa-envelope"></i>
                          </span>
                          <span class="icon is-small is-right">
                            <i class="fa fa-check"></i>
                          </span>
                        </p>
                      </div>
                      <div class="field">
                        <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Senha') }}</label>
                        <p class="control has-icons-left has-icons-right">
                          <input class="input is-medium @error('password') is-invalid @enderror" type="password" placeholder="Senha" name="password" required autocomplete="current-password">
                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          <span class="icon is-medium is-left">
                            <i class="fa fa-lock"></i>
                          </span>
                          <span class="icon is-small is-right">
                            <i class="fa fa-eye"></i>
                          </span>
                        </p>
                      </div>

                      <div class="field">
                        <p class="control">
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                  <label class="form-check-label" for="remember">
                                      {{ __('Lembrar') }}
                                  </label>
                              </div>
                        </p>
                      </div>                    

                      <div class="field is-grouped is-grouped-centered login-btn-group">
                        <p class="control">
                          <button class="button is-link is-rounded">
                          {{ __('Login') }}
                          </button>                         
                        </p>
                        @if (Route::has('password.request'))
                        <p class="control">
                          <a class="forgot-link" href="{{ route('password.request') }}">
                            {{ __('Esqueceu a Senha?') }}
                          </a>
                        </p>
                        @endif
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- is-8 ends -->
          </div>
        </div>
        <!-- div.container ends -->
      </div>
  </section>
  

@endsection