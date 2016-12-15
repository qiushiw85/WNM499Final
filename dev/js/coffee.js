

$(function(){
  // $.ajax({
  //   url:"data/drinks.json",
  //   dataType:"json"
  // })
  // .done(function(d){
  //   console.log(d)
  //   db = d;
  // })

  $("[data-id]").on("click",function(e){
    e.preventDefault();
    var goTo = this.getAttribute("href");
    // $(this).html('');
    // $(this).addClass('fullscreen');
    $(".modal").show();
    $(".modal").css("background-color",$(this).css("background-color"));
    setTimeout(function(){$(".modal").css("bottom",0);},200);
    setTimeout(function(){
         window.location = goTo;
    },500);
  });

  $("[data-nav]").on("click",function(e){
    e.preventDefault();
    var goTo = this.getAttribute("href");
    $(".modal-top").show();
    $(".modal-top").css("background-color","#EDEDED");
    setTimeout(function(){$(".modal-top").css("top",0);},200);
    setTimeout(function(){
         window.location = goTo;
    },500);
  });


  // $("[data-id]").on("click",function(e){
  //   e.preventDefault();
    // $(".modal").show().find(".modal-inner").load("index.php?did="+$(this).data("id"))
    // setTimeout(function(){
    //   $(".modal").addClass("active")
    // },15);
    // $("body").css("overflow","hidden");
    // console.log($('.card-container').css('background-color'));
    // var drinkColor = $('.card-container').css('background-color');
    // $('.cup-bgr').css({fill:drinkColor});
    setTimeout(function(){
      $('.inner-liquid').css('animation-name','liquidFill');
      $('.inner-liquid').css('animation-duration','2s');
    },300);
    setTimeout(function(){
      $('.inner-cream').css('animation-name','liquidFill');
      $('.inner-cream').css('animation-duration','1.5s');
    },1000);
    setTimeout(function(){
      $('.card-cream').css('animation-name','jello');
      $('.card-cream').css('animation-duration','1.5s');
      $('.cup-cream-svg').css('animation-name','jello-big');
      $('.cup-cream-svg').css('animation-duration','1.5s');
    },2000);
  // })
  // $(".modal").on("click",function(){
  //   $(this).removeClass("active")
  //   setTimeout(function(){
  //     $(".modal").hide();
  //   },300);
  //   $("body").css("overflow","auto");
  // })
})
