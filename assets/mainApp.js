const cl = console.log;





//menu burger
let deployMenu =  () =>
{let burgerMenu = document.querySelector(".menu-burger");
let navigation = document.querySelector(".head-nav");
let navLinks = document.querySelectorAll(".head-nav li");
let crossClose = document.querySelector(".cross")


burgerMenu.addEventListener("click", () =>
{navigation.classList.add("deploy");
burgerMenu.classList.toggle("toggle");
navLinks.forEach((element, index)=> {
    if(element.style.animation)
    {element.style.animation = ''}
    else
    {element.style.animation = `links-fading 0.5s ease forwards ${index/6 + 0.5}s`} //la division permet d'avoir un effet graduelle proportionné et .5s pour délai initial commun
  });
})
crossClose.addEventListener("click", () =>
{ 
    navigation.classList.replace("deploy", "head-nav");
    navLinks.forEach((element, index)=> {
        if(element.style.animation)
        {element.style.animation = ''}
        else
        {element.style.animation = `links-fading 0.5s ease forwards ${index/6 + 0.5}s`} //la division permet d'avoir un effet graduelle proportionné et .5s pour délai initial commun
      });
})

}
deployMenu()



//dropdown connexion

var menuDrop = document.querySelector('.connect');
var toDrop = document.querySelector('.arrow-show');
let articleClass = document.querySelector('.article');


toDrop.addEventListener('click', (event) => {
  menuDrop.classList.add('toDrop');
})

articleClass.addEventListener('click', ()=>{
  menuDrop.classList.remove('toDrop');
})
