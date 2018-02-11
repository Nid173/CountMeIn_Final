/*index Jquery and javascript*/

$(document).ready(function(){
  var $form = $("#signInForm");
  $("button[name=signin]").click(function(){
    $form.show();
  });

  $form.click(function(e){
    var click = $(e.target);
    var close = $("button[name=close]");
    var outside = $form.children().first().parents();
    if(click.is(close) || click.is(outside)){
      $form.hide();
    }
  })
});

/*Navbar Jquery And javascript*/
$( document ).ready(function() {
  if ($(window).width() < 992) {
     $(".navbar-form").show();
  }
    $("#main-search-button").click(function(){
      $(".navbar-form").slideToggle("fast");
    });
});


/*profile buttons*/

$(document).ready(function(){
  $("button[name='edit-profile']").click(function(){
    $(this).toggle();
    var h1= $("h1");
    var hText = h1.text();
    hText = "Edit "+hText;
    h1.html(hText);
    $("#profile-content fieldset").prop('disabled', false);
  });

});
