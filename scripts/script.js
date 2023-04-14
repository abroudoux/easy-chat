console.log('Fichier chargé');


// Text Change

    let txtImportant = document.getElementById('txt_important');


    txtImportant.addEventListener( 'click', () => {

        setTimeout(() => {
            txtImportant.textContent = "conseiller";
        }, 200);

        txtImportant.addEventListener( 'click', () => {

            setTimeout(() => {
                txtImportant.textContent = "assistant virtuel";
            }, 200);
    
        });

    });

//


// Modal 

    let modal = document.getElementById('modal');
    let overlayModal = document.getElementById('overlay_modal');
    let btnOpenModal = document.getElementById('btn_open_modal');
    let presentationTxt = document.getElementById('presentation_txt');


    btnOpenModal.addEventListener( 'click', () => {
        overlayModal.classList.add('open');
        modal.classList.add('open');
    });

    overlayModal.addEventListener( 'click', () => {
        overlayModal.classList.remove('open');
        modal.classList.remove('open');
        presentationTxt.style.remove.animation = "apparition 1s ease-in-out"
    });

    if (modal.classList.contains('open')) {
        presentationTxt.style.animation = "apparition 1s ease-in-out";
    };

//


// Text Hidden 

    let title = document.getElementById('title_fonctionnement');
    let txt = document.getElementById('hidden_txt');
    let modele3d = document.getElementById('modele_3d');


    title.addEventListener( 'mouseover', () => {

        setTimeout(() => {
            txt.classList.remove('hidden');
            txt.style.animation = "chargement_droite 1s ease-in-out";
        }, 100);

    });

    title.addEventListener( 'mouseout', () => {

        setTimeout(() => {
            txt.classList.remove('active');
            txt.style.animation = "disparition_droite 1s ease-in-out"

            setTimeout(() => {
                txt.classList.add('hidden');
            }, 1000)

        }, 100);

    });

    modele3d.addEventListener( 'mouseover', () => {

        setTimeout(() => {
            txt.classList.remove('hidden');
            txt.style.animation = "chargement_droite 1s ease-in-out";
        }, 100);

    });

    modele3d.addEventListener( 'mouseout', () => {

        setTimeout(() => {
            txt.classList.remove('active');
            txt.style.animation = "disparition_droite 1s ease-in-out"

            setTimeout(() => {
                txt.classList.add('hidden');
            }, 1000)

        }, 100);

    });

//