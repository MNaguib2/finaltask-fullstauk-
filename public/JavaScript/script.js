var discription = $("p.description");
var limit2 = 100;
var discriptions = [];
var discriptionsID = [];
var limit = "";
var content = "";
var isContentToggled = [];
var numtab;
//console.log(discription);
for (var i = 0; i< discription.length; i++){
  //console.log(discription[0].innerHTML);
  //console.log(discription[i].id);
  //numtab = discription[i].id.split("discription")[1].split("-");
  //console.log(numtab);
  discriptions.push(discription[i].innerHTML);
  discriptionsID.push(discription[i].id.split('-')[1]);
  isContentToggled.push(true);
  limit = discription[i].innerHTML.substr(0, limit2).lastIndexOf(' ');
  content = `${this.discription[i].innerHTML.substr(0, this.limit)}...`;
  document.getElementById(discription[i].id).innerHTML = content;
}
//console.log(discriptionsID);

/*
//console.log(discription);

  limit = discription.substr(0, limit2).lastIndexOf(' ');
  content = `${this.discription.substr(0, this.limit)}...`;
 document.getElementById("discription1-1").innerHTML = content;
//*/
 function toggleContent(id) {

  const arrayid = id.id.split('-');
  //console.log(discriptions[arrayid[1]]);
  var arrayindex = discriptionsID.indexOf(arrayid[1])

  if(isContentToggled[arrayindex]){
    //console.log(isContentToggled[arrayid[1]]);
    $(`a#${id.id}`).html("Read Less");
    isContentToggled[arrayindex] = false;
  }else{
    $(`a#${id.id}`).html('Read More');
    isContentToggled[arrayindex] = true;
  }  
//*
  this.limit = this.discriptions[arrayindex].substr(0, this.limit2).lastIndexOf(' ');
  //console.log(isContentToggled[arrayid[1]]);

  //first in this condition is true second is false
 isContentToggled[arrayindex] ? $(`p#${id.id}`).html(`${discriptions[arrayindex].substr(0, this.limit)}...`)
 : $(`p#${id.id}`).html(discriptions[arrayindex]);
         
        /*
        if(this.isContentToggled[id]){
          document.getElementById(`C${id}`).style.height = "auto";
          }else{
            document.getElementById(`C${id}`).style.height = "19rem";
          }
          */
  
  //console.log(this.isContentToggled);
}

  
$(document).ready(function() {
  /*/
  $(".vertical-center-4").slick({
    dots: true,
    vertical: true,
    centerMode: true,
    slidesToShow: 4,
    slidesToScroll: 2
  });
    
  $(".vertical-center-3").slick({
    dots: true,
    vertical: true,
    centerMode: true,
    slidesToShow: 3,
    slidesToScroll: 3
  });
  
  $(".vertical-center-2").slick({
    dots: true,
    vertical: true,
    centerMode: true,
    slidesToShow: 2,
    slidesToScroll: 2
  });
  $(".vertical-center").slick({
    dots: true,
    vertical: true,
    centerMode: true,
  });
  $(".vertical").slick({
    dots: true,
    vertical: true,
    slidesToShow: 3,
    slidesToScroll: 3
  });
  $(".regular").slick({
    dots: true,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3
  });
  $(".center").slick({
    dots: true,
    infinite: true,
    centerMode: true,
    slidesToShow: 5,
    slidesToScroll: 3
  });
  $(".variable").slick({
    dots: true,
    infinite: true,
    variableWidth: true
  });
  
  $(".lazy").slick({
    lazyLoad: 'ondemand', // ondemand progressive anticipated
    infinite: true
  });
  */
});
