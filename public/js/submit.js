const formulario = document.querySelector(".formulario_prevent");

formulario.addEventListener('submit', function(){
    const botonForm = document.querySelector(".submit-prevent-button");
    botonForm.setAttribute('disabled', 'true');
})
