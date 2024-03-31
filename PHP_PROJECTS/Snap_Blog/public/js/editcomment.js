
function commentEditFunction(id){

    let unique = id.substr(id.length-3);
    let editbtn = document.getElementById(id);
    let showeditcomment = document.getElementById(editbtn.value);
    let showcomment = document.getElementById('showcomment'+unique);

    
    editbtn.style.display = "none";
    showeditcomment.style.display = "block";
    showcomment.style.display = "none" ;
}

  function viewComment(id){
    let commentbtn = document.getElementById(id);
    let idvalue = document.getElementById(id).value;
    let commentdiv = document.getElementById(idvalue);
    if(commentdiv.style.display=="block"){
      commentbtn.innerHTML = "view comments";
      commentdiv.style.display="none";
    }
    else{
      commentdiv.style.display="block";
      commentbtn.innerHTML = "hide comments";
    }

  }
