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

<body>
    <p class="fw-bold px-3 pt-3 fs-3">Rating</p>
    
    <div class="d-flex flex-column card">
        <div class="p-3">
            <span class="fs-4 fw-bold pb-3 pe-5">Room:</span>
            <input type="range" min="1" max="5" value="0" id="slider1" class="slider " style="margin-left:110px;">
            <span class="ps-5 fw-bold fs-4 px-2" id="sliderValue1"></span>            
        </div>
        <div class="p-3">
            <span class="fs-4 fw-bold pb-3 pe-5">Bathrooom:</span>
            <input type="range" min="1" max="5" value="0" id="slider2" class="slider " style="margin-left:50px;">
            <span class="ps-5 fw-bold fs-4 px-2" id="sliderValue2"></span>
        </div>
        <div class="p-3">
            <span class="fs-4 fw-bold pb-3 pe-5">Loacation:</span>
            <input type="range" min="1" max="5" value="0" id="slider3" class="slider " style="margin-left:68px;">
            <span class="ps-5 fw-bold fs-4 px-2" id="sliderValue3"></span>
        </div>
        <div class="p-3">
            <span class="fs-4 fw-bold pb-3 pe-5">internet:</span>
            <input type="range" min="1" max="5" value="0" id="slider4" class="slider " style="margin-left:86px;">
            <span class="ps-5 fw-bold fs-4 px-2" id="sliderValue4"></span>
        </div>
        
    </div>
    
</body>
  
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
