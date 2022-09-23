const isLocaleEn = location.href.search("/en/") != -1;

//start fetch all data to my table
fetchData();
function fetchData() {
    axios.get("/api/fetch_contact_us").then((response) => {
        // console.log(response);
        var i = 0;
        el("tbody").innerHTML = "";
        var contactUs= response.data.contactUs;
        contactUs.forEach((item) => {
            i++;
            var tableContentOne = ` <tr>
             <td> ${i} </td>
             <td> <i></i> ${isLocaleEn ? item.name.en : item.name.ar}</td>
             <td>${item.link}</td>
             <td> <i class="${item.icon}"></i> </td>
             `;
             if (item.is_active) {
                var tableContentTwo = `
                    <td>
                        <span class="badge bg-label-info me-1">مفعل</span>
                    </td>
                    <td>
                        <a class="btn btn-icon text-info btn-outline-info mx-1 " data-bs-toggle="modal" data-bs-target="#active_contact_us">
                        <i class="bx bx-show" onclick="active(${item.id})"></i>
                        </a>
                    `;
            } else {
                var tableContentTwo = `
                    <td>
                        <span class="badge bg-label-danger me-1">موقف</span>
                    </td>
                    <td>
                        <a class="btn btn-icon btn-outline-secondary mx-1 " data-bs-toggle="modal" data-bs-target="#active_contact_us">
                            <i class="bx bx-hide" onclick="active(${item.id})"></i>
                        </a>
                    `;
            }
            var tableContentThree = `
                    <a class="btn btn-icon btn-outline-success text-success mx-1 edit" data-bs-toggle="modal" data-bs-target="#updateSocialMediaModal" >
                        <i class="tf-icons bx bx-edit-alt me-1 " onclick="edit(${item.id})"></i>
                    </a>
                    <a class="btn btn-icon btn-outline-dribbble text-danger" data-bs-toggle="modal" data-bs-target="#delete_contact_us">
                        <i class="tf-icons bx bx-trash me-1" onclick="deleteContactUs(${item.id})"></i>
                    </a>
                    </td>
                </tr>
                `;
            el("tbody").innerHTML +=
                tableContentOne + tableContentTwo + tableContentThree;
        });
    });
}
//End fetch all data to my table

// start Add Data
el("#add").addEventListener("click", function (e) {
    e.preventDefault();
    axios
        .post(`/api/add_contact_us`, {
            nameEn: el("#addNameEn").value,
            nameAr: el("#addNameAr").value,
            link: el('#addLink').value,
            icon: el('#addIcon').value,
            isActive: el("#add_is_active").value,
        })
        .then((response) => {
            // console.log(response);
            alertMessage(response.status, "insert");
            removeInputsValue("add_form");
            closeModal("addSocialMediaModal");
        })
        .catch(function (error) {
            if (error.response) {
                console.log(error.response.data.errors);
                var errors = error.response.data.errors;
                Object.keys(errors).forEach((key) => {
                    el("#add_form [data-error='" + key + "']").innerText =
                        errors[key];
                });
            }
        });
});
// End Add Data


// Start Edit Data
function edit(contactusId) {
    axios.get(`/api/edit_contact_us/${contactusId}`).then((response) => {
        // console.log(response);
        el("#update_contactus_id").value = contactusId;
        el("#updateNameAr").value = response.data.contactUs.name.ar;
        el("#updateNameEn").value = response.data.contactUs.name.en;
        el("#updateLink").value = response.data.contactUs.link;
        el("#updateIcon").value = response.data.contactUs.icon;
    });
}
// End Edit Data

// Start Update Data
el("#update").addEventListener("click", function (e) {
    var contactusId = el("#update_contactus_id").value;
    console.log(contactusId);
    axios
        .put(`/api/update_contact_us/${contactusId}`, {
            id: contactusId,
            nameEn: el("#updateNameEn").value,
            nameAr: el("#updateNameAr").value,
            link: el('#updateLink').value,
            icon: el('#updateIcon').value,
            isActive: el("#update_is_active").value,
        })
        .then((response) => {
            // console.log(response);
            alertMessage(response.status, "Update");
            removeInputsValue("updateSocialMediaForm");
            closeModal("updateSocialMediaModal");
        })
        .catch(function (error) {
            if (error.response) {
                var errors = error.response.data.errors;
                Object.keys(errors).forEach((key) => {
                    el("#update_form [data-error='" + key + "']").innerText =
                        errors[key];
                });
            }
        });
});
// End Update Data



// Start Active Function
function active(contact_usId) {
    el("#active").value = contact_usId;
}

el("#active").addEventListener("click", (ele) => {
    contact_usId = el("#active").value;
    axios.get(`/api/active_contact_us/${contact_usId}`).then((response) => {
        // console.log(response);
        alertMessage(response.status, "status");
        closeModal("active_contact_us");
    });
});
// // End Active Function


// Start Delete Function
function deleteContactUs(contact_usId) {
    el("#delete").value = contact_usId;
}

el("#delete").addEventListener("click", (ele) => {
    contact_usId = el("#delete").value;
    axios.get(`/api/delete_contact_us/${contact_usId}`).then((response) => {
        // console.log(response);
        alertMessage(response.status, "Delete");
        closeModal("delete_contact_us");
    });
});
// End Delete Function
