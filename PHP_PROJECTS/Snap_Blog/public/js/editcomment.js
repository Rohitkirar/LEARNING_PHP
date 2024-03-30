
function commentEditFunction(id){

    let unique = id.substr(id.length-3);

    let showeditcomment = document.getElementById('showeditcomment'+unique);
    let showcomment = document.getElementById('showcomment'+unique);
    let editbtn = document.getElementById(id);
    
    editbtn.style.display = "none";
    showeditcomment.style.display = "block";
    showcomment.style.display = "none" ;
}
