

var btn = document.getElementById("btn");

btn.addEventListener('click', generateKey());

document.querySelector("body").addEventListener("load",function(){
    const captchaChar ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789/.?-_#@()%!+*';

    var captchaCharLength = captchaChar.length;

    let captcha = '';
    for(let i = 0; i<5;i++){
        captcha += captchaChar.charAt(Math.floor(Math.random() * captchaCharLength));
    }

    console.log(captcha);
});



function generateKey(){

    const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789/.?-_#@()%!+*';

    let key = '';
    var carLength = characters.length;
    for (let i = 0; i < 40; i++) {
        key += characters.charAt(Math.floor(Math.random() * carLength));
    }

    const d = new Date();
    d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));
    let expires = "expires="+d.toUTCString();

    document.cookie = "key="+key+";" +expires+";path=/";
    document.getElementById("example").setAttribute('value','My default value');
}
