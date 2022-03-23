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

function validateLogin(){
    email = document.getElementById("email");
    password = document.getElementById("password");
    email_error = document.getElementById("email_error");
    password_error = document.getElementById("password_error");
    email_error.style.display="none";
    password_error.style.display="none";
    form = document.getElementById("login_form");
    is_validate = true;
    if(email.value.trim()==""){
        email_error.innerHTML = "E-mail can't be empty";
        email_error.style.display = "block";
        email_error.style.color = "red";
        is_validate= false;
    }
    if(password.value == ""){
        password_error.innerHTML = "Password can't be empty";
        password_error.style.display = "block";
        password_error.style.color = "red";
        is_validate = false;
    }
    if(is_validate){
        form.submit();
    }
}

function validateRegistration(){
    username = document.getElementById("username");
    email = document.getElementById("email");
    password = document.getElementById("password");
    c_password = document.getElementById("c_password");

    username_error = document.getElementById("username_error");
    email_error = document.getElementById("email_error");
    password_error = document.getElementById("password_error");

    username_error.style.display = "none";
    email_error.style.display= "none";
    password_error.style.display= "none";

    form = document.getElementById("form");

    is_validate = true;
    if(username.value.trim()==""){
        username_error.innerHTML = "E-mail can't be empty";
        username_error.style.display = "block";
        is_validate= false;
    }
    if(email.value.trim()==""){
        email_error.innerHTML = "E-mail can't be empty";
        email_error.style.display = "block";
        is_validate= false;
    }
    if(password.value == "" || c_password.value == ""){
        password_error.innerHTML = "Password can't be empty";
        password_error.style.display = "block";
        is_validate = false;
    }else{
        if (password.value.length < 8){
            password_error.innerHTML = "Password can't be less then 8";
            password_error.style.display = "block";
            is_validate=false;
        }
        if (String(password.value) !== String(c_password.value)){
            password_error.innerHTML = "Password and confirm password don't match";
            password_error.style.display = "block";
            is_validate=false;
        }
    }
    // console.log(String(password.value) !== String(c_password.value));
    
        if(is_validate){
            form.submit();
            // console.log("form has been submited");
        }
}
function addQty(){
    qty = document.getElementById('qty');
    if(qty.value == 12){
        qty.value = 12;
    }else{
    // console.log(qty.value);
    qty.value = parseInt(qty.value) + 1;
    }
}
function subQty(){
    qty = document.getElementById('qty');
    if(qty.value == 0){
        qty.value = 0
    }else{
        qty.value = parseInt(qty.value) - 1;
    }
}

function categoryFormValidation(){
    c_name = document.getElementById('name');
    c_error = document.getElementById('c_name_error');
    c_form = document.getElementById('category_form');
    is_validate = true;
    c_error.style.display = "none";

    if(c_name.value == ''){
        c_error.innerHTML = "Category cant be empty";
        c_error.style.display = "block";
        is_validate = false;
    }
    if(is_validate==true){
        c_form.submit()
    }
}