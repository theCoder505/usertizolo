const captcha = document.querySelector(".captcha"),
    reloadBtn = document.querySelector(".reload-btn"),
    checkCaptcha = document.querySelector("#checkCaptcha"),
    submitBtn = document.querySelector("#submitBtn"),
    statusTxt = document.querySelector(".status-text");

//storing all captcha characters in array
let allCharacters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O',
    'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd',
    'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's',
    't', 'u', 'v', 'w', 'x', 'y', 'z', 0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
function getCaptcha() {
    for (let i = 0; i < 6; i++) {
        let randomCharacter = allCharacters[Math.floor(Math.random() * allCharacters.length)];
        captcha.innerText += ` ${randomCharacter}`;
    }
}
getCaptcha();
reloadBtn.addEventListener("click", () => {
    removeContent();
    getCaptcha();
});

submitBtn.disabled = true;
checkCaptcha.value = '';

checkCaptcha.addEventListener("change", e => {
    e.preventDefault();
    statusTxt.style.display = "block";
    let inputVal = checkCaptcha.value.split('').join(' ');
    if (inputVal == captcha.innerText) {
        statusTxt.style.color = "#4db2ec";
        statusTxt.innerText = "Nice! You are good to go!...";
        // submitBtn 
        submitBtn.removeAttribute("disabled");
        setTimeout(() => {
            removeContent();
            getCaptcha();
        }, 60000);
    } else {
        statusTxt.style.color = "#ff0000";
        statusTxt.innerText = "Captcha not matched. Please try again!";
    }
});




function removeContent() {
    checkCaptcha.value = "";
    captcha.innerText = "";
    statusTxt.style.display = "none";
    submitBtn.disabled = true;
}