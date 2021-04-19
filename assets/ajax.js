
var url = "http://localhost:3001/config/tchatAjax.php";
var timer = setInterval(getMessages, 5000);
var btn = document.querySelector('#tr');
var tchatContain = document.querySelector('#tchat');
var message = document.querySelector('#sendMessage')

//c'est le js qui initie les requêtes en ajax avec submit, on attribue une action add ou get message pour faire les conditions d'action du php et on lui poste les message pour qu'il récupère les derniers messages à chaque interval; on vide le champ de text area après chaque envoi de message en lui donnant une valeur nulle ; on parse chaque fetch en json 

// document.querySelector('#tchat').scrollTop = document.querySelector('#tchat').scrollHeight;      

$(function() {
    $('#tchatForm form').submit(function(event){

        // message = message.trim();

        var content = $("#tchatForm form textarea").val();
        var pseudo= $("#tchatForm form #userName").val();
        $.post(url,{action:"addMessage", content: content, pseudo:pseudo}, function(data){
            if(data.erreur == 'ok'){
            getMessages();
            $("#tchatForm form textarea").val("")(); 
            }
            else{
               data.erreur.innerHTML = "erreur";
            }
        }, "json");
        return false;
    })
});



function getMessages(event) {


    var content = $("#tchatForm form textarea").val();
    var userName = $("#tchatForm form #username").val();

    $.post(url,{action:"getMessages"}, function(data){
        if(data.erreur == 'ok'){
           tchatContain.innerHTML = data.result;
           autoscroll();
        }
        else{
            data.erreur
        }
    }, "json");
    return false;


}

const autoscroll = ()=>{
    tchatContain.scrollTop = tchatContain.scrollHeight

}

// const autoscroll = () =>{
//   tchatContain.scrollTop = tchatContain.scrollHeight

//   var newMessage = tchatContain.lastElementChild;

//   var newMessageStyle = getComputedStyle(newMessage);

//   var newMessageMargin = parseInt(newMessageStyle.marginBottom);

//   var newMessageHeight = newMessage.offsetHeight + newMessageMargin;


//   var visibleHeight = tchatContain.offsetHeight;

//   var containerHeight = tchatContain.scrollHeight;

//   var scrollOffset = tchatContain.scrollTop + visibleHeight;
// console.log(containerHeight - newMessageHeight)

//   if(containerHeight - newMessageHeight <= scrollOffset){
//       tchatContain.scrollTop = tchatContain.scrollHeight
//       console.log(tchatContain.scrollTop)

//   }


// }
