// riwayat.js
document.getElementById("searchInput").addEventListener("keyup", filterTable);
document.getElementById("monthFilter").addEventListener("change", filterTable);

function filterTable() {
    let input = document.getElementById("searchInput").value.toUpperCase();
    let month = document.getElementById("monthFilter").value;
    let table = document.getElementById("dataTable");
    let tr = table.getElementsByTagName("tr");

    for (let i = 1; i < tr.length; i++) {
        let tdPlat = tr[i].getElementsByTagName("td")[1];
        let tdNIM = tr[i].getElementsByTagName("td")[4];
        let tdWaktuMasuk = tr[i].getElementsByTagName("td")[6];

        if (tdPlat || tdNIM || tdWaktuMasuk) {
            let platValue = tdPlat
                ? tdPlat.textContent || tdPlat.innerText
                : "";
            let nimValue = tdNIM ? tdNIM.textContent || tdNIM.innerText : "";
            let waktuMasukValue = tdWaktuMasuk
                ? tdWaktuMasuk.textContent || tdWaktuMasuk.innerText
                : "";

            let matchesMonth =
                month === "" ||
                (waktuMasukValue && waktuMasukValue.includes(`-${month}-`));

            if (
                (platValue.toUpperCase().indexOf(input) > -1 ||
                    nimValue.toUpperCase().indexOf(input) > -1) &&
                matchesMonth
            ) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function generatePDF() {
    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF();
    const plat =
        document.querySelector("#dataTable tbody tr td:nth-child(2)")
            ?.innerText || "Data";
    const month = document.getElementById("monthFilter").value || "All";

    // Set judul
    pdf.text("Sedang Parkir", 10, 10);

    // Cetak tabel ke PDF
    pdf.autoTable({ html: "#dataTable", startY: 20 });

    // Nama file: plat-bulan.pdf
    const fileName = `${plat}-${month}.pdf`;
    pdf.save(fileName);
}
