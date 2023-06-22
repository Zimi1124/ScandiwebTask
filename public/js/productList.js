// Add
const add_button = document.getElementById('add-product-btn');
add_button.addEventListener('click', function () {
    window.location.pathname = '/add-product';
});

// Delete
const delete_button = document.getElementById('delete-product-btn');
delete_button.addEventListener('click', function () {
    if (anyIsChecked()) {
        removeAnimation();
        setTimeout(function () {
            submitRemovalForm();
        }, 1000);
    } else {
        alert('Select at least one product for deletion.');
    }
});

function submitRemovalForm() {
    const product_ids = getCheckedProductIds();
    fetch('/src/Entity/Product/Controller/delete-products.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(product_ids)
    })
    .then(response => {
        if (response.ok) {
            // Handle success
            // You can perform any necessary actions on success
            window.location.reload(); // Refresh the page after deleting the product(s)
        } else {
            // Handle error
            // You can display an error message or perform any necessary actions on error
            console.error('Error deleting product(s).');
        }
    });
}

function removeAnimation() {
    const items = document.querySelectorAll('.list__item');
    items.forEach(item => {
        const checkbox = item.querySelector('.delete-checkbox');
        if (checkbox.checked) {
            item.style.opacity = 0;
            item.style.transform = 'scale(.9)';
        }
    });
}

function anyIsChecked() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    return checkboxes.length > 0;
}

function getCheckedProductIds() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    const ids = [];
    checkboxes.forEach(checkbox => {
        ids.push(checkbox.value);
    });
    return ids;
}