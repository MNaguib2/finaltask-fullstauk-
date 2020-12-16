var click = true;

function edite(id) {
    rowid = id.id.split('-')[1];
    //console.log($("#Table_id tr"[1]));
    //console.log(id);
    if (click === true) {
        document.getElementById("Table_id").rows[rowid].contentEditable = "true";
        $('#' + id.id).html('<i class="fas fa-clipboard-check"></i> Ok');
        click = false;
        document.getElementById("Table_id").rows[rowid].style.border = "thick solid #0000FF";
    }
    else {
        click = true;
        $('#' + id.id).html('<i class="fa fa-edit"></i> edite');
        document.getElementById("Table_id").rows[rowid].contentEditable = "false";
        console.log(document.getElementById("Table_id").rows[rowid].cells[0].innerHTML)
        console.log(document.getElementById("Table_id").rows[rowid].cells[1].innerHTML)
        console.log(document.getElementById("Table_id").rows[rowid].cells[2].innerHTML)
        document.getElementById("Table_id").rows[rowid].style.border = "none";

        
    }
}

$("#Addcategory").click(function () {
    var name = prompt("Please enter Name Category");
    var Discription = prompt("Please enter Discription Category");
    if (name.length > 1 && Discription.length > 1) {
        location = location['C:/Users/mena_/Desktop/final%20task%20YAt/Admin/Admin%20Page.html']
        location.reload();
    } else {
        alert("Your data enter error please try again")
    }
});


//i will use alrt to input date from user