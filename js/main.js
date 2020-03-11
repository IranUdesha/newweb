$(".siderbar_menu li").click(function(){
    $(".siderbar_menu li").removeClass("active");
    $(this).addClass("active");
  });
  
  $(".hamburger").click(function(){
    $(".wrapper").addClass("active");
  });
  
  $(".close, .bg_shadow").click(function(){
    $(".wrapper").removeClass("active");
  });

