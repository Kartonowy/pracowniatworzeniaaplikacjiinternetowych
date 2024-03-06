class Car {
    constructor(marka, model, cena, spalanie) {
        this.marka = marka
        this.model = model
        this.cena = cena
        this.spalanie = spalanie
    }
    koszt100km(fuel) {
        return this.spalanie * fuel
    }

    wiekSamochodu(year) {
        return Number(new Date().getFullYear()) - Number(year);
    }
}

let pb = 4

oferta = new Car("Kia", "carens", 60000, 8)

console.log(oferta)
