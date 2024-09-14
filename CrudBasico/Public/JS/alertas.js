const AlertDelete = (data, link) =>{

    Swal.fire({
            title: "¿Realmente quieres borrar esto?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Si, estoy seguro"
          }).then((result) => {
            if (result.isConfirmed) {
              ajaxDelete(data, link);
              
            }
          }); 
        }
    
    
        const AlertOk =()=>{
            Swal.fire({
                icon: "success",
                title: "¡Se realizaron los cambios!",
                showConfirmButton: false,
                timer: 1500
              }).then(()=>{
                location.reload();
              });

        }
    
        const AlertErr = () =>{
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "¡Algo salio mal, vuelva a intentarlo!",
              });
        }