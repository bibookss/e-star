<!-- Button trigger modal -->
<button type="button" class="btn ylw-btn text-white px-4 py-2 rounded-4" data-bs-toggle="modal" data-bs-target="#signIn">
    Sign-in
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="signIn" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-center">
      <div class="modal-content sign-in-modal">
        <div class="modal-body ">
            <button class="btn d-flex flex-row-reverse right" data-bs-dismiss="modal" aria-label="Close">
                <i class="fa-regular fa-circle-xmark fa-2xl"></i>
            </button>
            <div class="container ">
                <div class="fs-2 fw-bold p-2">e-Star</div>
                <div class="fs-5 fw-bold">Find sutiable dorms for you.</div>
                <br>
                <div class="fs-5 fw-bold py-2">Log-in or Sign-up for free</div>
                <input type="email" class="form-control my-2 center" style="width: 20rem;" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                <button class="ylw-btn rounded-4 px-2 py-1 my-2" style="width: 20rem;">Continue</button>
                <div class="fs-5 fw-bold hr2">or use</div>
                
                <button class="google-btn rounded-4 px-2 py-1 my-2" style="width: 20rem;"><i class="fa-brands fa-google mx-2"></i> Sign-in with Google</button>
            </div>
        </div>
      </div>
    </div>
  </div>