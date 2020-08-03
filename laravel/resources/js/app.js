require('./bootstrap');

function addListeners() {
    const csrf = document.querySelector('meta[name="csrf"]').getAttribute('value')
    Array.from(document.querySelectorAll('.buyBtnBox button'))
        .map((button) => {
            button.onclick = function () {
                const but = this;
                fetch('/cart', {
                    method: 'POST',
                    headers: {'X-CSRF-TOKEN': csrf, 'Content-Type': 'application/json'},
                    body: JSON.stringify({id: this.dataset["goodsid"]})
                })
                    .then((resp) => resp.json())
                    .then((json) => {
                        if(!json.errors){
                            but.classList.add('d-none');
                            but.parentElement.querySelector('.quantityControls').classList.remove('d-none');
                        }
                    });
            }
        })
}

document.addEventListener('DOMContentLoaded', addListeners);
