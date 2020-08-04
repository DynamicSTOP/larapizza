let cartButton, numberElement;

function updateCartQuantity(totalInCart) {
    if (totalInCart > 0) {
        numberElement.classList.remove('d-none');
        numberElement.innerHTML = totalInCart;
        cartButton.classList.remove('empty');
    } else {
        numberElement.classList.add('d-none');
        cartButton.classList.add('empty');
    }
}

function toggleQuantityControls(element) {
    const buyBox = element.closest('.buyBtnBox');
    const buyBut = buyBox.querySelector('.buyBtn');
    const quantityControls = buyBox.querySelector('.quantityControls');

    if (buyBut.classList.contains('d-none')) {
        quantityControls.classList.add('d-none');
        buyBut.classList.remove('d-none');
    } else {
        buyBut.classList.add('d-none');
        quantityControls.classList.remove('d-none');
    }
}

function sendCartRequest(element, id, quantity = 1) {
    // TODO block plus/minus/add buttons
    fetch('/api/v1/cart', {
        method: quantity === 0 ? 'DELETE' : 'POST',
        headers: {'X-CSRF-TOKEN': window.csrf, 'Content-Type': 'application/json'},
        body: JSON.stringify({id, quantity})
    })
        .then((resp) => resp.json())
        .then((json) => {
            if (!json.errors) {
                if (quantity === 0 || element.classList.contains('buyBtn')) {
                    toggleQuantityControls(element);
                }
                element.closest('.buyBtnBox').querySelector('.quantity').innerHTML = quantity;
                updateCartQuantity(json.totalInCart);
                cartButton.querySelector('.cart--details').innerHTML = json.html;
            } else {
                console.error(json.errors);
            }
        });
}

function addToCart() {
    const id = this.closest('.goods--item').dataset["id"];
    sendCartRequest(this, id);
}

function updateQuantity() {
    const quantityDiv = this.closest('.buyBtnBox').querySelector('.quantity');
    let quantity = parseInt(quantityDiv.innerHTML);
    if (this.classList.contains('minus')) {
        quantity--;
    } else {
        quantity++;
    }
    if (quantity > 20) {
        return alert('Too many! We don\'t have that much stoves!');
    }
    const id = this.closest('.goods--item').dataset["id"];
    sendCartRequest(this, id, quantity);
}

function toggleCurrency() {
    const currencyEl = this;
    // technically can save into local storage and change onload
    // then send with order request but this should be more simple
    fetch('/api/v1/toggleCurrency', {
        method: "POST",
        headers: {'X-CSRF-TOKEN': window.csrf},
    }).then((resp) => resp.json())
        .then((json) => {
            if (!json.errors) {

                Array.from(document.querySelectorAll('[data-price_usd]')).map((el) => {
                    if (json.currency === 'euro') {
                        el.innerHTML = el.dataset['price_euro'] + '&euro;';
                    } else {
                        el.innerHTML = el.dataset['price_usd'] + '&dollar;';
                    }
                });

                if (json.currency === 'euro') {
                    currencyEl.innerHTML = '&euro;';
                    const input_euro = document.querySelector('input#euro');
                    if (input_euro) {
                        input_euro.checked = true;
                    }
                } else {
                    currencyEl.innerHTML = '&dollar;';
                    const input_usd = document.querySelector('input#usd');
                    if (input_usd) {
                        input_usd.checked = true;
                    }
                }
            } else {
                console.error(json.errors);
            }
        });
}


function addListeners() {
    cartButton = document.querySelector('.cartButton');
    numberElement = cartButton.querySelector('.cartQuantity');

    Array.from(document.querySelectorAll('.buyBtnBox button'))
        .map((button) => {
            button.onclick = addToCart;
        });

    Array.from(document.querySelectorAll('.plus, .minus'))
        .map((button) => {
            button.onclick = updateQuantity;
        });

    document.querySelector('nav .currency').onclick = toggleCurrency;

    Array.from(document.querySelectorAll('input#euro, input#usd')).map((el) => {
        el.onchange = toggleCurrency;
    });
}


document.addEventListener('DOMContentLoaded', addListeners);
