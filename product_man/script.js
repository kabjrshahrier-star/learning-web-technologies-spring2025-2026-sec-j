let unitPriceInput = document.getElementById("unitPrice");
let quantityInput = document.getElementById("quantity");
let totalInput = document.getElementById("total");

function calculateTotal() {
  let unitPrice = Number(unitPriceInput.value);
  let quantity = Number(quantityInput.value);

  if (unitPrice < 0) {
    unitPrice = 0;
    unitPriceInput.value = 0;
  }

  if (quantity < 0) {
    quantity = 0;
    quantityInput.value = 0;
  }

  let totalPrice = unitPrice * quantity;
  totalInput.value = totalPrice;

  if (totalPrice > 1000) {
    alert("You are now eligible for a gift coupon!");
  }
}

unitPriceInput.addEventListener("input", calculateTotal);
quantityInput.addEventListener("input", calculateTotal);

calculateTotal();