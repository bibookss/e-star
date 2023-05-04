<!-- Button trigger modal -->
<button type="button" class="btn text-white px-4 py-2 rounded-4" 
data-bs-toggle="modal" data-bs-target="#signIn">
  Sign-in
</button>

<!-- Modal -->
<div class="modal fade" id="signIn" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered text-center">
    <div class="modal-content sign-in-modal">
      <div class="modal-body ">
          <button class="btn d-flex flex-row-reverse right" data-bs-dismiss="modal" aria-label="Close">
              <i class="fa-regular fa-circle-xmark fa-2xl"></i>
          </button>
          <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="container">
                <div class="fs-2 fw-bold pt-2">Sign-in</div>
                <br>
                <input type="email" class=" my-2 center rounded-2 p-2 email" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" required>
                <br>
                <input type="password" class="password rounded-2 p-2 my-2" id="pass" name="password" minlength="8" placeholder="Password" required>
                <br>
                <a class="text-primary" href="#"><u>Forgot password?</u></a>
                <br>
                <input class="ylw-btn rounded-4 px-2 py-1 my-2" type="submit" value="Continue" style="width: 20rem;">
              </div>
          </form>
          <div class="fs-5 fw-bold hr2">or use</div>           
          <button class="google-btn rounded-4 px-2 py-1 my-2" style="width: 20rem;"><i class="fa-brands fa-google mx-2"></i> Sign-in with Google</button>
          <div class="fs-5 fw-bold hr3">or</div> 
      </div>
    </div>
  </div>
</div>