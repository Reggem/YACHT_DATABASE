function popupwindow() {
  var left = (screen.width/2)-(200/2);
  var top = (screen.height/2)-(200/2);
  return window.open("addcomp.php", "Add a new company", 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+600+', height='+650+', top='+200+', left='+650);
}
