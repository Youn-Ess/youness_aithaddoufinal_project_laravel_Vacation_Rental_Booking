import './bootstrap';
import '../sass/app.scss';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
import '../sass/app.scss';

let quantity = document.getElementById('quantity');
let price = document.getElementById('quantity').getAttribute('data-price')
let amount = quantity * price;
let hamza = document.getElementById('amount');



let fori = document.querySelectorAll('.fori')
fori = Array.from(fori)
console.log(fori);



// Get all quantity input fields
document.addEventListener('DOMContentLoaded', function () {
    // Get all quantity input fields
    let quantities = document.querySelectorAll('.quantity');
    quantities.forEach(quantity => {
        quantity.addEventListener("change", () => {
            let quantityValue = quantity.value;
            let price = quantity.getAttribute('data-price');
            let amount = quantityValue * price;
            let amountField = quantity.closest('tr').querySelector('.amount');
            amountField.value = amount.toFixed(2); // Round the amount to two decimal places
        });
    });
});





// function updateAmount() {
//     let quantity = document.getElementById('quantity').value;
//     console.log(quantity);
//     let price = document.getElementById('quantity').getAttribute('data-price')
//         console.log(price);
//     let amount = quantity * price;
//     console.log(amount);
//     let hamza = document.getElementById('amount').value;
//     console.log(hamza);
//     hamza=amount
//         console.log(hamza);

// }

