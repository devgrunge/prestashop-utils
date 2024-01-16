
setCookie = (cName, cValue, expDays) => {
    var date = new Date();
    date.setTime(date.getTime() + (expDays * 24 * 60 * 60 * 1000));
    var expires = `expires = ${date.toUTCString()}`;
    document.cookie = `${cName} = ${cValue} ; ${expires} ; path=/`;
}


getCookie = (cName) => {
    var name = `${cName} =`;
    var cDecoded = decodeURIComponent(document.cookie);
    var cArr = cDecoded.split("; ");
    var value;
    cArr.forEach(val => {
    if(val.indexOf(name) === 0) value = val.substring(name.length);
    })
    return value;
}


var cookiesButton = document.querySelector('#cookies-btn');

cookiesButton.addEventListener("click", () => {
    document.querySelector('#cookies').style.display = "none";
    setCookie("cookie", true, 30)
});


cookieMessage = () => {
    if(!getCookie("cookie")) 
    document.querySelector("#cookies").style.display = "block";
}

window.addEventListener("load", cookieMessage);