/*
$.fn.ctrlEnter = function (btns, fn) {  
  var thiz = $(this);  
      btns = $(btns);  
  
};  
function performAction (e) {  
  fn.call(thiz, e);  
}  
thiz.bind("keydown", function (e) {  
  if (e.keyCode === 13 && e.ctrlKey) {  
    performAction(e);  
    e.preventDefault();  
  }  
});  
  
btns.bind("click", performAction);  

$("#msg").ctrlEnter("button", function () {  
  $("<p></p>").append(this.val().replace(/\n/g, "<br />")).prependTo(document.body);  
  this.val("");  
});  
*/
/*
function MessageTextOnKeyEnter(e) {
    if (e.keyCode == 13) {
        if (e.ctrlKey) {
            var val = this.value;
            if (typeof this.selectionStart == "number" && typeof this.selectionEnd == "number") {
                var start = this.selectionStart;
                this.value = val.slice(0, start) + "\n" + val.slice(this.selectionEnd);
                this.selectionStart = this.selectionEnd = start + 1;
            } else if (document.selection && document.selection.createRange) {
                this.focus();
                var range = document.selection.createRange();
                range.text = "\r\n";
                range.collapse(false);
                range.select();
            }
        }
        return false;
    }
}
*/
/*
$.fn.ctrlEnter = function (btns, fn) {
var thiz = $(this);
thiz.keydown( function (e) {
if (e.keyCode === 13 && e.ctrlKey) {
$(this).val($(this).val() + “\n”);
}
else if(e.keyCode === 13 ) {
performAction(e);
e.preventDefault();
}
});
$(‘#’+btns).click( performAction);
function performAction (e) {
var thisVal = $.trim(thiz.val());
if(thisVal != ”)
{fn.call(thiz, e);}
}
};
*/
