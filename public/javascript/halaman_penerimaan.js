$(document).ready(function () {
    var i = 1;
    $("#add_element").click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        i++;
        $("#DragDrop").append(
            '<tr id="row_DragDrop' +
                i +
                '">' +
                "<td>" +
                '<input type="text" class="form-control" placeholder="Ketik Kandungan" name="element[]" id="element">' +
                "</td>" +
                "<td>" +
                '<button class="btn btn-secondary btn-sm btn-fill btn_remove" id="' +
                i +
                '" name="remove" >x</button>' +
                "</td></tr>"
        );
    });
    $(document).on("click", ".btn_remove", function (e) {
        e.preventDefault();
        e.stopPropagation();
        var button_id = $(this).attr("id");
        $("#row_DragDrop" + button_id + "").remove();
    });
});

$(document).ready(function () {
    var i = 1;
    $("#edit_element").click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        i++;
        $("#editDragDrop").append(
            '<tr id="row_editDragDrop' +
                i +
                '">' +
                "<td>" +
                '<input type="text" class="form-control" placeholder="Ketik Kandungan" name="element[]" id="element">' +
                "</td>" +
                "<td>" +
                '<button class="btn btn-secondary btn-sm btn-fill btn_remove" id="' +
                i +
                '" name="remove" >x</button>' +
                "</td></tr>"
        );
    });
    $(document).on("click", ".btn_remove", function (e) {
        e.preventDefault();
        e.stopPropagation();
        var button_id = $(this).attr("id");
        $("#row_editDragDrop" + button_id + "").remove();
    });
});

$(document).ready(function () {
    $("#detailHalPenerimaan").on("show.bs.modal", function (e) {
        const tanggal = $(e.relatedTarget).data("tanggal");
        const batch_number = $(e.relatedTarget).data("batchnumber");
        const nama_pbf = $(e.relatedTarget).data("namapbf");
        const nama_obat = $(e.relatedTarget).data("namaobat");
        const kandungan = $(e.relatedTarget).data("kandungan");
        const kategori = $(e.relatedTarget).data("kategori");
        const golongan = $(e.relatedTarget).data("golongan");
        const expired = $(e.relatedTarget).data("expired");
        const dosis = $(e.relatedTarget).data("dosis");
        const satuan = $(e.relatedTarget).data("satuan");
        const pabrik = $(e.relatedTarget).data("pabrik");
        const harga_beli = $(e.relatedTarget).data("hargabeli");
        const jumlah_terima = $(e.relatedTarget).data("jumlahterima");
        const total_harga = $(e.relatedTarget).data("totalharga");
        $("#passing_tanggal").text(tanggal);
        $("#passing_pbf").text(nama_pbf);
        $("#passing_batch_number").text(batch_number);
        $("#passing_obat").text(nama_obat);
        $("#passing_kandungan").text(kandungan);
        $("#passing_kategori").text(kategori);
        $("#passing_golongan").text(golongan);
        $("#passing_expired").text(expired);
        $("#passing_dosis").text(dosis);
        $("#passing_satuan").text(satuan);
        $("#passing_pabrik").text(pabrik);
        $("#passing_hargabeli").text(harga_beli);
        $("#passing_jumlahterima").text(jumlah_terima);
        $("#passing_totalharga").text(total_harga);
    });
});

$(document).ready(function () {
    var table = $("#table_penerimaan").DataTable();
});
