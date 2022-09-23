/**
 * @returns {HTMLElement}
 */
 const el = (element) => document.querySelector(element);

 /**
  * @returns {NodeListOf<HTMLElementTagNameMap[K]>}
  */
 const els = (element) => document.querySelectorAll(element);
 
 // another file
 const isLocaleEn = location.href.search('/en/') != -1;
 
 //start fetch all data to my table
 var countryId = location.hash.slice(1);
 // console.log(countryId);
 
 fetchcitiesData();
 function fetchcitiesData() {
     axios.get(`/fetchCities/${countryId}`).then((response) => {
          console.log (response);
         var i = 0;
         el("tbody").innerHTML = "";
         var serviceAdvRes = response.data.cities;
         serviceAdvRes.forEach((item) => {
             i++;
             var tableContentOne = ` <tr>
              <td> ${i} </td>
              <td> <i></i>${isLocaleEn ? item.name.en : item.name.ar}</td>
              <td>
                  <a href="servPoint/${item.id}#${item.id}" class="color_text">
                 انقر لعرض نقاط الخدمة</a>
              </td>`;
             if (item.is_active) {
                 var tableContentTwo = `
                  <td>
                  <label class="switch">
                  <input type="checkbox" class="switch-input activeserviceAdvLink" name="active" checked id="addserviceAdvActive" value="${item.id}">
                  <span class="switch-toggle-slider">
                      <span class="switch-on"></span>
                      <span class="switch-off"></span>
                  </span>
                  </label>
                  </td>`;
             } else {
                 var tableContentTwo = `
                  <td>
                  <label class="switch">
                  <input type="checkbox" class="switch-input activeserviceAdvLink" name="active"  id="addserviceAdvActive" value="${item.id}">
                  <span class="switch-toggle-slider">
                      <span class="switch-on"></span>
                      <span class="switch-off"></span>
                  </span>
                  </label>
                  </td>`;
             }
             var tableContentThree = `
              <td>
                  <a class="btn btn-icon btn-outline-success  editserviceAdv"
                      value= " ${item.id}" href="javascript:void(0);"><i class=" bx bx-edit-alt me-2"></i>
                  </a>
                  <a class="btn btn-icon btn-outline-dribbble mx-2 deletserviceAdvLink" 
                      value= "${item.id}"  href="javascript:void(0);"><i class=" bx bx-trash me-2"></i>
                  </a>
              </td>
              </tr>`;
 
             el("tbody").innerHTML +=
                 tableContentOne + tableContentTwo + tableContentThree;
 
             // Start Open Modal For Edit
             els(".editserviceAdv").forEach((element) => {
                 // console.log(element);
                 element.addEventListener("click", function (e) {
                     e.preventDefault();
                     var serviceAdvId = element.getAttribute("value");
                     // console.log(serviceAdvId);
                     $("#editserviceAdvModal").modal("show");
                     // el("#editserviceAdvModal").classList.add('show');
                     // el("#editserviceAdvModal").style='display:block';
 
                     axios.get(`editserviceAdv/${serviceAdvId}`).then((response) => {
                         // console.log(response);
                         if (response.status == 400) {
                            el("#message").innerHTML = "<div class='alert alert-danger message_animation'>"+ response.data.message+"</div>";
                         } else {
                             el("#editserviceAdvId").value = serviceAdvId;
                             el("#editserviceAdvNameEn").value =
                                 response.data.serviceAdv.name.en;
                             el("#editserviceAdvNameAr").value =
                                 response.data.serviceAdv.name.ar;
                         }
                     });
                 });
             });
             // End Open Modal For Edit
 
             // Start Open Modal For Active
             els(".activeserviceAdvLink").forEach((element) => {
                 // console.log(element);
                 element.addEventListener("click", function (e) {
                     e.preventDefault();
                     var serviceAdvId = element.getAttribute("value");
                     // console.log(serviceAdvId);
                     el("#activeserviceAdvId").value = serviceAdvId;
                     $("#activeserviceAdvModal").modal("show");
                 });
             });
             // End Open Modal For Active
 
             // Start Open Modal For Delete
             els(".deletserviceAdvLink").forEach((element) => {
                 // console.log(element);
                 element.addEventListener("click", function (e) {
                     e.preventDefault();
                     var serviceAdvId = element.getAttribute("value");
                     // console.log(serviceAdvId);
                     el("#deleteserviceAdvId").value = serviceAdvId;
                     $("#deleteserviceAdvModal").modal("show");
                 });
             });
             // End Open Modal For Delete
         });
     });
 }
 //End fetch all data to my table
 
 if (el(".activeserviceAdv")) {
     //start activate data
     el(".activeserviceAdv").addEventListener("click", function (e) {
         e.preventDefault();
         let serviceAdvId = el("#activeserviceAdvId").value;
         //  console.log(serviceAdvId);
 
         axios.get(`activeserviceAdv/${serviceAdvId}`).then((response) => {
            el("#message").innerHTML = "<div class='alert bg_color message_animation'>"+ response.data.message+"</div>";
             $("#activeserviceAdvModal").modal("hide");
             fetchcitiesData();
         });
     });
 }
 
 //End activate data
 
 //start Delete data
 
 if (el(".deleteserviceAdv")) {
     el(".deleteserviceAdv").addEventListener("click", function (e) {
         e.preventDefault();
         let serviceAdvId = el("#deleteserviceAdvId").value;
         // console.log(serviceAdvId);
 
         axios.get(`deleteserviceAdv/${serviceAdvId}`).then((response) => {
            el("#message").innerHTML = "<div class='alert bg_color message_animation'>"+ response.data.message+"</div>";
             $("#deleteserviceAdvModal").modal("hide");
             fetchcitiesData();
         });
     });
 }
 //End Delete data
 
 // start Update data
 el(".updateserviceAdv").addEventListener("click", function (e) {
     e.preventDefault();
     serviceAdvId = el("#editserviceAdvId").value;
 
     axios
         .put(`updateserviceAdv/${serviceAdvId}`, {
             nameEn: el("#editserviceAdvNameEn").value,
             nameAr: el("#editserviceAdvNameAr").value,
             countryId: countryId,
         })
         .then((response) => {
             // console.log(response);
             if (response.data.status == 400) {
                 var errors = response.data.errors;
                 // console.log(errors);
                 Object.keys(errors).forEach((key) => {
                     // console.log(key);
 
                     var input = "#updateserviceAdv input[name=" + key + "]";
                     el(input + "+span").innerText = errors[key];
                 });
             } else if (response.data.status == 404) {
                 el("#updateserviceAdv").innerHTML = "";
                 el("#message").innerHTML = "<div class='alert alert-danger message_animation'>"+ response.data.message+"</div>";
             } else {
                el("#message").innerHTML = "<div class='alert bg_color message_animation'>"+ response.data.message+"</div>";
                 el("#editserviceAdvModal").classList.remove("show");
                 // el("#editserviceAdvModal").classList.add('hide');
                 // el("#editserviceAdvModal").style='display:none';
                 $("#editserviceAdvModal").modal("hide");
                 fetchcitiesData();
             }
         });
 });
 // End Update data
 
 // start Add Data
 el(".addserviceAdv").addEventListener("click", function (e) {
     e.preventDefault();
     axios
         .post(`addserviceAdv`, {
             nameEn: el("#addserviceAdvNameEn").value,
             nameAr: el("#addserviceAdvNameAr").value,
             countryId: countryId,
         })
         .then((response) => {
             // console.log(response);
             if (response.data.status == 400) {
                 var errors = response.data.errors;
                 // console.log(response.data.errors);
                 Object.keys(errors).forEach((key) => {
                     // console.log(key);
                     var input = "#addserviceAdvForm input[name=" + key + "]";
                     el(input + "+span").innerText = errors[key];
                 });
             } else {
                el("#message").innerHTML = "<div class='alert bg_color message_animation'>"+ response.data.message+"</div>";
                 $("#addserviceAdvModal").modal("hide");
                 els("#addserviceAdvForm input").value = "";
                 fetchcitiesData();
             }
         });
 });
 // End Add Data
 