const button = document.querySelector("button");


button.addEventListener("click", ()=> {
    let a1 = document.querySelector("#A1").value;
    let r = document.querySelector("#R").value;
    let n = document.querySelector("#N").value;

    while (n > 0) {
        document.querySelector("section").innerHTML += (a1 + " ");
        a1 = Number(a1) + Number(r);
        --n;
    }
})
