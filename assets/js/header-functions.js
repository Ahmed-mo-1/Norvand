//header

 const menu = document.querySelector(".menu");
 const menuMain = menu.querySelector(".menu-main");
 let subMenu;
 menuMain.addEventListener("click", (e) =>{
 	if(!menu.classList.contains("active")){
 		return;
 	}
   if(e.target.closest(".menu-item-has-children")){
   	 const hasChildren = e.target.closest(".menu-item-has-children");
      showSubMenu(hasChildren);
   }
 });

let savednode;

function toggleMenu(){
menu.classList.toggle("active");
document.querySelector(".menu-overlay").classList.toggle("overlayactive");
}

//go to submenu and hide icons group
function showSubMenu(hasChildren){
subMenu = hasChildren.querySelector(".mega-menu");
subMenu.classList.add("active");
const menuTitle = hasChildren.querySelector("i").parentNode.childNodes[0].textContent;
menu.querySelector(".current-menu-title").innerHTML=menuTitle;
menu.querySelector(".mobile-menu-head").classList.add("active");
savednode = document.querySelector(".mobile-menu-head-icons-group-container").cloneNode(true);
document.querySelector(".mobile-menu-head-icons-group-container").remove();
}

//return to main menu and prepend icons group
function  hideSubMenu(){  
subMenu.classList.remove("active");	
menu.querySelector(".current-menu-title").innerHTML="";
menu.querySelector(".mobile-menu-head").classList.remove("active");
document.querySelector(".mobile-menu-head").prepend(savednode)
}


//on resize toggle menu if active
window.onresize = function(){
if(this.innerWidth >991){
if(menu.classList.contains("active")){toggleMenu();}
}
}

// cart
function toggleCart(){
document.querySelector(".leftmenu").classList.toggle("active");
document.querySelector(".cart-overlay").classList.toggle("overlayactive");
}
//search
function togglesearch(){
document.querySelector(".search-menu").classList.toggle("active");
document.querySelector(".search-overlay").classList.toggle("overlayactive");
if(menu.classList.contains("active")){menu.classList.remove("active");}
if(document.querySelector(".menu-overlay").classList.contains("overlayactive")){document.querySelector(".menu-overlay").classList.remove("overlayactive");}
}
 