let navCurrencyEl;

function toggleQuantityControls(element) {
    if (typeof element.dataset['order_menu'] !== 'undefined') {
        //order button. only adds 1
        const controlsDiv = element.closest('.product-controls');
        element.classList.add('d-none');
        controlsDiv.querySelector('.product-quantity-controls').classList.remove('d-none');
    } else if (element.classList.contains('minus')) {
        const controlsDiv = element.closest('.product-controls');
        controlsDiv.querySelector('.product-quantity-controls').classList.add('d-none');
        controlsDiv.querySelector('[data-order_menu]').classList.remove('d-none');
    }
}

function sendCartRequest(element, id, quantity = 1, add = false) {
    // TODO block plus/minus/add buttons
    let method = 'PUT';
    if (!add) {
        method = quantity === 0 ? 'DELETE' : 'POST';
    }

    fetch('/api/v1/cart', {
        method,
        cache: 'no-cache',
        headers: {'X-CSRF-TOKEN': window.csrf, 'Content-Type': 'application/json'},
        body: JSON.stringify({id, quantity})
    })
        .then((resp) => resp.json())
        .then((json) => {

            if (!json.errors) {
                $('.cart-item-count').removeClass('d-none').html(json.totalInCart);
                // TODO properly send parts
                const newCart = $(json.html)
                const oldCart = $('.cart-sidebar-wrapper')
                $('.cart-sidebar-scroll', oldCart).html($('.cart-sidebar-scroll', newCart));
                $('.cart-sidebar-footer h4', oldCart).html($('.cart-sidebar-footer h4', newCart));

                if (quantity === 1 && typeof element.dataset['order_menu'] !== "undefined") {
                    element.closest('.product-controls').querySelector('.quantity').innerHTML = 1;
                    toggleQuantityControls(element);
                }

                if (element.classList.contains('plus') || element.classList.contains('minus')) {
                    element.closest('.product-controls').querySelector('.quantity').innerHTML = quantity;
                    if (quantity === 0) {
                        toggleQuantityControls(element);
                    }
                }

                if (typeof element.dataset['order_banner'] !== "undefined") {
                    Array.from(document.querySelectorAll('.product-controls[data-id="' + id + '"]')).map((prControls) => {
                        toggleQuantityControls(prControls.querySelector('[data-order_menu]'), id);
                    });
                    element.querySelector('span').innerHTML = 'Order more';
                    $(element).on('click', banner_add);
                }

                if (element.classList.contains('close-btn')) {
                    //remove from cart
                    Array.from(document.querySelectorAll('.product-controls[data-id="' + id + '"]')).map((prControls) => {
                        toggleQuantityControls(prControls.querySelector('.minus'));
                    });
                }
            } else {
                console.error(json.errors);
            }
        });
}

function banner_add(e) {
    $(this).off('click').find('span').html('Adding...');
    sendCartRequest(
        this,
        this.dataset['id'],
        1,
        true
    );
    e.preventDefault();
    return false;
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

                $('[data-price_usd]').each(function () {
                    if (json.currency === 'euro') {
                        this.innerHTML = '&euro;' + this.dataset['price_euro'];
                    } else {
                        this.innerHTML = '&dollar;' + this.dataset['price_usd'];
                    }
                });

                if (json.currency === 'euro') {
                    navCurrencyEl.find('span').html('&euro;');
                    const input_euro = document.querySelector('input#euro');
                    if (input_euro) {
                        input_euro.checked = true;
                    }
                } else {
                    navCurrencyEl.find('span').html('&dollar;');
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

$(document).ready(function () {
    $('[data-order]').click(function (e) {
        sendCartRequest(this, this.dataset['id'], 1);
        e.preventDefault();
        return false;
    });

    $('[data-order_menu]').click(function (e) {
        sendCartRequest(this, this.closest('.product-controls').dataset['id'], 1);
        e.preventDefault();
        return false;
    });

    $('.plus, .minus', '.product-quantity-controls').click(function () {
        let quantity = parseInt(this.closest('.product-controls').querySelector('.quantity').innerHTML);
        if (this.classList.contains('plus')) {
            quantity++;
        } else {
            quantity--;
        }
        sendCartRequest(
            this,
            this.closest('.product-controls').dataset['id'],
            quantity
        )
    });

    $('.cart-sidebar-wrapper').on('click', '.cart-sidebar-item .close-btn', function () {
        sendCartRequest(this, this.dataset['id'], 0);
    });
    $('[data-order_banner]').on('click', banner_add);

    $('[data-order_button]').click(function () {
        $('[data-form_checkout]').submit();
    });

    navCurrencyEl = $('nav .currency-switch')
    navCurrencyEl.click(toggleCurrency);
    $('input#euro, input#usd').change(toggleCurrency);
});

