const btnSubmitAsig = document.querySelector('#submitForm');
if(btnSubmitAsig){
btnSubmitAsig.addEventListener('click', (event)=>{
    event.preventDefault();
    let formulario = document.querySelector('#formAsig');
    let formData = new FormData(formulario);
    let tControl = formulario.getAttribute('tControl');
    let action = formulario.getAttribute('action');

    let vacio = false

    formData.forEach((currentValue, index)=>{
        if(currentValue =="" || currentValue == null){
            vacio=true;            
        }        
    })

    if(vacio==true){
        Modal('Modal_empty');
    }else{
        let link = 'http://localhost/CrudBasico/?typeControl='+tControl+'&a='+action;
        ajaxForm(formData, link);
        
    }
}
)}


const btnDelete = document.querySelectorAll('.deleteBtn');
if(btnDelete.length >0){
btnDelete.forEach((currentValue)=>{
    currentValue.addEventListener('click', (event)=>{    
        event.preventDefault();
        let idElem = currentValue.getAttribute('idElem');
        let tControl = currentValue.getAttribute('tControl');
        let action = currentValue.getAttribute('action');

        let data = {
            'idElem' : idElem,
        }
            
        let link = "http://localhost/CrudBasico/?typeControl="+tControl+"&a="+action+"";
    
    
        AlertDelete(data, link)
        
    
    
    })

})
}

