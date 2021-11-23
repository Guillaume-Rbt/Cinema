function pop (arg1, arg2) {
    var char_film = "<img class='img_pop' style='' src='Images/" + arg1 + ".'/>";
    var res_film = document.getElementById(arg2).innerHTML;
    char_film += "<div class='res_pop'>"+ res_film +"</div>";
    document.getElementById("pop").innerHTML+=char_film;
    document.getElementById("ms").style.display="block";
    document.getElementById("ms").animate([{opacity: 0},{opacity:1}],400);
}

function fermer() {
    document.getElementById("ms").animate([{opacity: 1},{opacity:0}],400);

    setTimeout(function (){
        var char_pop ="<div><button onclick='fermer()' class='fermer'>X</button></div>";
    document.getElementById("pop").innerHTML=char_pop;
    document.getElementById("ms").style.display="none";
    },350);
}
document.getElementById("ms").addEventListener("click", fermer,false);


var i = document.getElementById("icon");
i.addEventListener("click",function(){
   document.getElementById("bod").classList.toggle("with_menu"); 
},false);