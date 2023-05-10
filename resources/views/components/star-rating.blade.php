<style>
  	.summaryRange{
		outline: 0;
		border: solid black 2px;
		border-radius: 500px;
		width: 270px;
		max-width: 100%;
		margin: 24px 0 16px;
		transition: box-shadow 0.2s ease-in-out;
		
		@media screen and (-webkit-min-device-pixel-ratio:0) {
			& {
				overflow: hidden;
				height: 20px;
				-webkit-appearance: none;
				background-color: #ddd;
			}
			&::-webkit-slider-runnable-track {
				
				-webkit-appearance: none;
				color: #fff;
				margin-top: -1px;
				transition: box-shadow 0.2s ease-in-out;
			}
			&::-webkit-slider-thumb {
				width: 40px;
				-webkit-appearance: none;
				height: 0px;
				cursor: ew-resize;
				background: transparent;
				box-shadow: -340px 0 0 340px #023047;
				
				position: relative;
				;
			}
			
		}
		
		&::-moz-range-progress {
			background-color: #43e5f7; 
		}
		&::-moz-range-track {  
			background-color: #9a905d;
		}
		
		&::-ms-fill-lower {
			background-color: #43e5f7; 
		}
		&::-ms-fill-upper {  
			background-color: #9a905d;
		}
	}
</style>

<div class="p-4">
  <div>
    <span class="fw-bold fs-5">Room</span>
    <input type="range" class="summaryRange pt-1" value="10" max="10" id="average1" disabled style="margin-left:65px;">
  </div>
  <div>
    <span class="fw-bold fs-5">Bathroom</span>
    <input type="range" class="summaryRange pt-1" value="7" max="10" id="average1" disabled style="margin-left:28px;">
  </div>
  <div>
    <span class="fw-bold fs-5">Loaction</span>
    <input type="range" class="summaryRange pt-1" value="5" max="10" id="average1" disabled style="margin-left:43px;">
  </div>
  <div>
    <span class="fw-bold fs-5">Internet</span>
    <input type="range" class="summaryRange pt-1" value="3" max="10" id="average1" disabled style="margin-left:47px;">
  </div>
</div>



<script>

</script>