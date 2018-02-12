// $(document).ready(function(){
//   $("input[name='free']").click(function(){
//     var value=1;
//     var aKeyValue = window.location.search.substring(1).split('&'),
//     var date = aKeyValue[0].split('=')[1];
//     if($(this).attr('checked',false)){
//       value=0;
//     }
//     var datastring = '?date='date'&?show='+value;
//     console.log(datastring);
//     /*if printed value is 0 then we need to hide it else...*/
//     $.ajax({
//       type:"POST",
//       url:"appointments.php",
//       data:datastring,
//       cache: true,
//       success: function(html){
//
//       }
//     });
//     return false;
//
//   });
// })

$(document).ready(function(){
  $("input[name='free']").click(function(){
    var value=1;
    if($(this).attr('checked',false)){
      value=0;
    }
    var datastring = window.location+ "&?show="+value;
    window.location.assign(datastring);
  });
});
