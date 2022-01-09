function onMediaSelect(e) {
    // console.log("hello");
    console.log(e);
    let addPostMediaPreview = document.getElementById('addPostMediaPreview');
    addPostMediaPreview.style.display = 'block';
    addPostMediaPreview.src = e.name;
    document.getElementById('addPostMediaPreviewValue').value = e.value;
    document.getElementById('selectMediaModalCloseButton').click();
}
console.log(document.getElementById('addPostMediaPreviewValue'));
let addPostMediaPreviewValue = document.getElementById('addPostMediaPreviewValue');
if (addPostMediaPreviewValue.value && addPostMediaPreviewValue.value!=="")
{
    document.getElementById("addPostMediaId-"+addPostMediaPreviewValue.value).click();
}