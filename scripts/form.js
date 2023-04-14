console.log('Fichier Form chargé');


// Form

    const formHeading = document.getElementById('form_heading');
    const formInputs = document.querySelectorAll(".input");

    formInputs.forEach((input) => {

        input.addEventListener( 'focus', () => {

            formHeading.style.opacity = "0";

            setTimeout(() => {
                formHeading.textContent = `${input.placeholder}`;
                formHeading.style.opacity = "1";

            }, 300);

        });

        input.addEventListener( 'blur', () => {

            formHeading.style.opacity = "0";

            setTimeout(() => {
                formHeading.textContent = "Nous contacter";
                formHeading.style.opacity = "1";
            }, 300);

        });

    });

//


// Dark Theme Form

    let btnSwitch = document.getElementById('btn_switch');
    let body = document.getElementById('main');
    let form = document.getElementById('form');
    let contentBtn = document.getElementById('content_btn');

    btnSwitch.addEventListener( 'click', () => {

        if (body.classList.contains('light')) {

            body.classList.remove('light')
            body.classList.add('dark');
            form.classList.remove('light')
            form.classList.add('dark');

            btnSwitch.classList.remove('btn-dark');
            btnSwitch.classList.add('btn-light');
            contentBtn.innerText = "Mode Jour";

        } else {

            body.classList.remove('dark')
            body.classList.add('light');
            form.classList.remove('dark')
            form.classList.add('light');

            btnSwitch.classList.remove('btn-light');
            btnSwitch.classList.add('btn-dark');
            contentBtn.innerText = "Mode Nuit";

        };

    });

//