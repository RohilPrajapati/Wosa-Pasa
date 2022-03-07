function nav_toggler(){
    nav_menu = document.getElementById('nav_menu');
    if(nav_menu.style.display == 'none'){
        nav_menu.style.display = 'block';
    }else{
        nav_menu.style.display = 'none';
    }
}

 
function passwordToggler(){
    togglePassword = document.getElementById('togglePassword');
    password = document.getElementById('password')
    // toggle the type attribute
    if (password.getAttribute('type')==='password'){
        password.setAttribute("type", "text");
    }
    else{
        password.setAttribute("type", "password");
    }
};
function cpasswordToggler(){
    togglePassword = document.getElementById('togglePassword');
    password = document.getElementById('co_password')
    // toggle the type attribute
    if (password.getAttribute('type')==='password'){
        password.setAttribute("type", "text");
    }
    else{
        password.setAttribute("type", "password");
    }
};