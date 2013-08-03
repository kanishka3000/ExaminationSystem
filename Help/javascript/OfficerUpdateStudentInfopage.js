function makeText(e){
    if (window.event) e = window.event;
    var srcEl = e.srcelement? e.srcelement : e.target;
    var  val1=srcEl.childNodes[0];

    var val=val1.nodeValue;
    var te=document.createElement('input');
    te.type="text";
    te.size=val1.length;
    te.value=val;
    var id=srcEl.id;
    alert(id);
    switch(id){
        case "addressa" :te.onblur=makeFlatAddress1;break;
        case "addressb" :te.onblur=makeFlatAddress2;break;
        case "telephonea" :te.onblur=makeFlatTelephone;break;
        case "mobilea" :te.onblur=makeFlatMobile;
    }
    //    te.onblur=function(){
    //        kan(event);
    //    }
    srcEl.removeChild(val1);
    srcEl.appendChild(te);

}
function makeFlat(e){
    if (window.event) e = window.event;
    var srcEl = e.srcelement? e.srcelement : e.target;
    alert('hi');

}
function makeFlatName(){
   

}
function makeFlatAddress1(){
    
}
function makeFlatAddress2(){
    
}
function makeFlatTelephone(){
    
}
function makeFlatMoble(){
    
}

