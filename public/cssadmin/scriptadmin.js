

function edite(id , idcat) {
    rowid = id.id.split('-')[1];
    //console.log($("#Table_id tr"[1]));
    //console.log(id);
    
        document.getElementById("Table_id").rows[rowid].contentEditable = "true";
        //$('#' + id.id).html('<i class="fas fa-clipboard-check"></i> Ok');
        //click = false;
        //document.getElementById("Table_id").rows[rowid].style.border = "thick solid #0000FF";
        $('#formdesign').attr('action', 'update_Category/'+idcat);
        document.getElementById("id02").style.display="block";
        document.getElementById("add/edite").innerHTML="Edite Category";
        document.getElementById("name").value=document.getElementById("Table_id").rows[rowid].cells[1].innerHTML;
        document.getElementById("Edit").value=document.getElementById("Table_id").rows[rowid].cells[2].innerHTML;
        document.getElementById("editebutton").innerHTML="Edite";



        //window.location.href = "update_Category/"+idcat;
        //$('#' + id.id).html('<i class="fa fa-edit"></i> edite');
        
        document.getElementById("Table_id").rows[rowid].contentEditable = "false";
        /*
        console.log(document.getElementById("Table_id").rows[rowid].cells[0].innerHTML)
        console.log(document.getElementById("Table_id").rows[rowid].cells[1].innerHTML)
        console.log(document.getElementById("Table_id").rows[rowid].cells[2].innerHTML)
        */
        //document.getElementById("Table_id").rows[rowid].style.border = "none";

}
