function cargar(){

    document.getElementById("selector").addEventListener('change', order);
}

function order(){

    var select;

    select = document.getElementById("selector").value;

    document.getElementById("a").style.order = 0;
    document.getElementById("b").style.order = 0;
    document.getElementById("c").style.order = 0;
    document.getElementById("d").style.order = 0;
    document.getElementById("e").style.order = 0;
    document.getElementById("f").style.order = 0;
    document.getElementById("g").style.order = 0;
    document.getElementById("h").style.order = 0;
    document.getElementById("i").style.order = 0;
    
    if(select == "angel"){
        document.getElementById("a").style.order = -1;   
    }
    if(select == "baltasar"){
        document.getElementById("b").style.order = -1;    
    }
    if(select == "carlos"){
        document.getElementById("c").style.order = -1;    
    }
    if(select == "david"){
        document.getElementById("d").style.order = -1;    
    }
    if(select == "eulogio"){
        document.getElementById("e").style.order = -1;   
    }
    if(select == "fran"){
        document.getElementById("f").style.order = -1;    
    }
    if(select == "genaro"){
        document.getElementById("g").style.order = -1;   
    }
    if(select == "hector"){
        document.getElementById("h").style.order = -1;    
    }
    if(select == "irene"){
        document.getElementById("i").style.order = -1;   
    }
    if(select == "joan"){
        document.getElementById("j").style.order = -1;   
    }

}
document.addEventListener("DOMContentLoaded", cargar);