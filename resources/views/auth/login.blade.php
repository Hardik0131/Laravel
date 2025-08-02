<x-guest-layout>
  
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="{{ asset('css/logo2.png')}}">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" method="POST" action="{{ route('login') }}">
                  @csrf
                  <!-- email field -->
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="email">
                  </div>
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  <!-- password Field -->
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password" required autocomplete="current-password">
                  </div>
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  <div class="block mt-4 mb-3">
                      <label for="show_pass" class="inline-flex items-center">
                          <input id="show_pass" onclick="togglePassword()" type="checkbox" class="rounded light:bg-gray-900 border-black-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="show_pass">
                          <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Show Password') }}</span>
                      </label>
                  </div>
                  <div class="mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" >SIGN IN</button>
                  </div>
                  <div class=" mt-3 mb-3 d-flex justify-content-between align-items-center">
                    <a href="{{ route('password.request') }}" class="auth-link text-primary">Forgot password?</a>
                  </div>
                  <a href="{{ route('google.login')}}">
                      <button type="button" class="btn btn-block btn-facebook auth-form-btn" style="background-color: white; border: 2px solid black; color:black; "> 
                            <i class="mdi mdi-google"></i> Login with Google
                      </button>
                  </a>
                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="{{ route('register') }}" class="text-primary">Create</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
</x-guest-layout>

<script>
  function togglePassword(){
    const passwordInput = document.getElementById('password');

    if(passwordInput.type === 'password'){
      passwordInput.type = 'text';
    }else{
      passwordInput.type = 'password';
    }
  }
</script>