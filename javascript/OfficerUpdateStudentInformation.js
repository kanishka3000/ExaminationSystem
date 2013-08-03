/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function studentExist(){
    var Reg=document.getElementById('nid');
    var RegistrationNo=Reg.value;
    AjaxString("Script/OfficerUpdateStudentInformation.php?RegistrationNo="+RegistrationNo,1);

}
function createOutput(FinalText){
    //    var Res= document.getElementById('FinRes');
    //    var table=document.createElement('table');
    //FinalText1=FinalText.getElementsByTagName('course');


    var nid=FinalText.getElementsByTagName('nid');
    var name=FinalText.getElementsByTagName('name');
    var address=FinalText.getElementsByTagName('address');
    var address2=FinalText.getElementsByTagName('saddress');
    var telephone=FinalText.getElementsByTagName('telephone');
    var mobile=FinalText.getElementsByTagName('mobile');
    var university=FinalText.getElementsByTagName('university');
    var photo=FinalText.getElementsByTagName('image');
    var tempphot=photo[0].firstChild.data;
    // var nid=FinalText.getElementsByTagName();
    var knid=document.getElementById('nid');
    var kname=document.getElementById('name');
    var kaddress=document.getElementById('address');
    var kaddress2=document.getElementById('saddress');
    var ktelephone=document.getElementById('telephone');
    var kmobile=document.getElementById('mobile');
    var kuniversity=document.getElementById('university');
    var kphoto=document.getElementById('image');
    var image2=new Image();
    image2.src=tempphot;
    if(nid[0].firstChild.data!=null){
        knid.innerHTML=nid[0].firstChild.data;
        kname.innerHTML=name[0].firstChild.data;
        kaddress.innerHTML=address[0].firstChild.data;
        kaddress2.innerHTML=address2[0].firstChild.data;
        ktelephone.innerHTML=telephone[0].firstChild.data;
        kmobile.innerHTML=mobile[0].firstChild.data;
        //alert(photo[0].firstChild.data);
        kuniversity.innerHTML=university[0].firstChild.data;
        //kphoto.src=tempphot;

        kphoto.appendChild(image2);
    }else{
        alert('No results to display');
    }


//    var subjects=FinalText1;
//    var loopindex;
//    for(loopindex=0;loopindex<subjects.length;loopindex++){
//        // alert(subjects[loopindex].firstChild.data);
//        var tr=document.createElement('tr');
//        var td1=document.createElement('td');
//        var td2=document.createElement('td');
//        td1.innerHTML=subjects[loopindex].firstChild.data;
//        var rad=document.createElement('input');
//        rad.type="radio";
//        rad.value=subjects[loopindex].firstChild.data;
//        rad.name="subject";
//        td2.appendChild(rad);
//        tr.appendChild(td1);
//        tr.appendChild(td2);
//        table.appendChild(tr);

//  }
//    Res.appendChild(table);


}
function maketext(e){
    var rep=document.getElementById('stuff');
    var sa=document.getElementById('sa');
    sa.disabled=false;
    var targ;
    if (!e) var e = window.event;
    if (e.target) targ = e.target;
    else if (e.srcElement) targ = e.srcElement;
    // var text=targ.innerHTML;
    var se=document.createElement('input');
    se.type="text";
    se.name=targ.id;
    var see=targ.id;
    //var eve=new Event();
    var ins=targ.childNodes[0];
    var tex=targ.innerHTML;
    targ.removeChild(ins);
    se.value=tex;
    targ.onclick=null;
   // se.onblur=tempSave('kamal');
    targ.appendChild(se);
// alert(targ.id);
//rep.removeChild(targ);
// rep.replaceChild(se,targ);

//alert(targ.id);
}


