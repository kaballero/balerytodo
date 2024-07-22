 document.addEventListener('DOMContentLoaded', function() {
            const buyingPriceField = document.getElementById('buying_price');
            const sellingPriceField = document.getElementById('selling_price');

            buyingPriceField.addEventListener('keyup', function() {
                let buyingPrice = parseFloat(buyingPriceField.value);
                if (!isNaN(buyingPrice)) {
                    let sellingPrice = buyingPrice * 1.16; // Adding 16%
                    sellingPriceField.value = sellingPrice.toFixed(2); // Updating the selling price field
                } else {
                    sellingPriceField.value = ''; // Clear the selling price field if the input is not a number
                }
            });
});