

setInterval(()=> {
    const d = new Date();
    document.querySelector(".h").innerHTML = d.getHours();
    document.querySelector(".min").innerHTML = d.getMinutes();
    document.querySelector(".s").innerHTML = d.getSeconds();
    const days = ["Niedziela", "Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota"];
    document.querySelector(".date").innerText = `${days[d.getDay()]}, ${d.toLocaleDateString("pl-PL")}`
}, 1000);

document.querySelector("#ratinginput").addEventListener("change", (e) => {
    document.querySelector(".rating").innerHTML = e.target.value
})
