function searchTable() {
    // Mendapatkan input pencarian
    const input = document.getElementById("searchInput");
    const filter = input.value.toLowerCase();

    // Mendapatkan tabel dan barisnya
    const table = document.querySelector("table");
    const rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName("td");

        if (cells.length > 0) {
            const platNomor = cells[1].textContent.toLowerCase();
            const nomorInduk = cells[2].textContent.toLowerCase();

            if (platNomor.includes(filter) || nomorInduk.includes(filter)) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    searchInput.addEventListener("keyup", searchTable);
});
