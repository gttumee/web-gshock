/*

TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

*/

'use strict';
$(document).ready(function() {

    // Accordion
    var all_panels = $('.templatemo-accordion > li > ul').hide();

    $('.templatemo-accordion > li > a').click(function() {
        console.log('Hello world!');
        var target =  $(this).next();
        if(!target.hasClass('active')){
            all_panels.removeClass('active').slideUp();
            target.addClass('active').slideDown();
        }
      return false;
    });
    // End accordion

    // Product detail
    $('.product-links-wap a').click(function(){
      var this_src = $(this).children('img').attr('src');
      $('#product-detail').attr('src',this_src);
      return false;
    });
    $('#btn-minus').click(function(){
      var val = $("#var-value").html();
      var price = $("#total-value").html();
      var total = price - price;
      val = (val=='1')?val:val-1;
      $("#var-value").html(val);
      $("#total-value").html(total);
      $("#product-quanity").val(val);
      return false;
    });
    $('#btn-plus').click(function(){
      var val = $("#var-value").html();
      var price = $("#total-value").html();
      val++;
      var total = price + price;
      $("#var-value").html(val);
      $("#total-value").html(total);
      $("#product-quanity").val(val);
      return false;
    });
    $('.btn-size').click(function(){
      var this_val = $(this).html();
      $("#product-size").val(this_val);
      $(".btn-size").removeClass('btn-secondary');
      $(".btn-size").addClass('btn-success');
      $(this).removeClass('btn-success');
      $(this).addClass('btn-secondary');
      return false;
    });

    $('#carousel-related-product').slick({
      infinite: true,
      arrows: false,
      slidesToShow: 4,
      slidesToScroll: 3,
      dots: true,
      responsive: [{
              breakpoint: 1024,
              settings: {
                  slidesToShow: 3,
                  slidesToScroll: 3
              }
          },
          {
              breakpoint: 600,
              settings: {
                  slidesToShow: 2,
                  slidesToScroll: 3
              }
          },
          {
              breakpoint: 480,
              settings: {
                  slidesToShow: 2,
                  slidesToScroll: 3
              }
          }
      ]
  });
  $(document).ready(function () {
    $("#secondorder").hide();
    $("#orderbutton").click(function () {
      var inputphone=$("#inputphonenumber").val();
      var inputname=$("#inputname").val();
      if(inputphone && inputname){
        $("#fistorder").hide();
        $("#secondorder").show();
        $("#phonenumber").text(inputphone);
        $("#orderinputname").val(inputname);
      }
      else
      {
        $("#errormessages").show().addClass("p-3 mb-2 bg-danger text-white").text('Та заавал өөрийн нэр болон утасны дугаараа оруулна !!');
      }
    });
    $('#cancel').on('click', function(e){
      e.preventDefault();
      window.history.back();
  });
  $('#cancelorder').on('click', function(e){
    $("#secondorder").hide();
    $("#fistorder").show();
    $("#errormessages").hide();
});
});

});
