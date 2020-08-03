require('./bootstrap');

function updateCartQuantity(cart) {
    let totalInCart = 0;
    const numberElement = document.querySelector('.cartQuantity');

    for(let i in cart){
        if(!cart.hasOwnProperty(i)){
            continue;
        }
        totalInCart+= cart[i];

    }

    if (totalInCart > 0) {
        numberElement.classList.remove('d-none');
        numberElement.innerHTML = totalInCart;
    } else {
        numberElement.classList.add('d-none');
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

function addListeners() {
    const csrf = document.querySelector('meta[name="csrf"]').getAttribute('value');

    Array.from(document.querySelectorAll('.buyBtnBox button'))
        .map((button) => {
            button.onclick = function () {
                const but = this;
                const id = this.closest('.goods--item').dataset["id"];
                fetch('/cart', {
                    method: 'POST',
                    headers: {'X-CSRF-TOKEN': csrf, 'Content-Type': 'application/json'},
                    body: JSON.stringify({id})
                })
                    .then((resp) => resp.json())
                    .then((json) => {
                        if (!json.errors) {
                            toggleQuantityControls(but);
                            updateCartQuantity(json);
                        } else {
                            console.error(json.errors);
                        }
                    });
            }
        });

    Array.from(document.querySelectorAll('.plus, .minus'))
        .map((button) => {
            button.onclick = function () {
                const but = this;
                const quantityDiv = this.closest('.quantityControls').querySelector('.quantity');
                let quantity = parseInt(quantityDiv.innerHTML);
                // TODO block plus minus buttons

                if (but.classList.contains('minus')) {
                    quantity--;
                } else {
                    quantity++;
                }
                if (quantity > 20) {
                    return alert('Too many! We don\'t have that much stoves!');
                }

                const id = this.closest('.goods--item').dataset["id"];

                fetch('/cart', {
                    method: quantity === 0 ? 'DELETE' : 'POST',
                    headers: {'X-CSRF-TOKEN': csrf, 'Content-Type': 'application/json'},
                    body: JSON.stringify({id, quantity})
                })
                    .then((resp) => resp.json())
                    .then((json) => {
                        if (!json.errors) {
                            if (quantity === 0) {
                                toggleQuantityControls(but);
                            } else {
                                quantityDiv.innerHTML = quantity;
                            }
                            updateCartQuantity(json);
                        } else {
                            console.error(json.errors);
                        }
                    });
            };
        });
}


document.addEventListener('DOMContentLoaded', addListeners);
