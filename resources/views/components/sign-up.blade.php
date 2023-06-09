<!-- Button trigger modal -->
<button type="button" class="btn ylw-btn rounded-4 px-3 m-0" 
        data-bs-toggle="modal" data-bs-target="#createAccount">
  Sign-up
</button>

<!-- Modal -->
<div class="modal fade" id="createAccount"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered text-center">
    <div class="modal-content sign-in-modal">
      <div class="modal-body ">
          <button class="btn d-flex flex-row-reverse right" data-bs-dismiss="modal" aria-label="Close">
              <i class="fa-regular fa-circle-xmark fa-2xl"></i>
          </button>
          <form action="{{ route('register') }}" method="POST" >
            @csrf
            <div class="container pb-3">
                  <div class="fs-2 fw-bold pt-2">Create Account</div>
                  <br>
                  <input type="email" class=" my-2 center rounded-2 p-2 email-input" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Email" required>
                  <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                  <br>
                  <input type="password" class="password rounded-2 p-2 my-2" id="pass" name="password" minlength="8" placeholder="Password" required>
                  <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                  <br>
                  <div class="form-check m-0 p-0">
                    <input  required class="form-check-input sign-up-check border-2 ms-2" type="checkbox" value="" id="flexCheckDefault">
                      I agree to the 
                      <u class="text-primary">Terms of Service</u>
                      and 
                      <u class="text-primary">Privacy Policy</u>
                  </div>
                  <a class="text-primary" href="#"><u>Forgot password?</u></a>
                  <br>
                  <input class="ylw-btn rounded-4 px-2 py-1 my-2" type="submit" value="Continue" style="width: 20rem;">
                  </div>
          </form>
          {{-- <div class="fs-5 fw-bold hr2">or use</div>           
          <button class="google-btn rounded-4 px-2 py-1 my-2" style="width: 20rem;"><i class="fa-brands fa-google mx-2"></i> Sign-in with Google</button> --}}
      </div>
    </div>
  </div>
</div>