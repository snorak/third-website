$(document).ready(function () {
    
    $(".del").click(function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        
        $.ajax({
            method : "GET",
            url : "../models/delete.php",
            data : {
                id : id
            },
            success : function(podaci) {
                console.log(podaci);
            },
            error : function(xhr, statusTxt, error){
                var status = xhr.status;
                switch(status) {
                    case 500:
                    alert('Greska na serveru');
                    break;
                    case 404:
                    alert("Stranica nije pronadjena");
                    break;
                    default:
                    alert("Greska: "+status+"-"+statusTxt);
                    break;
                }
            }
        });
    });
    
    $(document).on("click", ".dugme", function(){
        $(this).siblings('.showHide').slideToggle();
    });

    $("#sortCena").change(function() {
        var select = document.getElementById("sortCena");
        var sort = select.options[select.selectedIndex].value;
        
        $.ajax({
            url : "../models/filterSort.php",
            method : "POST",
            dataType : "json",
            data : {
                id : sort
            },
            success : function(data) {
                printAll(data);
            },
            error : function(error) {
                alert(error);
            }
        });    
    });

    $("#kategorije").change(function() {
        var select1 = document.getElementById("kategorije");
        var kat = select1.options[select1.selectedIndex].value;
        
        $.ajax({
            url : "../models/categories.php",
            method : "POST",
            dataType : "json",
            data : {
                id : kat
            },
            success : function(data) {
                printAll(data);
            },
            error : function(error) {
                alert(error);
            }
        });    
    });



    function printAll(data) {
        let ispis = "";
        var x = "";

        data.forEach(element => {
            ((element.discount == true) ?  x = "<i class='akcija'>Akcija!</i>" : x = "");
            ispis += `<div class="one_third shadow auto">
            <div class="view view-first">
            <img src="../assets/images/photo/${element.path}" alt="${element.description}" />
            </div>
            <h1 class='naziv'>${element.car_name} ${x}</h1>
            <p class='klasa'>Klasa: <i class='class'>${element.className}</i></p>
            <p class='cena'>Po ceni već od <i class="price">${element.price}&euro;</i></p>
            <div class="showHide">
                <p>Gorivo: ${element.fuel_type}</p>
                <p>Menjač: ${element.type}</p>
                <p>Broj putnika: ${element.passengers}</p>
            </div>
            <input type="button" class="dugme" value="Pogledaj više"/>`;
            ispis += "</div>";
        });
        $("#ispis").html(ispis);
    }

});