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
        if (nextSibling && nextSibling.nodeName === "UL")
        {
            targetDiv.className = ""
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


// function changePanelContent(e)
// {
//
//     let firstChild = document.getElementById("panel-content").firstChild;
//
//     while (firstChild.nextSibling !== null)
//     {
//         console.log(e.target)
//         if (firstChild.id === e.target.id+"-panel")
//         {
//             // console.log(firstChild.id," === ",e.target.id+"-panel")
//             if(firstChild.style)
//                 firstChild.style.display = 'flex';
//         }
//         else
//         {
//             if(firstChild.style)
//                 firstChild.style.display = "none";
//         }
//
//         firstChild = firstChild.nextSibling;
//     }
// }

// let rightSidebarSubMenuContent = document.querySelectorAll(".right-sidebar div a");
// for (let i = 0; i < rightSidebarSubMenu.length; i++) {
//     rightSidebarSubMenuContent[i].onclick = changePanelContent;
// }