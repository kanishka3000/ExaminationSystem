/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function studentExist(){
    var Reg=document.getElementById('RegText');
   var RegistrationNo=Reg.value;
   AjaxString("Script/RegistrationofficerRegisterCourse.php?RegistrationNo="+RegistrationNo,1);

}
function createOutput(FinalText){
    var Res= document.getElementById('FinRes');
    var table=document.createElement('table');
      FinalText1=FinalText.getElementsByTagName('course');
    var subjects=FinalText1;
    var loopindex;
    for(loopindex=0;loopindex<subjects.length;loopindex++){
       // alert(subjects[loopindex].firstChild.data);
        var tr=document.createElement('tr');
        var td1=document.createElement('td');
        var td2=document.createElement('td');
        td1.innerHTML=subjects[loopindex].firstChild.data;
        var rad=document.createElement('input');
        rad.type="radio";
        rad.value=subjects[loopindex].firstChild.data;
        rad.name="subject";
        td2.appendChild(rad);
        tr.appendChild(td1);
        tr.appendChild(td2);
        table.appendChild(tr);

    }
Res.appendChild(table);

    
}

