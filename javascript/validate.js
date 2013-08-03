/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function checkText(){
    var textareas=document.getElementsByTagName('input');
    for(var i=0;i<textareas.length;i++){
       // alert(textareas[i].name);
        if((textareas[i].value=="") && (textareas[i].type="text")){
            alert('it is empty');
            return false;
        }
    }
    return true;
}
function checkTextArea(){
    var textareas=document.getElementsByTagName('textarea');
    for(var i=0;i<textareas.length;i++){
        //alert(textareas[i].value);
        if(textareas[i].value==""){
            alert('it is empty');
            return false;
        }
    }
    return true;
}


