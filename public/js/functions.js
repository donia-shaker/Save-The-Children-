/**
 * @returns {HTMLElement}
 */
const el = (element) => document.querySelector(element);

/**
 * @returns {NodeListOf<HTMLElementTagNameMap[K]>}
 */
const els = (element) => document.querySelectorAll(element);

function alertMessage(status, message) {
    if (status >= 200 && status <= 205) {
        el("#message").innerHTML = `
        <div class="alert alert-info alert-dismissible" id="alert" role="alert">
            Data ${message} successfully
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>`;
    } else {
        el("#message").innerHTML = `
        <div class="alert alert-danger alert-dismissible" id="alert" role="alert">
            There is something wrong please retry later
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>`;
    }
    el("tbody").innerHTML = ``;
    fetchData();
}

function removeInputsValue(formId) {
    var inputs = els(`#${formId} input`);
    inputs.forEach((element) => {
        element.value = "";
    });
}

function closeModal(modalId) {
    el(".modal-backdrop").remove();
    el(`#${modalId}`).style.display = "none";
    el("body").removeAttribute("style");
    el("body").removeAttribute("class");
    el(`#${modalId}`).classList.remove("show");
}
