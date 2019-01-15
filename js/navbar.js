//Class toggle i navbar, men også i mørk div, samt footer

$(document).ready(function(){
  $('.menu-tab').click(function(){
    $('.menu-hide').toggleClass('show');
    $('.menu-tab').toggleClass('active');
    $('.darken').toggleClass('active');
  });
  $('a').click(function(){
    $('.menu-hide').removeClass('show');
    $('.menu-tab').removeClass('active');
    $('.darken').removeClass('active');
  });
});