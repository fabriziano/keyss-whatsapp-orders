document.addEventListener("DOMContentLoaded", () => {

    const textarea = document.querySelector("#kwo-message-template");

    const preview = document.querySelector("#kwo-preview");

    if (!textarea || !preview) {
        return;
    }

    const examples = {

        "{cliente}": "Juan Pérez",

        "{pedido}": "246",

        "{productos}": "Vestido Negro x2\nPolo Blanco x1",

        "{total}": "S/ 149.90",

        "{mensaje_cliente}": "Entregar después de las 5 PM"

    };

    function updatePreview() {

        let text = textarea.value;

        Object.keys(examples).forEach(variable => {

            text = text.replaceAll(
                variable,
                examples[variable]
            );

        });

        preview.innerHTML = text.replace(/\n/g, "<br>");

    }

    updatePreview();

    textarea.addEventListener(
        "input",
        updatePreview
    );

});