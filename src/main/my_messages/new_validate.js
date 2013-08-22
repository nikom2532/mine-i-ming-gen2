/*
function checkform(form)
{
  // see http://www.thesitewizard.com/archive/validation.shtml
  // for an explanation of this script and how to use it on your
  // own website

  // ** START **
  if (form.username_receive.value == "") {
    alert( "Please enter who send to." );
    form.username_receive.focus();
    return false ;
  }
  // ** END **
  return true ;
}
*/

function validateForm()
{
var x=document.forms["send_message"]["username_receive"].value;
if (x==null || x=="")
  {
  alert("First name must be filled out");
  return false;
  }
}
