$(function () {
    $(document).scroll(function () {
        console.log("hello")
      var $nav = $(".navbar");
      console.log($(this).scrollTop())
      $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
  });