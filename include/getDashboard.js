
var usrid=1;
var day=12;
var lastSelected=12;
function getId(){
  var aKeyValue = window.location.search.substring(1).split('&'),
  usrid = aKeyValue[0].split('=')[1];
  // console.log("function user:"+usrid);
   return usrid;
}

$(document).ready(function getData(){
  $("#dashBoard button").click(function(){
    day = $(this).val();
    if(lastSelected==day){
      // console.log("yes i'm");
      return;
    }
    // console.log("lastSelected: "+lastSelected);
    // console.log("text "+ $("button[value=" + lastSelected + "] span").text());

    $('button[value= '+ lastSelected +' ] span').removeClass('selected');
    lastSelected=day;
    $('button[value='+ lastSelected +'] span').addClass('selected');
    // console.log("new lastSelected: "+lastSelected);
    // console.log("i'm here");
    getData();
  });
  $("#alerts-section").empty();
  usrid=getId();
  var shtml="";
  var count=0;
  $.getJSON("../data/dashboard.json",function(data){
    $.each(data.notifaction,function(){
      if(this.userid == usrid){
        if(this.day == day ){
          var message = this.message;
          var base= this.base;
          if(this.type==0){
            shtml+=('<div class="alert alert-warning">');
            shtml+=("<strong> !  </strong>");
          }else if(this.type==1){
            shtml+=('<div class="alert alert-danger">');
            shtml+=("<strong>DANGER! </strong>");
          }else{
            return;
          }
          shtml+=message;
          shtml+=('<span class="base">'+base+'</span></div>');
          $("#alerts-section").append(shtml);
          // console.log(shtml);
          count++;
        }
        shtml="";
      }
    });
    if(count==0){
      $("#alerts-section").append('<p class="noResult"> No Result For This Day</p>');
    }
    $("#alerts-section").append(shtml);
  });
});
