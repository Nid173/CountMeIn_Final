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


/*addAppointment buttons*/
$(document).ready(function(){
  $("input[name='purpose_radio']").click(function(){
    if($(this).atrr('checked',true)){
      return;
    }
    $("#otherPurpose").slideToggle("fast");
    $("#purpose_select").attr('disabled','true');
  });
});


/*Slide DOWN TOGGLE*/

	$('.toggle').on("click", function(e) {
		$(this).toggleClass("expanded");
		$(this).closest('tr').next('tr').slideToggle("fast");
	});
