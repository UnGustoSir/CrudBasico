

function Modal(elem){

    const Modal = document.getElementById(elem);
    Modal.hidden = false;
    function CerrarModal(){
        Modal.hidden = true; 
    }

    setTimeout(CerrarModal, 5000);
}


