$(window).on("load", function (e) {
    $(".selectCodePen").hide();
    $(".filter").append('<div class="selectedOpt">Select filter<span class="carret">⌵</span></div><div class="selectBox"><div class="optList"></div></div>');
    var getSelectHtml = $(".selectCodePen").html();
    console.log(getSelectHtml);
    getSelectHtml = getSelectHtml.replace(/<option>/g, '<div class="option">');  
    getSelectHtml = getSelectHtml.replace(/<\/option>/g,"</div>");
    console.log(getSelectHtml);
    var optionLength =  $(".selectCodePen").find("option").length;
    console.log(optionLength);

    $(".optList").append(getSelectHtml);
    $(".optList").hide();
    $(".optList").on("click", ".option", function(){
        $(".option").removeClass("selected");
        $(this).addClass("selected");
        $(".selectedOpt").html('')
        var getHtmlOpt = $(this).html() + '<span class="carret">⌵</span>';
        $(".selectedOpt").append(getHtmlOpt);
        $('.optlist').hide();
    });
    
    $(".selectedOpt").mouseup(function(e) {
      var container = $(".selectBox");
  
      if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.toggleClass("openSelect");
            $(".optList").slideToggle();
        }
    });
});