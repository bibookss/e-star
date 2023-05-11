<div>
    <!-- Button trigger modal -->
    {{-- if not logged in --}}
        {{-- sign up page --}}
    {{-- if logged in --}}
    <button type="button" class="btn blue-btn" data-bs-toggle="modal" data-bs-target="#updateReview">
        Edit
    </button>
  
  <!-- Modal -->
    <div class="modal fade" id="updateReview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content modal-review">
                <div class="modal-body d-flex p-4">
                    <div class="fs-2 flex-grow-1 fw-bold ps-2"> Update your review</div>
                    <button class="btn" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-regular fa-circle-xmark fa-2xl"></i>
                    </button>
                </div>
                <form method="POST" action="{{ route('edit-post', ['post' => $post['postId']]) }}">
                    @csrf
                    @method('PATCH')
                    <div class="px-5">
                        <textarea rows="7" style="width:900px;" class=" write-review p-4 rounded-4" placeholder="Write something..." aria-label="review-text" name="review" required></textarea>
                        <br>
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_TZvjSDdby2.json" class="ms-auto mt-3" background="transparent"  speed="1"  
                        style="width: 125px; height: 125px; z-index:5; position: absolute; right:0px;" autoplay></lottie-player>
                        
                          <!--- Slider -->
                          <p class="fw-bold px-3 pt-3 fs-3">Rating</p>
                          <div class="card">
                             <div class="row p-3">
                                 <div class="col-3 fw-bold fs-4">Room:</div>
                                 <div class="col-8">
                                     <input type="range" class="slider" min="1" max="5" value="0" id="slider1" name="securityRating" required>
                                 </div>
                                 <div class="col-1">
                                     <span class="fw-bold fs-4 px-2" id="sliderValue1"></span>            
                                 </div>
                             </div>
                             <div class="row p-3">
                                 <div class="col-3 fw-bold fs-4">Bathroom:</div>
                                 <div class="col-8">
                                     <input type="range" class="slider" min="1" max="5" value="0" id="slider2" name="bathroomRating" required>
                                 </div>
                                 <div class="col-1">
                                     <span class="fw-bold fs-4 px-2" id="sliderValue2"></span>            
                                 </div>
                             </div>
                             <div class="row p-3">
                                 <div class="col-3 fw-bold fs-4">Location:</div>
                                 <div class="col-8">
                                     <input type="range" class="slider" min="1" max="5" value="0" id="slider3" name="locationRating" required>
                                 </div>
                                 <div class="col-1">
                                     <span class="fw-bold fs-4 px-2" id="sliderValue3"></span>            
                                 </div>
                             </div>
                             <div class="row p-3">
                                 <div class="col-3 fw-bold fs-4">Internet:</div>
                                 <div class="col-8">
                                     <input type="range" class="slider" min="1" max="5" value="0" id="slider4" name="internetRating" required>
                                 </div>
                                 <div class="col-1">
                                     <span class="fw-bold fs-4 px-2" id="sliderValue4"></span>            
                                 </div>
                             </div>
                         </div>
                        
                    </div>
                    <div class="p-5 ">
                        <div class="d-flex pt-2">
                            <button type="submit" class="btn ylw-btn ms-auto" >Update review</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

<script>
    function updateOutput1() {
        var output = document.getElementById("sliderValue1");
        output.innerHTML = document.getElementById("slider1").value;
    }

    function updateOutput2() {
        var output = document.getElementById("sliderValue2");
        output.innerHTML = document.getElementById("slider2").value;
    }

    function updateOutput3() {
        var output = document.getElementById("sliderValue3");
        output.innerHTML = document.getElementById("slider3").value;
    }

    function updateOutput4() {
        var output = document.getElementById("sliderValue4");
        output.innerHTML = document.getElementById("slider4").value;
    }

    document.getElementById("slider1").oninput = updateOutput1;
    document.getElementById("slider2").oninput = updateOutput2;
    document.getElementById("slider3").oninput = updateOutput3;
    document.getElementById("slider4").oninput = updateOutput4;
</script>

<style>
    .slidecontainer {
      width: 100%;
    }
    
    .slider {
      -webkit-appearance: none;
      width: 60%;
      height: 15px;
      background: #d3d3d3;
      outline: none;
      opacity: 0.7;
      -webkit-transition: .2s;
      transition: opacity .2s;
      border-radius:15px;
      
    }
    
    .slider:hover {
      opacity: 1;
    }
    
    .slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 20px;
      height: 20px;
      background: #ffd43b;
      cursor: pointer;
      border-radius:50%;
      border: 2px solid black;
    }
    
    .slider::-moz-range-thumb {
      width: 25px;
      height: 25px;
      background: #04AA6D;
      cursor: pointer;
    }
</style>

<script>
    function updateOutput1() {
        var output = document.getElementById("sliderValue1");
        output.innerHTML = document.getElementById("slider1").value;
    }

    function updateOutput2() {
        var output = document.getElementById("sliderValue2");
        output.innerHTML = document.getElementById("slider2").value;
    }

    function updateOutput3() {
        var output = document.getElementById("sliderValue3");
        output.innerHTML = document.getElementById("slider3").value;
    }

    function updateOutput4() {
        var output = document.getElementById("sliderValue4");
        output.innerHTML = document.getElementById("slider4").value;
    }

    document.getElementById("slider1").oninput = updateOutput1;
    document.getElementById("slider2").oninput = updateOutput2;
    document.getElementById("slider3").oninput = updateOutput3;
    document.getElementById("slider4").oninput = updateOutput4;
</script>
