function div_show(page){
  window.open(page,"Login","menubar=no, status=no, scrollbars=no, menubar=no, width=550, height=500" );
}

var loginbtn=document.querySelector("#loginbtn");
loginbtn.addEventListener("click", div_show("login.php"));
