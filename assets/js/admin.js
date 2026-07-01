console.log("KWO Admin JS cargado");

document.addEventListener('DOMContentLoaded', () => {

    const textarea = document.getElementById('kwo-message-template');
    const preview  = document.getElementById('kwo-preview');
    const notice   = document.getElementById('kwo-notice');

    if (!textarea || !preview) {
        return;
    }

    /**
     * Muestra una notificación
     */
    function showNotice(message) {

        if (!notice) {
            return;
        }

        notice.innerHTML = `
            <div class="kwo-notice">
                ${message}
            </div>
        `;

        setTimeout(() => {

            notice.innerHTML = '';

        }, 1500);

    }

    /**
     * Carga la vista previa desde PHP
     */
    async function loadOrderPreview(orderId) {

        const formData = new FormData();

        formData.append('action', 'kwo_preview');
        formData.append('nonce', kwoAdmin.nonce);
        formData.append('order_id', orderId);
        formData.append('template', textarea.value);

        try {

            const response = await fetch(kwoAdmin.ajaxUrl, {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (!result.success) {

                console.error(result.data.message);

                return;

            }

            preview.innerHTML = result.data.message.replace(/\n/g, '<br>');

        } catch (error) {

            console.error(error);

        }

    }


    /**
     * Inserta una variable
     */
    function insertVariable(token) {

        const start = textarea.selectionStart;
        const end   = textarea.selectionEnd;

        textarea.setRangeText(token, start, end, 'end');

        textarea.focus();

        if (currentOrderId) {

            loadOrderPreview(currentOrderId);

        }

        showNotice('✅ Variable insertada');

    }

    /**
     * Eventos de los chips
     */
    document.querySelectorAll('.kwo-variable').forEach(button => {

        button.addEventListener('click', () => {

            button.classList.add('is-active');

            setTimeout(() => {

                button.classList.remove('is-active');

            }, 150);

            insertVariable(button.dataset.variable);

        });

    });

    let timeout;

    textarea.addEventListener('input', () => {

        clearTimeout(timeout);

        timeout = setTimeout(() => {

            if (!currentOrderId) {
                return;
            }

            loadOrderPreview(currentOrderId);

        }, 300);

    });


    /**
     * Pedido de prueba
     */
    const orderSelect = document.getElementById('kwo-order-preview');
    let currentOrderId = '';

    if (orderSelect) {

        orderSelect.addEventListener('change', () => {

            if (!orderSelect.value) {
                return;
            }

            currentOrderId = orderSelect.value;
            preview.innerHTML = 'Generando vista previa...';
            loadOrderPreview(currentOrderId);

        });

    }

});