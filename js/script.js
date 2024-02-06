
var nowscroll = window.pageYOffset;
window.onscroll = function chek(){
var secondscroll = window.pageYOffset;
if(nowscroll < secondscroll)
document.getElementById('nav').style.top="-81px";
else
document.getElementById('nav').style.top="0px";
nowscroll = secondscroll;
}
