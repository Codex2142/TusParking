function searchTable() {
    let input = document.getElementById("searchInput").value.toUpperCase();
    let table = document.getElementById("kendaraanTable");
    let rows = table.getElementsByTagName("tr");

    // Loop through all table rows, except the first one (headers)
    for (let i = 1; i < rows.length; i++) {
        let cells = rows[i].getElementsByTagName("td");
        let plat = cells[1].textContent || cells[1].innerText;
        let nim = cells[2].textContent || cells[2].innerText;

        // Check if either plat or nim matches the search input
        if (
            plat.toUpperCase().indexOf(input) > -1 ||
            nim.toUpperCase().indexOf(input) > -1
        ) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }
}

function clearSearch() {
    document.getElementById("searchInput").value = "";
    searchTable(); // Reset table display
}
