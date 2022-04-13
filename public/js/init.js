function generatePdf() {
    html2canvas(document.getElementById("reportTable"), {
        onrendered: function (canvas) {
            var data = canvas.toDataURL();
            let titulo = document.getElementById("titulo").value;
            let parrafo = document.getElementById("parrafo").value;
            var docDefinition = {
                content: [
                    { text: titulo, margin: 5 , alignment: "center", fontSize: 25, bold: true},
                    { text: parrafo, margin: 5 , alignment: "justify", fontSize: 13, bold: false},
                
                    {
                        image: data,
                        width: 500,
                    },
                ],
            };
            pdfMake.createPdf(docDefinition).print();
        },
    });
}
function getData() {
    let str = "";
    let zipcode = document.getElementById("zipcode").value;
    // let country = document.getElementById("country").value;
    fetch(
        "https://apis.forcsec.com/api/codigos-postales/20210924-856b9e6132d4e9f6/" +
            zipcode
    )
        .then((response) => response.json())
        .then((data) =>
            // console.log(data)
            data.data.asentamientos.forEach((element) => {
                console.log(element);
                str +=
                    '<option value="' +
                    element["nombre"] +
                    '"> ' +
                    element["nombre"] +
                    " </option>";
                document.getElementById("places").innerHTML = str;
            })
        );
}

function mostrar() {
    getSelectValue = document.getElementById("p_tantiviral").value;
    if (getSelectValue == "Sí") {
        $("#pantiviral").show();
    } else {
        $("#pantiviral").hide();
    }
}
function mostrarp() {
    getSelectValue = document.getElementById("p_viaje").value;
    if (getSelectValue == 0) {
        document.getElementById("divpviaje").classList.remove("col-md-12");
        document.getElementById("divpviaje").classList.add("col-md-6");
        $("#cviaje").show();
        $("#pais").show();
    } else {
        document.getElementById("divpviaje").classList.remove("col-md-6");
        document.getElementById("divpviaje").classList.add("col-md-12");
        $("#cviaje").hide();
        $("#pais").hide();
    }
}
function mostrarvinfluenza() {
    getSelectValue = document.getElementById("pvacuna_influenza").value;
    if (getSelectValue == 0) {
        document.getElementById("fvacunacion_influenza").readOnly = false;
    } else {
        document.getElementById("fvacunacion_influenza").readOnly = true;
    }
}
function mostraroantiviral() {
    getSelectValue = document.getElementById("tantiviral").value;
    if (getSelectValue == "Otro") {
        $("#divoantv").show();
        document.getElementById("divantiviral").classList.remove("col-md-6");
        document.getElementById("divantiviral").classList.add("col-md-3");
    } else {
        $("#divoantv").hide();
        document.getElementById("divantiviral").classList.remove("col-md-3");
        document.getElementById("divantiviral").classList.add("col-md-6");
    }
}
function mostrarvacuna() {
    getSelectValue = document.getElementById("pvacuna_covid").value;
    if (getSelectValue == 0) {
        document.getElementById("divpvacuna").classList.remove("col-md-12");
        document.getElementById("divpvacuna").classList.add("col-md-6");
        $("#mvacuna").show();
        $("#ndosisdiv").show();
    } else {
        document.getElementById("divpvacuna").classList.remove("col-md-6");
        document.getElementById("divpvacuna").classList.add("col-md-12");
        $("#mvacuna").hide();
        $("#ndosisdiv").hide();
    }
}

function numerodosis() {
    getSelectValue = document.getElementById("dosis_covid").value;
    if (getSelectValue == 2) {
        $("#fechavac2div").show();
    } else {
        $("#fechavac2div").hide();
    }
}
$(document).ready(function () {
    $("#reportTable").DataTable();
});
$(document).ready(function () {
    $("#sintomasTable").DataTable();
});
