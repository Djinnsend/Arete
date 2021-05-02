// Getting links
let updateLink = document.getElementById("updateLink");
let deleteLink = document.getElementById("deleteLink");

deleteLink.onclick = function verify(event){
    let state = confirm("Are you sure you wish to delete this Event?");
    if (state){
        alert("Event Deleted");
    }else{
        event.preventDefault();
    }
};