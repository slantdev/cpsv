jQuery(function ($) {
  // MEGA MENU
  $(".has_submenu").hover(
    function () {
      //console.log('hovered');
    },
    function () {
      $(".menu-article").removeAttr("style");
    }
  );

  $(".menu-has-article").hover(function () {
    $(".menu-article").removeClass("active").addClass("inactive");
    let dataArticle = $(this).data("target");
    //console.log(dataArticle);
    $("#" + dataArticle)
      .removeClass("inactive")
      .addClass("active");
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

  // FANCYBOX
  Fancybox.bind("[data-fancybox]", {
    // Custom options for all galleries
    tpl: {
      closeButton:
        '<button data-fancybox-close class="f-button is-close-btn top-6 right-6 rounded-full bg-black/50" title="{{CLOSE}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" tabindex="-1"><path d="M20 20L4 4m16 0L4 20"/></svg></button>',
    },
  });
});
