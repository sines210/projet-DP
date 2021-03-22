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



//images
var sa1=document.querySelector(".img-sec-a2");

var c1=document.querySelector(".c1");
var c2=document.querySelector(".c2");
var c3=document.querySelector(".c3");
var c4=document.querySelector(".c4");
var c5=document.querySelector(".c5");
var c6=document.querySelector(".c6");

var images = ["./assets/img/kiss.jpg", "./assets/img/desinfection2.jpg", "./assets//img/ideas.jpg", "./assets/img/kids.jpg", "./assets/img/pq.jpg", "./assets/img/wearMask.jpg", "./assets/img/umbrella.jpg"]

c1.src=images[0]
c2.src=images[1]
c3.src=images[2]
c4.src=images[4]
c5.src=images[5]
c6.src=images[3]

sa1.src=images[6]


//scorll-top button
var btnScroll = document.querySelector("#btn-scroll");

btnScroll.addEventListener('click', ()=>
{
    window.scrollTo({top: 0, behavior: 'smooth'});})
//comportement byzzarre si je le passe en require???



