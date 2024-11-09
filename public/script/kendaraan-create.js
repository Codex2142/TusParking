document.querySelector("input[type=number]").oninput = (e) =>
    console.log(new Date(e.target.valueAsNumber, 0, 1));
