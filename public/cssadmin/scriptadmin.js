

function edite(id , idcat) {
    rowid = id.id.split('-')[1];
        $('#formdesign').attr('action', 'update_Category/'+idcat);
        document.getElementById("id02").style.display="block";
        document.getElementById("add/edite").innerHTML="Edite Category";
        document.getElementById("name").value=document.getElementById("Table_id").rows[rowid].cells[1].innerHTML;
        document.getElementById("Edit").value=document.getElementById("Table_id").rows[rowid].cells[2].innerHTML;
        document.getElementById("editebutton").innerHTML="Edite";
}

  function Addthing() {
      $('#formdesign').attr('action', 'AddCategory/');
      document.getElementById("id02").style.display="block";
      document.getElementById("add/edite").innerHTML="Add New Category";
      document.getElementById("name").value="";
      document.getElementById("Edit").value="";
      document.getElementById("editebutton").innerHTML="Add New Category";

}