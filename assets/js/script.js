document.addEventListener("DOMContentLoaded", () => {
    const deleteLinks = document.querySelectorAll("a[href*='hapus']");
    deleteLinks.forEach(link => {
        link.addEventListener("click", (e) => {
            if (!confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                e.preventDefault();
            }
        });
    });
});
