/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function AjaxString(URL,Status){

    var XmlHttpRequestObject =false;
    var FinalText="kanishka";
    var FinalText2="";
    var Obj;
    if(window.XMLHttpRequest){
        XmlHttpRequestObject=new XMLHttpRequest();
    // for fire fox
    }else if(window.ActiveXObject){
        XmlHttpRequestObject =new ActiveXObject("Microsoft.XMLHTTP");
    //for internet exploer;
    }

    XmlHttpRequestObject.open("GET",URL);
    XmlHttpRequestObject.onreadystatechange=function(){
        //        alert(XmlHttpRequestObject.readyState);
        //        alert(XmlHttpRequestObject.status);
        //+"&year="+year
        if(XmlHttpRequestObject.readyState==4 && XmlHttpRequestObject.status==200){
            if(Status==1){
            FinalText=XmlHttpRequestObject.responseXML;
          
            createOutput(FinalText);

            }
            else{
                if(Status==2){
                     FinalText=XmlHttpRequestObject.responseXML;
                     CreateOutput2(FinalText);
                }
                else{
                    if(Status==3){
                        FinalText=XmlHttpRequestObject.responseXML;
                     CreateOutput3(FinalText);
                    }

                }



            }
        }
    }
    XmlHttpRequestObject.send(null);


}



