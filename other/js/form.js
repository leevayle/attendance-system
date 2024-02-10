//varriables
const username = document.getElementById('username');
const password = document.getElementById('password');
const form = document.getElementById('form');


document.getElementById('password-view').addEventListener('click', ()=>{
    var pass = document.getElementById('password');

    if (pass.type === 'text'){
        pass.type = 'password';

    } else{
        pass.type = 'text';
        setTimeout(()=>{
            pass.type = 'password';
        },2500);
    }
});

document.getElementById('icon1').addEventListener('contextmenu',event => event.preventDefault());
document.getElementById('icon2').addEventListener('contextmenu',event => event.preventDefault());

//automatically focus the username field on load
document.addEventListener('DOMContentLoaded', function(){
    document.getElementById('username').focus();
});



//check if the textboxes are not empty when user submits
document.getElementById('submit').addEventListener('click', check);

function check(){

    var passwordvalue = password.value;
    var pval = passwordvalue.length;
    var usernamevalue = username.value;
    var uval = usernamevalue.length;

    //  if(pval<=4){
   //     warningtext.textContent = 'Password is too short';
   //     warning.style.display = 'block';
   //     showNotif();
   // }
   

    if(uval<1){
        event.preventDefault();
        console.log('Username required!');
        warningtext.textContent = 'Kindly provide username';
        warning.style.display = 'block';
        showNotif();
        username.focus();
    }
    if(pval<1){
        event.preventDefault();
        console.log('Password required!');
        warningtext.textContent = 'Kindly provide password';
        warning.style.display = 'block';
        showNotif();
        password.focus();
    }
    if(uval<1 && pval<1){
        event.preventDefault();
        warningtext.textContent = 'Kindly fill your details';
        warning.style.display = 'block';
        showNotif();
        username.focus();
    }
    if(pval>=1 && uval>=1){ // && pval>=5        
        console.log('Checking credentials...');
    }

    console.log(username);
};

//don't submit on enter key
document.getElementById('form').addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
        check();
    }
});

//forgot password
function forgot(){
    infotext.textContent = 'Feature currently unavailable';
    info.style.display = 'block';
    showNotif();
};




