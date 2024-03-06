document.querySelector("input[type='button']").addEventListener("click", () => {
    let field = document.querySelector("input[type='number']");
    document.querySelector("#idontgetsleep").innerHTML = `<br><br>Liczba potrzebnych puszek: ${Math.ceil(field.value / 4)}`
});
