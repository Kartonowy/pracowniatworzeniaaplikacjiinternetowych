let tiles = document.querySelectorAll("div");
let hidden = document.querySelector("input[type='hidden']")
console.log(tiles)
tiles.forEach ((tile) => {
    console.log(tile)
    tile.addEventListener('click', ()=> {
        let date = tile.querySelector("h5").innerText;
        alert("Wybrałeś " + date);
        hidden.value = date
    })
})
