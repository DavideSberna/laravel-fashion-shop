import { forEach } from "lodash";

export function showMenu(e){
    e.stopPropagation();
    let menu = e.currentTarget.querySelector(".al-menu");
    let menuData = e.currentTarget.closest(".al-menu-data");
    let height = menuData.offsetHeight;

    menu.classList.toggle("al-menu-visible");
    menu.style.top = `${height}px`;
}

export function removeMenusHandler(){
    let menus = document.getElementsByClassName("al-menu");

    for(let i = 0; i < menus.length; i++)
            menus[i].classList.remove("al-menu-visible");
}

export function resizeSidebar(){
    let sidebar = document.getElementsByTagName("aside")[0];
    let sidebarResizer = document.getElementsByClassName("sidebar-resizer")[0];
    let sidebarResizerChevron = sidebarResizer.querySelector("i");
    let links = sidebar.querySelectorAll("a");

    window.Var.resized = !window.Var.resized; 

    if(window.Var.resized){ //Ingrandisco la sidebar
        sidebar.classList.add("sidebar-resized");
        
        links.forEach(function(link){
            let span = link.querySelector("span");
            span.classList.remove("d-none");

            sidebarResizerChevron.classList.remove("fa-solid", "fa-chevron-right");
            sidebarResizerChevron.classList.add("fa-solid", "fa-chevron-left");
        });
    }
    else{ //Rimpicciolisco la sidebar
        sidebar.classList.remove("sidebar-resized");

        links.forEach(function(link){
            let span = link.querySelector("span");
            span.classList.add("d-none");

            sidebarResizerChevron.classList.remove("fa-solid", "fa-chevron-left");
            sidebarResizerChevron.classList.add("fa-solid", "fa-chevron-right");
        });
    }
}

export function submitForm(e){
    let form = e.target.closest("form");
    form.submit();
}