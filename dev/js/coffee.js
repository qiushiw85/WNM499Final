

$(function(){
  $.ajax({
    url:"data/drinks.json",
    dataType:"json"
  })
  .done(function(d){
    console.log(d)
    db = d;
  })


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
