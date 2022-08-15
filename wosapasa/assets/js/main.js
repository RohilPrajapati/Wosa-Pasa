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
    togglePassword = document.getElementById('ctogglePassword');
    password = document.getElementById('c_password')
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
    stock = parseInt(document.getElementById('stock').value);
    qty = document.getElementById('qty');
    if(qty.value == stock){
        qty.value = stock;
    }else{
    // console.log(qty.value);
    qty.value = parseInt(qty.value) + 1;
    }
    return false;
}

function subQty(){
    stock = parseInt(document.getElementById('stock').value);
    qty = document.getElementById('qty');
    if(qty.value <= 1){
        qty.value = 1;
    }else{
        qty.value = parseInt(qty.value) - 1;
    }
    return false;
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

function validateAddProduct(){
    p_name = document.getElementById('name');
    p_desc = document.getElementById('desc');
    price = document.getElementById('price');
    no_of_stock = document.getElementById('num_stock');
    image = document.getElementById('image');

    p_name_error = document.getElementById('p_name_error');
    p_desc_error = document.getElementById('p_desc_error');
    p_price_error = document.getElementById('p_price_error');
    p_num_stock_error = document.getElementById('p_num_stock_error');
    p_image_error = document.getElementById('p_image_error');
    is_validate = true;

    p_name_error.style.display = "none";
    p_desc_error.style.display = "none";
    p_price_error.style.display = "none";
    p_num_stock_error.style.display = "none";
    p_image_error.style.display = "none";
    
    if(p_name.value.trim()==""){
        p_name_error.innerHTML = "Product Name can't be empty";
        p_name_error.style.display = "block";
        is_validate= false;
    }
    if(p_desc.value.trim()==""){
        p_desc_error.innerHTML = "Product detail can't be empty";
        p_desc_error.style.display = "block";
        is_validate= false;
    }
    if(price.value.trim()==""){
        p_price_error.innerHTML = "Price can't be empty";
        p_price_error.style.display = "block";
        is_validate= false;
    }else{
        if(Number(no_of_stock.value)<=0){
            p_price_error.innerHTML = "Price can't be less then 0 or equal to 0";
            p_price_error.style.display = "block";
            is_validate= false;
        }
    }

    if(no_of_stock.value.trim()==""){
        p_num_stock_error.innerHTML = "Number of Stock can't be empty";
        p_num_stock_error.style.display = "block";
        is_validate= false;
    }else{
        if(Number(no_of_stock.value)<0){
            p_num_stock_error.innerHTML = "Number of Stock can't be less then 0";
            p_num_stock_error.style.display = "block";
            is_validate= false;
        }
    }
    if(image.value.trim()==""){
        p_image_error.innerHTML = "Image can't be empty";
        p_image_error.style.display = "block";
        is_validate= false;
    }
    if(is_validate){
        document.getElementById('addProductForm').submit();
    }
}

function validateUpdateProduct(){
    p_name = document.getElementById('name');
    p_desc = document.getElementById('desc');
    price = document.getElementById('price');
    no_of_stock = document.getElementById('num_stock');

    p_name_error = document.getElementById('p_name_error');
    p_desc_error = document.getElementById('p_desc_error');
    p_price_error = document.getElementById('p_price_error');
    p_num_stock_error = document.getElementById('p_num_stock_error');
    is_validate = true;

    p_name_error.style.display = "none";
    p_desc_error.style.display = "none";
    p_price_error.style.display = "none";
    p_num_stock_error.style.display = "none";
    
    if(p_name.value.trim()==""){
        p_name_error.innerHTML = "Product Name can't be empty";
        p_name_error.style.display = "block";
        is_validate= false;
    }
    if(p_desc.value.trim()==""){
        p_desc_error.innerHTML = "Product detail can't be empty";
        p_desc_error.style.display = "block";
        is_validate= false;
    }
    if(price.value.trim()==""){
        p_price_error.innerHTML = "Price can't be empty";
        p_price_error.style.display = "block";
        is_validate= false;
    }

    if(no_of_stock.value.trim()==""){
        p_num_stock_error.innerHTML = "Number of Stock can't be empty";
        p_num_stock_error.style.display = "block";
        is_validate= false;
    }
    if(is_validate){
        document.getElementById('addProductForm').submit();
    }
}

function searchValidation(){
    query = document.getElementById('search_input');
    is_validate = true;
    if(query.value.trim()==""){
        is_validate= false;
    }
    if(is_validate){
        document.getElementById('seachForm').submit();
    }

}

function addCartQtyValidation(){
    stock = parseInt(document.getElementById('stock').value);
    qty = parseInt(document.getElementById('qty').value);
    qtyError = document.getElementById('qtyError');
    qtyError.style.display ='none';
    is_validate = true;
    if(qty> stock){
        qtyError.innerHTML = "Quantity is out of stock";
        qtyError.style.display = 'block';
        is_validate = false;
    }
    if(is_validate){
        document.getElementById('addCartForm').submit();
    }
}
function buyProduct(){
    qty = parseInt(document.getElementById('qty').value);
    stock = parseInt(document.getElementById('stock').value);
    form = document.getElementById('addCartForm');
    is_validate = true;
    if(qty> stock){
        qtyError.innerHTML = "Quantity is out of stock";
        qtyError.style.display = 'block';
        is_validate = false;
    }
    if(is_validate){
        form.action = '/buyProduct.php'
        document.getElementById('addCartForm').submit();
    }
}
function profileToggler(){
    submenu = document.getElementById('sub_menu');
    if(submenu.style.display == 'block'){
        submenu.style.display = 'none';
    }else{
        submenu.style.display = 'block';
    }
}
function validateOrderForm(){
    username = document.getElementById('name');
    address = document.getElementById('address');
    phone_no = document.getElementById('phone_no');
    nameerror = document.getElementById('nameError');
    addresserror = document.getElementById('addressError');
    phoneerror = document.getElementById('phoneError');
    form = document.getElementById('orderForm');
    nameerror.style.display = "none";
    addresserror.style.display = "none";
    phoneerror.style.display = "none";

    is_validate= true;
    if(username.value.trim()==""){
        nameerror.innerHTML = "Name can't be empty";
        nameerror.style.display = "block";
        is_validate= false;
    }
    if(address.value.trim()==""){
        addresserror.innerHTML = "Address can't be empty";
        addresserror.style.display = "block";
        is_validate= false;
    }
    if(phone_no.value.trim()==""){
        phoneerror.innerHTML = "Phone number can't be empty";
        phoneerror.style.display = "block";
        is_validate= false;
    }
    if(is_validate){
        form.submit();
    }
}
function advance_search(){
    search_query = document.getElementById('search_input').value;
    max = Number(document.getElementById('max_price').value);
    min = Number(document.getElementById('min_price').value);
    if(max < min){
        document.getElementById('as_price_error').innerHTML = "Maximum Price Can't be less then Minimum Price";
    }else{
        document.getElementById('a_search_input').value = search_query;
        document.getElementById('ad_search').submit();  
    }
}