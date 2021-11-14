document.getElementById('jenis').addEventListener('change', function() {
  document.getElementById("draft_jenis").innerHTML = this.value;

  if(this.value == 'Non Racikan'){
    document.getElementById("div_racikan1").style.display = "none";
    document.getElementById("div_racikan2").style.display = "none";

    document.getElementById("div_labelQty").style.display = "flex";
    document.getElementById("div_labelObat").style.display = "flex";
    document.getElementById("div_labelNama").style.display = "none";

    document.getElementById("nama").required = false;
    document.getElementById("obat").required = true;
    document.getElementById("qty").required = true;

    document.getElementById("tbl_racikan").style.display = "none";
    document.getElementById("tbl_namaRacikan").style.display = "none";
    document.getElementById("tbl_obat").style.display = "table-row";
    document.getElementById("tbl_qty").style.display = "table-row";
  }else if(this.value == 'Racikan'){
    document.getElementById("div_racikan1").style.display = "block";
    document.getElementById("div_racikan2").style.display = "block";

    document.getElementById("div_labelQty").style.display = "none";
    document.getElementById("div_labelObat").style.display = "none";
    document.getElementById("div_labelNama").style.display = "flex";

    document.getElementById("nama").required = true;
    document.getElementById("obat").required = false;
    document.getElementById("qty").required = false;

    document.getElementById("tbl_namaRacikan").style.display = "table-row";
    document.getElementById("tbl_racikan").style.display = "table-row";
    document.getElementById("tbl_obat").style.display = "none";
    document.getElementById("tbl_qty").style.display = "none";
  }
});

document.getElementById('signa').addEventListener('change', function() {
  document.getElementById("draft_signa").innerHTML = this.value;
});

document.getElementById('obat').addEventListener('change', function() {
  document.getElementById("draft_obat").innerHTML = this.value;
});