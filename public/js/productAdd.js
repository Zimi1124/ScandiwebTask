/*==================== ATTRIBUTE ACTIVE SWICHER ====================*/

const selectProductType = document.getElementById('productType');

window.onload = (event) => {
    var option = selectProductType.value;
    activateFormAttribute(option);
};

selectProductType.addEventListener('change', function handleChange(event) {
    var value = event.target.value;
    activateFormAttribute(value);
});

function activateFormAttribute(attribute_id) {
    let attributes = document.querySelectorAll('.form__attributes');
    let attribute = document.getElementById(attribute_id);

    attributes.forEach(elem => {
        elem.classList.remove('active-attribute');
    })
    attribute.classList.add('active-attribute');
}

/*==================== BUTTONS OPERATION ====================*/
// Cancel
const cancel_button = document.getElementById('cancel-btn');

cancel_button.addEventListener('click', function () {
    window.location.href = "/";
});

