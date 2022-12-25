function checkUser()
{
    let user = document.querySelector('input[name="radio"]:checked').value;

    if (user == "0")
    {
        document.getElementById("clientFreelancer").classList.add('d-none');
        document.getElementById("signup_wrapper").classList.remove('d-none');
        document.getElementById("limited_inputs").classList.add('d-none');
        let hide = document.createElement("div");
        hide.innerHTML = "<input type='hidden' name='client' value='0'/>";
        document.getElementById("email").append(hide);


    }
    else if (user == "1")
    {
        document.getElementById("clientFreelancer").classList.add('d-none');
        document.getElementById("signup_wrapper").classList.remove('d-none');
        document.getElementById("limited_inputs").classList.remove('d-none');
        let free = document.createElement("div");

        free.innerHTML = "<input type='hidden' name='freelancer' value='1'/>";
        document.getElementById("email").append(free);

    }
}


var showSkillset = true;

function showSkills() {
    var skills = document.getElementById("skills");

    if (showSkillset) {
        skills.style.display = "block";
        showSkillset = false;
    } else {
        skills.style.display = "none";
        showSkillset = true;
    }
}

var showExpertiseSet = true;
function showExpertise() {
    var Expertise = document.getElementById("Expertise");

    if (showExpertiseSet) {
        Expertise.style.display = "block";
        showExpertiseSet = false;
    } else {
        Expertise.style.display = "none";
        showExpertiseSet = true;
    }
}


// Image uploader and placeholder

imgSelector.onchange = evt => {
    const [file] = imgSelector.files
    if (file) {
        imgContainer.src = URL.createObjectURL(file)
        document.getElementById("iconimg").style.display="none";
        document.getElementById("imgContainer").style.display="block";
    }
}
