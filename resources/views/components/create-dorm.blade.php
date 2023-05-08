<!-- Button trigger modal -->
<button type="button" class="blue-btn text-white px-4 py-3 fw-bold rounded-4 mx-5 center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add Dorm
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body px-5">
            <button class="btn d-flex flex-row-reverse right p-4 mt-1" data-bs-dismiss="modal" aria-label="Close">
                <i class="fa-regular fa-circle-xmark fa-2xl"></i>
            </button>
            <div class="fs-2 fw-bold pt-3">Add dorm</div>
            <br>
            <form method="POST" action="{{ route('add-dorm')}}">
              @csrf
                <label for="dormName" class="fs-4 fw-bold">Dorm name:</label>
                <br>
                <input type="text" class=" my-3 center rounded-2 p-2 add-dorm-input" name="name" id="dormName" required>
                <br>
                <label for="city" class="fs-4 fw-bold">City:</label>
                <br>
                <input type="text" class=" my-3 center rounded-2 p-2 add-dorm-input" name="city" id="city" required>
                <br>
                <label for="baranggayDataList" class="form-label fs-4 fw-bold" >Baranggay:</label>
                <div class="w-100"></div>
                <input class="add-dorm-input rounded-2 p-2 mb-2" list="baranggayOptions" name="barangay" id="baranggayDataList" placeholder="">
                <datalist id="baranggayOptions">
                    <option value="Abella">
                    <option value="Bagumbayan Norte">
                    <option value="Bagumbayan Sur">
                    <option value="Balatas">
                    <option value="Calauag">
                    <option value="Cararayan">
                    <option value="Carolina">
                    <option value="Concepcion Grande">
                    <option value="Concepcion Pequeña">
                    <option value="Dayangdang">
                    <option value="Del Rosario">
                    <option value="Dinaga">
                    <option value="Igualdad Interior">
                    <option value="Lerma">
                    <option value="Liboton">
                    <option value="Mabolo">
                    <option value="Pacol">
                    <option value="Panicuason">
                    <option value="Peñafrancia">
                    <option value="Sabang">
                    <option value="San Felipe">
                    <option value="San Francisco">
                    <option value="San Isidro">
                    <option value="Santa Cruz">
                    <option value="Tabuco">
                    <option value="Tinago">
                    <option value="Triangulo">
                </datalist>
                <br>
                <label for="street" class="fs-4 fw-bold">Street:</label>
                <br>
                <input type="text" class=" my-3 center rounded-2 p-2 add-dorm-input" name="street" id="street" required>
                <br>
                {{-- <label for="dormPrice" class="fs-4 fw-bold">Price range of rooms:</label>
                <br>
                <input type="text" class=" my-3 center rounded-2 p-2 add-dorm-input" id="dormPrice" placeholder="example: 2000-8000" required>
                <br>   --}}
                {{-- <div class="dropdown">
                  <button class="dropdown-btn dropdown-btn3 rounded-2 my-2" style="width: 20rem">Type of rooms<i class="fa-solid fa-caret-down fa-lg ps-2"></i></button>
                  <div class="dropdown-options" style="width: 20rem" >
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault"><span class="ps-2">Single room</span></label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault"><span class="ps-2">Double room</span></label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault"><span class="ps-2">Triple room</span></label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault"><span class="ps-2">Suite type</span></label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault"><span class="ps-2">Apartment type</span></label>
                    </div>
                  </div>
                </div> --}}
                <br>
                {{-- <label for="formFileMultiple" class="form-label fs-4 fw-bold pt-2">Attach images</label>       
                <input class="form-control blue-btn" type="file" id="formFileMultiple" style="width: 20rem;" multiple> --}}
                <button type="submit" value="submit" class="btn ylw-btn d-flex ms-auto py-2 my-4" >Publish dorm</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    const dormForm = document.getElementById('dorm-form');
    if (dormForm) {
      dormForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const dormData = new FormData(dormForm);

        axios.post('/dorms', dormData)
          .then(function(response) {
            console.log(response);
          })
          .catch(function(error) {
            console.log(error);
          });
      });
    }
  </script>