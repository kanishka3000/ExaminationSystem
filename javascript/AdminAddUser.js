/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function genaratePassword(){
   // alert('genarating password');
    var pass=document.getElementById('Password');
    var ra=Math.ceil(Math.random()*100000000);
   var a= ra.toString(16);
   pass.value=a;

}
function areYouSure(){
    var val=window.confirm('are you sure you want to delete the user');
    return val;
}

