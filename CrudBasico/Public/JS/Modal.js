import Swal from 'sweetalert2';


function alert(){
    Swal.fire({
        title: "¿Estas seguro de querer borrar este elemento?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Si, estoy seguro"
      }).then((result) => {
        if (result.isConfirmed) {
          
          Swal.fire({
            title: "Borrado!",
            text: "El elemento a sido borrado.",
            icon: "success"
          });
        }
      });
}


function Modal(elem){

    const Modal = document.getElementById(elem);
    Modal.hidden = false;
    function CerrarModal(){
        Modal.hidden = true; 
    }

    setTimeout(CerrarModal, 5000);
}


