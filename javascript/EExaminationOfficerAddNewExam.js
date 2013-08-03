function selectCourse(){
    var cours=document.getElementById('course');
    var course=cours.value;
    AjaxString("Script/EExaminationOfficerAddNewExam.php?Course="+course,1);

   
    
}
function createOutput(FinalText){
    var ot=document.getElementById('year');
    if(FinalText==null){
        alert('No output to display');
    }
    else{
        FinalText1=FinalText.getElementsByTagName('year');
        var loopindex=0;
        for(loopindex=0;loopindex<FinalText1.length;loopindex++){
               
            var inti=document.createElement('option');
           
            inti.innerHTML=FinalText1[loopindex].firstChild.data;
            ot.appendChild(inti);
        }
          
           
    }
}
function selectYear(){
    var yea=document.getElementById('year');
    var year=yea.value;
    AjaxString("Script/EExaminationOfficerAddNewExam.php?year="+year,2);


}
function CreateOutput2(FinalText){
    var ot=document.getElementById('semester');
    if(FinalText==null){
        alert('No output to display');
    }

    else{
        FinalText1=FinalText.getElementsByTagName('semester');
        var loopindex=0;
        for(loopindex=0;loopindex<FinalText1.length;loopindex++){

            var inti=document.createElement('option');

            inti.innerHTML=FinalText1[loopindex].firstChild.data;
            ot.appendChild(inti);
        }
          




    }
  


}  function setSubmit(){
        var su=document.getElementById('stuff');
        var bu=document.createElement('input');
		bu.id="ok";
		bu.name="ok";
        bu.type="submit";
        bu.value="Next";
        su.appendChild(bu);



    }
    function reset(){
    window.refesh();
    


    }
