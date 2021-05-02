let orgButton = document.getElementById('orgSubmit');

//Regex for verification of name
let name_format = /^[a-zA-Z].*[\s\.]*$/gi; //Single name format. For a name with space, use this: /^[a-zA-Z].*[\s\.]*$/gi

orgButton.onclick = function orgRegex(event) {
    //Getting form data
    let orgName = document.getElementById('orgName').value;
    let orgPass1 = document.getElementById('orgPass1').value;
    let orgPass2 = document.getElementById('orgPass2').value;
    let passCheck = orgPass1 === orgPass2;
    confirm("Do you want to submit this form?");
    if (!name_format.test(orgName)) {
        alert("The Entered Name For The Organization Is Invalid.");
        event.preventDefault();
    }
    if(!passCheck){
        alert("Passwords Do Not Match");
        event.preventDefault();
    }
}






