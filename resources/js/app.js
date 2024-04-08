jQuery(function ($) {
  //console.log("ready");

  $(".has_submenu").hover(
    function () {
      //console.log('hovered');
    },
    function () {
      $(".menu-article").removeAttr("style");
    }
  );

  $(".menu-has-article").hover(function () {
    $(".menu-article").hide();
    let dataArticle = $(this).data("target");
    //console.log(dataArticle);
    $("#" + dataArticle).show();
  });
  $(".menu-article").hover(
    function () {
      $(
        ".menu-has-article[data-target='" + $(this).attr("id") + "'] .menu-icon"
      ).css({
        visibility: "visible",
        opacity: "100",
      });
    },
    function () {
      $(
        ".menu-has-article[data-target='" + $(this).attr("id") + "'] .menu-icon"
      ).removeAttr("style");
    }
  );
});
