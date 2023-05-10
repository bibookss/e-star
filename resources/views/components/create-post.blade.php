<div>
    <!-- Button trigger modal -->
    {{-- if not logged in --}}
        {{-- sign up page --}}
    {{-- if logged in --}}
    <button type="button" class="btn ylw-btn px-5 py-2 rounded-4" data-bs-toggle="modal" data-bs-target="#writeReview">
        Write a Review
    </button>
  
  <!-- Modal -->
    <div class="modal fade" id="writeReview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content modal-review">
                <div class="modal-body d-flex p-4">
                    <div class="fs-2 flex-grow-1 fw-bold ps-2"> Write your review</div>
                    <button class="btn" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-regular fa-circle-xmark fa-2xl"></i>
                    </button>
                </div>
                <form method="POST" action="{{ route('add-post', ['dorm' => $dormId]) }}">
                    @csrf
                    <div class="px-5">
                        <textarea rows="7" style="width:900px;" class=" write-review p-4 rounded-4" placeholder="Write something..." aria-label="review-text" name="review" required></textarea>
                        <br>
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_TZvjSDdby2.json" class="ms-auto mt-3" background="transparent"  speed="1"  
                        style="width: 125px; height: 125px; z-index:5; position: absolute; right:0px;" autoplay></lottie-player>
                        
                         <!--- Slider -->
                         <p class="fw-bold px-3 pt-3 fs-3">Rating</p>
    
                         <div class="d-flex flex-column card">
                             <div class="p-3">
                                 <span class="fs-4 fw-bold pb-3 pe-5">Room:</span>
                                 <input type="range" min="1" max="5" value="0" id="slider1" class="slider " style="margin-left:110px;" required>
                                 <span class="ps-5 fw-bold fs-4 px-2" id="sliderValue1"></span>            
                             </div>
                             <div class="p-3">
                                 <span class="fs-4 fw-bold pb-3 pe-5">Bathrooom:</span>
                                 <input type="range" min="1" max="5" value="0" id="slider2" class="slider " style="margin-left:50px;" required>
                                 <span class="ps-5 fw-bold fs-4 px-2" id="sliderValue2"></span>
                             </div>
                             <div class="p-3">
                                 <span class="fs-4 fw-bold pb-3 pe-5">Loacation:</span>
                                 <input type="range" min="1" max="5" value="0" id="slider3" class="slider " style="margin-left:68px;" required>
                                 <span class="ps-5 fw-bold fs-4 px-2" id="sliderValue3"></span>
                             </div>
                             <div class="p-3">
                                 <span class="fs-4 fw-bold pb-3 pe-5">internet:</span>
                                 <input type="range" min="1" max="5" value="0" id="slider4" class="slider " style="margin-left:86px;" required>
                                 <span class="ps-5 fw-bold fs-4 px-2" id="sliderValue4"></span>
                             </div>
                         </div>
                        
                    </div>
                    <div class="p-5 ">
                        <label for="formFileMultiple" class="form-label fs-4 fw-bold px-2 ms-2">Attach images</label>                
                        <div class="d-flex pt-2">
                            <input class="form-control blue-btn" type="file" id="formFileMultiple" style="width: 18rem;" multiple>
                            <button type="submit" class="btn ylw-btn ms-auto" >Publish review</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>


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
