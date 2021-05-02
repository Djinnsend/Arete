let userButton = document.getElementById("userSubmit");
userButton.onclick = function userRegex(event){

    // Getting form data
    let fname = document.getElementById('fname').value;
    let lname = document.getElementById('lname').value;
    let username = document.getElementById('username').value;
    let name_format = /^[a-zA-Z].*[\s\.]*$/i; //Single name format. For a name with space, use this: /^[a-zA-Z].*[\s\.]*$/gi
    let pass1 = document.getElementById('userPass1').value;
    let pass2 = document.getElementById('userPass2').value;
    
    let passCheck = (pass1 === pass2);
    
    confirm("Do you want to submit this form?");
    if(!name_format.test(fname)){
        alert("The Entered First Name For The User Is Invalid.");
        event.preventDefault();
    }if(!name_format.test(lname)){
        alert("The Entered Last Name For The User Is Invalid.");
        event.preventDefault();
    }
    if(!name_format.test(username)){
        alert("The Entered Username For The Organization Is Invalid.");
        event.preventDefault();
    }
    
    if(!passCheck){
        alert("Passwords Do Not Match");
        event.preventDefault();
    }
    

}