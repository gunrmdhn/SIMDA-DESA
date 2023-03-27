$(document).ready(function () {
    $("#table").DataTable({
        scrollX: true,
        dom:
            "<'mb-2 g-2 row align-items-end'<'col-md-8'B><'col-md-4'f>>" +
            "t" +
            "<'mt-1 g-2 row align-items-start'<'col-md-6'i><'col-md-6'p>>",
        select: true,
        buttons: [
            {
                extend: "pageLength",
                text: "Halaman",
                className: "btn btn-info",
            },
            {
                extend: "colvis",
                text: "Lihat",
                className: "btn btn-info",
            },
            {
                extend: "print",
                text: "Cetak",
                className: "btn btn-info",
                exportOptions: {
                    columns: ":visible",
                },
                footer: true,
            },
            {
                extend: "pdf",
                text: "Pdf",
                className: "btn btn-info",
                exportOptions: {
                    columns: ":visible",
                },
                footer: true,
            },
            {
                extend: "excel",
                text: "Excel",
                className: "btn btn-info",
                exportOptions: {
                    columns: ":visible",
                },
                footer: true,
            },
            {
                extend: "selectAll",
                text: "Pilih Semua",
                className: "btn btn-info",
            },
            {
                extend: "selectNone",
                text: "Batal Pilih",
                className: "btn btn-info",
            },
        ],
        lengthMenu: [
            [10, 20, 30, 40, 50, -1],
            ["10", "20", "30", "40", "50", "Semua"],
        ],
    });
});
$(document).ready(function () {
    $("#table-pengguna").DataTable({
        scrollX: true,
        dom:
            "<'mb-2 g-2 row align-items-end'<'col-md-8'B><'col-md-4'f>>" +
            "t" +
            "<'mt-1 g-2 row align-items-start'<'col-md-6'i><'col-md-6'p>>",
        select: true,
        buttons: [
            {
                extend: "pageLength",
                text: "Halaman",
                className: "btn btn-info",
            },
            {
                extend: "colvis",
                text: "Lihat",
                className: "btn btn-info",
            },
            {
                extend: "print",
                text: "Cetak",
                className: "btn btn-info",
                exportOptions: {
                    columns: ":visible",
                },
                footer: true,
            },
            {
                extend: "pdf",
                text: "Pdf",
                className: "btn btn-info",
                exportOptions: {
                    columns: ":visible",
                },
                footer: true,
            },
            {
                extend: "excel",
                text: "Excel",
                className: "btn btn-info",
                exportOptions: {
                    columns: ":visible",
                },
                footer: true,
            },
            {
                extend: "selectAll",
                text: "Pilih Semua",
                className: "btn btn-info",
            },
            {
                extend: "selectNone",
                text: "Batal Pilih",
                className: "btn btn-info",
            },
        ],
        lengthMenu: [
            [10, 20, 30, 40, 50, -1],
            ["10", "20", "30", "40", "50", "Semua"],
        ],
    });
});
