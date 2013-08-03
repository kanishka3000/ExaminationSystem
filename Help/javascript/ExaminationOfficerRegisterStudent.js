/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function getCourse(){
    var Registration=document.getElementById('registrationid');
    var RegistrationId=Registration.value;
    //  alert(RegistrationId);
    AjaxString("Script/ExaminationOfficerRegisterStudent.php?RegistrationId="+RegistrationId,1);



}
function getCourse2(){
    var Registration=document.getElementById('registrationid2');
    var RegistrationId=Registration.value;
    //  alert(RegistrationId);
    AjaxString("Script/ExaminationOfficerRegisterStudent.php?RegistrationId="+RegistrationId,3);
}
function createOutput(FinalText){
    if(FinalText!=null){
        // alert(FinalText);
        var Res= document.getElementById('course');
        //var table=document.createElement('table');
        //table.id="course2";
        FinalText1=FinalText.getElementsByTagName('course');
        var subjects=FinalText1;
        var loopindex;
        for(loopindex=0;loopindex<subjects.length;loopindex++){
            // alert(subjects[loopindex].firstChild.data);
            //        var tr=document.createElement('tr');
            //        var td1=document.createElement('td');
            //        var td2=document.createElement('td');
            var td1=document.createElement('span');
            td1.innerHTML=subjects[loopindex].firstChild.data+"<br/>";
            var rad=document.createElement('input');
            rad.type="radio";
            rad.onclick=getSubject;
            rad.value=subjects[loopindex].firstChild.data;
            rad.name="course";
            //        td2.appendChild(rad);
            //        tr.appendChild(td1);
            //        tr.appendChild(td2);
            //        table.appendChild(tr);

            Res.appendChild(rad);
            Res.appendChild(td1);
        }
    //    Res.appendChild(table);
    }
    else{
        alert('No results to display');
    }




}
function getSubject(){
    var select;
    var td=document.getElementById('course');
    var tr=td.getElementsByTagName('input');
    for(var i=0;i<tr.length;i++){
        if(tr[i].checked==true){
            select=tr[i].value;
        }
    }
    // alert(select);
    AjaxString("Script/ExaminationOfficerRegisterStudent.php?CourseId="+select,2);

// alert('hi');
}
function  CreateOutput2(FinalText){
    if(FinalText!=null){
        var Res= document.getElementById('subject');
        //var table=document.createElement('table');
        //table.id="course2";
        FinalText1=FinalText.getElementsByTagName('subject');
        var subjects=FinalText1;
        var loopindex;
        for(loopindex=0;loopindex<subjects.length;loopindex++){

            var td1=document.createElement('span');
            td1.innerHTML=subjects[loopindex].firstChild.data+"<br/>";
            var rad=document.createElement('input');
            rad.type="checkbox";
            // rad.onclick=selectSubjects;
            rad.value=subjects[loopindex].firstChild.data;
            rad.name=subjects[loopindex].firstChild.data;


            Res.appendChild(rad);
            Res.appendChild(td1);
        }
        var sub=document.createElement("input");
        sub.type="submit";
        sub.value="save";
        Res.appendChild(sub);


    }else{
     alert('No results to display');
    }


}
function CreateOutput3(FinalText){
     if(FinalText!=null){
    var Res= document.getElementById('course2');
    //var table=document.createElement('table');
    //table.id="course2";
    FinalText1=FinalText.getElementsByTagName('course');
    var subjects=FinalText1;
    var loopindex;
    for(loopindex=0;loopindex<subjects.length;loopindex++){
        // alert(subjects[loopindex].firstChild.data);
        //        var tr=document.createElement('tr');
        //        var td1=document.createElement('td');
        //        var td2=document.createElement('td');
        var td1=document.createElement('span');
        td1.innerHTML=subjects[loopindex].firstChild.data+"<br/>";
        var rad=document.createElement('input');
        rad.type="radio";
        rad.onclick=createText;
        rad.value=subjects[loopindex].firstChild.data;
        rad.name="course"+subjects[loopindex].firstChild.data;
        //        td2.appendChild(rad);
        //        tr.appendChild(td1);
        //        tr.appendChild(td2);
        //        table.appendChild(tr);

        Res.appendChild(rad);
        Res.appendChild(td1);
    }
     }else{
         alert('No Results to display');
     }


}

function selectSubjects(){
    //alert('hallo');
    var select;
    var td=document.getElementById('subject');
    var tr=td.getElementsByTagName('input');
    for(var i=0;i<tr.length;i++){
        if(tr[i].checked==true){
            select=tr[i].value;
        }

    }
    alert(select);
}