<!--
function submitenter(myfield,e)
{
var keycode;
if (window.event) keycode = window.event.keyCode;
else if (e) keycode = e.which;
else return true;

if (keycode == 13 && event.shiftKey == false)
   {
   myfield.form.submit();
   return false;
   }
else
   return true;
}
//-->
