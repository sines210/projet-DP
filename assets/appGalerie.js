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
  
  toDrop.addEventListener('mouseover', (event) => {
    menuDrop.classList.add('toDrop');
  })

  document.body.addEventListener('click', ()=>{
    menuDrop.classList.remove('toDrop');
  })
  

//cards icons 
let iconsCards = document.querySelectorAll('.iconesImgCards');
let imgCards = document.querySelectorAll('.card');

iconsCards.forEach(icon=>{
  icon.classList.add('icon-hidden')
})

imgCards.forEach(img=>{
  img.classList.add('de')
})

let deployIcons = () =>{
 
  for(let i=0; i<=imgCards.length;i++){
    imgCards[i].addEventListener('mouseover', (event)=>{
      event.currentTarget.classList.remove('de');
      event.currentTarget.classList.add('hid');

      for(let c=0; c<=i; c++){
        if(c===i)
        {iconsCards[c].classList.add('deployI')}  }
    })

    imgCards[i].addEventListener('mouseleave', (event)=>{
      event.currentTarget.classList.remove('hid');
      event.currentTarget.classList.add('de');
      for(let c=0; c<=i; c++){
        if(c===i)
        {  iconsCards[c].classList.remove('deployI') }
      }
    })
  }  
  }
  deployIcons();




