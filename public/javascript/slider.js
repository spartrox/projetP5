    //----------------------- Initialisation de la class Slider --------------------------
class Slider {
    constructor(tableauImage, tableauTexte, imageDiapo, texteDiapo) {
        this.imageDiapo = imageDiapo;
        this.texteDiapo = texteDiapo;
        this.image = tableauImage;
        this.texte = tableauTexte;
        this.index = 0;
        this.imageDiapo.src = this.image[this.index];
        this.texteDiapo.textContent = this.texte[this.index];
        
    }

    //-------------------------- Images suivantes ---------------------------------
    suivant() {
        this.index++;
        if (this.index > this.image.length - 1) {
            this.index = 0;
        }
        this.imageDiapo.src = this.image[this.index];
        this.texteDiapo.textContent = this.texte[this.index];
    }

    //-------------------------- Images précédentes ---------------------------------
    precedent() {
        this.index--;
        if (this.index < 0) {
            this.index = this.image.length - 1;
        }
        this.imageDiapo.src = this.image[this.index];
        this.texteDiapo.textContent = this.texte[this.index];
    }
};
