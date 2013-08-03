function setSubjects(){
    var years=document.getElementById('years');
    var year=parseInt(years.value);
    if(isNaN(year)){
        alert('Please Enter a valid value for Years.....');
    }
   else{
       var Subject=document.getElementById('subject');
       var tab=document.createElement('table');

       for(var i=0;i<year;i++){
        var ro=document.createElement('tr');
        var cl=document.createElement('td');
        var cl2=document.createElement('td');
        cl.innerHTML="Year"+(i+1);
        ro.appendChild(cl);
        var inp=document.createElement('input');
        inp.type="text";
        inp.name="yr"+(i+1);
        cl2.appendChild(inp);
        ro.appendChild(cl);
        ro.appendChild(cl2);
        tab.appendChild(ro);
       }
       Subject.appendChild(tab);
   }


}


