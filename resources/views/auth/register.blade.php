<x-guest-layout>
  <div class="auth-bg" style="background: url('{{ asset('images/register-bg.png') }}'); background-size: cover;"></div>

    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Failed!</strong>  {{ session('error') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="{{ asset('css/logo2.png')}}">
                </div>
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <form class="pt-3" method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Username Field -->
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name="username" placeholder="Username" value="{{ old('username')}}">
                  </div>
                  <x-input-error :messages="$errors->get('username')" class="mt-2" />
                  <!-- Email Field -->
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" value="{{ old('email') }}" name="email">
                  </div>
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  <!-- Country Field -->
                  <div class="form-group">
                    <select class="form-select form-select-lg" id="exampleFormControlSelect2" name="country" style="color: black">
                      <option value="">-- Select Country --</option>
                      <option value="USA" style="color: black">USA</option>
                      <option value="UK" style="color: black">UK</option>
                      <option value="India" style="color: black">India</option>
                      <option value="Germany" style="color: black">Germany</option>
                      <option value="Argentina" style="color: black">Argentina</option>
                    </select>
                  </div>
                  <x-input-error :messages="$errors->get('country')" class="mt-2" />
                  <!-- Password Field -->
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="password" required autocomplete="new-password" id="password" placeholder="Password">
                  </div>
                  <div class="block mt-4 mb-3">
                      <label for="show_pass" class="inline-flex items-center">
                          <input id="show_pass" onclick="togglePassword()" type="checkbox" class="rounded light:bg-gray-900 border-black-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="show_pass">
                          <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Show Password') }}</span>
                      </label>
                  </div>
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  <!-- Confirm Password Field -->
                  <div class="form-group">
                    <input type="password" required autocomplete="new-password" class="form-control form-control-lg" style="border: 1px solid black" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                  </div>
                  <x-input-error :messages="$errors->get('password_confirmation')" />
                  <div class="block mt-4 mb-3">
                      <label for="show_confirm_pass" class="inline-flex items-center">
                          <input id="show_confirm_pass" onclick="togglePassword1()" type="checkbox" class="rounded light:bg-gray-900 border-black-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="show_confirm_pass">
                          <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Show Password') }}</span>
                      </label>
                  </div>
                  <div class="mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"  >SIGN UP</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
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
    <!-- container-scroller -->
    <!-- plugins:js -->
</x-guest-layout>
<script>
    function togglePassword(){
        const passwordInput = document.getElementById("password");
        if(passwordInput.type === "password"){
            passwordInput.type = "text";
        }else{
            passwordInput.type = "password";
        }
    }
</script>

<script>
    function togglePassword1(){
        const passwordInput = document.getElementById("password_confirmation");
        if(passwordInput.type === "password"){
            passwordInput.type = "text";
        }else{
            passwordInput.type = "password";
        }
    }
</script>
