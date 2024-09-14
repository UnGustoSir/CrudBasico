const ajaxDelete = (data, link) =>{
    $.ajax(
    {
        url: link,
        type: 'POST',
        data: data, 
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        processData: true,
        success: function(resp){
            let respJSON = JSON.parse(resp);
            if(respJSON.status=='Finalizado'){
                //
                switch(respJSON.alerta){
                    
                    case('AlertOk'):
                        AlertOk();
                    break;
                    case('Modal_Ok'):
                        Modal('Modal_Ok');
                    break;
                }
            }else if(respJSON.status=='ERROR'){
                switch(respJSON.alerta){
                    
                    case('Modal_err'):
                        Modal('Modal_err');
                    break;
                    case('AlertErr'):
                        AlertErr();
                    break;
                }

            }
        },
        error: function(err){
            console.log('Hubo un error: '.err);
        }
    }
)}



const ajaxForm = (data, link) =>{
    $.ajax(
    {
        url: link,
        type: 'POST',
        data: data, 
        contentType: false, 
        processData: false,
        success: function(resp){
            console.log(resp);
            let respJSON = JSON.parse(resp);
            if(respJSON.status=='Finalizado'){
                //
                switch(respJSON.alerta){
                    case('Modal_Ok'):
                        Modal('Modal_Ok');
                    break;
                    case('AlertOk'):
                        AlertOk();
                    break;
                    case('AlertErr'):
                        AlertErr();
                    break;
                }
            }else if(respJSON.status=='ERROR'){
                switch(respJSON.alerta){
                    case('Modal_exist'):
                        Modal('Modal_exist');
                    break;
                    case('Modal_err'):
                        Modal('Modal_err');
                    break;
                }
            }
        },
        error: function(err){
            console.log('Hubo un error: '.err);
        }
    }
)}