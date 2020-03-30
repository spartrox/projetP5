
    //-------------------------------- Personnalisation des images et du textes dans le slider --------------------------
class main{
     constructor(){
        let image = [
            "public/image/image4.jpg",
            "public/image/image1.jpg",
            "public/image/image2.jpg",
            "public/image/image3.jpg"

        ];

        let texte = [
            "",
            " ",
            " ",
            "",

        ];
    
    //----------------- Récupération des élements dans le HTML ---------------------------
        let imageSlider = document.getElementById("imagediapo");
        let texteSlider = document.getElementById("texte");
        let flecheGauche = document.querySelector("#flechegauche");
        let flecheDroite = document.querySelector("#flechedroite");

    //------------------------------ Création du slider annimé ----------------------------
        let slider = new Slider(image, texte, imageSlider, texteSlider);
        slider.intervalId = setInterval(function(){slider.suivant();
        } , 20000);

    //-------------------------- Ajouts d'événements ---------------------------------
        flecheDroite.addEventListener("click", () => {
             slider.suivant();
        });

        flecheGauche.addEventListener("click", () => {
            slider.precedent();
        });

    //------------------------- Touches clavier flèche gauche et flèche droite --------------------------    
        document.addEventListener("keydown", (e) => {
    
            const code = e.keyCode;
        switch (code) {
            case 39:
                slider.suivant();
                break;
            case 37:
                slider.precedent();
                break;
        }
        });

    //---------------------------- Bouton pour la modification du profil -----------------------
        let modifMail = document.getElementById("modif_mail");

        modifmail.addEventListener('click',()=>{

            document.getElementById("mail").style.display = "block";             
        });

        let modifmdp = document.getElementById("modif_mdp");

        modifmdp.addEventListener('click',()=>{

            document.getElementById("mdp").style.display = "block";            
        });

    }
}
 let monMain = new main();       