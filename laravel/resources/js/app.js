function updateCartQuantity(cart) {
    let totalInCart = 0;
    const numberElement = document.querySelector('.cartQuantity');

    for (let i in cart) {
        if (!cart.hasOwnProperty(i)) {
            continue;
        }
        totalInCart += cart[i];
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
                updateCartQuantity(json);
            } else {
                console.error(json.errors);
            }
        });
}

function addToCart(){
    const id = this.closest('.goods--item').dataset["id"];
    sendCartRequest(this, id);
}

function updateQuantity(){
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


function addListeners() {
    Array.from(document.querySelectorAll('.buyBtnBox button'))
        .map((button) => {
            button.onclick = addToCart;
        });

    Array.from(document.querySelectorAll('.plus, .minus'))
        .map((button) => {
            button.onclick = updateQuantity;
        });
}


document.addEventListener('DOMContentLoaded', addListeners);
