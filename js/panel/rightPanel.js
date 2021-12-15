function expandSubMenu (e){

    let targetDiv = e.target.parentElement;
    let nextSibling = targetDiv.nextSibling;
    while(nextSibling && nextSibling.nodeType !== 1)
    {
        nextSibling = nextSibling.nextSibling
    }
    if(targetDiv.className !== "active")
    {
        activateSubMenu(targetDiv);
        if (nextSibling.nodeName === "UL")
        {
            nextSibling.style.maxHeight = "500px";
            nextSibling.style.height = "auto";
        }


    }
}

function activateSubMenu(targetDiv){
    let firstChild = targetDiv;
    while (firstChild.previousSibling !== null)
    {
        firstChild = firstChild.previousSibling;
    }
    while (firstChild.nextSibling !== null)
    {
        firstChild.className = "";
        if (firstChild.nodeName === "UL")
        {
            firstChild.style.maxHeight = "0";
            firstChild.style.height = "0";
        }

        firstChild = firstChild.nextSibling;
    }
    targetDiv.className = "active"
}


let rightSidebarSubMenu = document.querySelectorAll(".right-sidebar div");
for (let i = 0; i < rightSidebarSubMenu.length; i++) {
    rightSidebarSubMenu[i].onclick = expandSubMenu;
}