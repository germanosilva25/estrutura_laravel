

function validate(element, id){
    const el = document.getElementById(`${id.toString()}`)
    if(element == 'numerico'){
        var valor = document.getElementById(`${id.toString()}`).value;
        if(!valor){
            alert(`campo deverá ser ${element}`)
            el.classList.add("is-invalid"); 
            disableButton()
        }
        else {
            el.classList.remove("is-invalid");
            enableButton()
        }
    }
    
    if(element == 'email'){
        var valor = document.getElementById(`${id.toString()}`).value;
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(valor.match(mailformat))
        {
            el.classList.remove("is-invalid");
            disableButton()
        }
        else
        {
            alert(`campo deverá ser ${element} válido!`)
            el.classList.add("is-invalid");
            disableButton()
        }
     
    }
}

function disableButton(){
    document.querySelector('button[type=submit]').disabled = true;
    
}
function enableButton(){
    document.querySelector('button[type=submit]').disabled = false;
}