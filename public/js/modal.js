// Obtener elementos del DOM
let modal = document.getElementById('miModal');
let openBtn = document.getElementById('openModal');
let closeBtn = document.getElementsByClassName('close')[0];


let all_container = document.querySelector('.allContainer');
let menu = document.querySelector('.barNav'); 


modal.style.display = 'none';
// Mostrar el modal al hacer clic en el botón
openBtn.addEventListener('click', function() {
    setTimeout(function(){
        all_container.style.filter = 'blur(3px)';
        menu.style.filter = 'blur(3px)';
        modal.style.display = 'block';
    }, 200);
});

// Ocultar el modal al hacer clic en el botón de cierre
closeBtn.addEventListener('click', function() {
  modal.style.display = 'none';
        all_container.style.filter = 'blur(0px)';
        menu.style.filter = 'blur(0px)';
});

// Ocultar el modal al hacer clic fuera del contenido del modal
window.addEventListener('click', function(event) {
  if (event.target == modal) {
    modal.style.display = 'none';
  }
});
