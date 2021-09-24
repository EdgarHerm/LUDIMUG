function getData() {
    let str = "";
    let zipcode = document.getElementById("zipcode").value;
    // let country = document.getElementById("country").value;
    fetch("https://apis.forcsec.com/api/codigos-postales/20210924-856b9e6132d4e9f6/" + zipcode)
      .then((response) => response.json())
      .then((data) =>
        // console.log(data)
        data.data.asentamientos.forEach((element) => {
          console.log(element);
          str +=
            "<option value=\""+element["nombre"]+"\"> "+element["nombre"]+" </option>";
            document.getElementById("places").innerHTML = str;
        })
        
      );
  }
  