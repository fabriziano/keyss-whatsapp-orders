
document.addEventListener("click", function(e){

    if(!e.target.classList.contains("kwo-copy")){
        return;
    }

    navigator.clipboard.writeText(
        e.target.dataset.token
    );

    e.target.textContent = "✅ Copiado";

    setTimeout(function(){

        e.target.textContent = "📋 Copiar";

    },1200);

});