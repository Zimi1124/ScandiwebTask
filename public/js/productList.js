/*==================== BUTTONS OPERATION ====================*/
// Add
const add_button = document.getElementById('add-product-btn');
add_button.addEventListener('click', () => {
    window.location.href = '/add-product/';
});

// Delete
const delete_button = document.getElementById('delete-product-btn');
delete_button.addEventListener('click', () => {
    if (anyIsChecked()) {
        removalAnimation();
        setTimeout(() => {
            submitRemovalForm();
        }, 1000);
    } else {
        alert('Select at least one product for delete.');
    }
});

/*==================== REMOVAL PRODUCTS ====================*/
function submitRemovalForm() {
    document.getElementById("delete_form").submit();
}

function removalAnimation(callback) {
    var items = document.querySelectorAll('.list__item');
    var itemCount = items.length;
    var itemsProcessed = 0;

    items.forEach(item => {
        const checkbox = item.querySelector(".delete-checkbox");
        if (checkbox.checked) {
            item.addEventListener('transitionend', () => {
                item.remove(); // Remove the item from the DOM
                itemsProcessed++;
                if (itemsProcessed === itemCount) {
                    callback(); // Call the callback once all items are processed
                }
            });

            item.style.opacity = 0;
            item.style.transform = 'scale(.9)';
        }
    });
}

function anyIsChecked() {
    const removalForm = document.getElementById('delete_form');
    const checkboxes = removalForm.querySelectorAll('input[type="checkbox"]');

    let anyChecked = false;

    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            anyChecked = true;
        }
    });

    return anyChecked;
}