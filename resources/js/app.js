jQuery(function ($) {
  if ($(".counterNumber").length) {
    counterNumber();
  }

  function counterNumber() {
    const counterUp = window.counterUp.default;

    const callback = (entries) => {
      entries.forEach((entry) => {
        const el = entry.target;
        if (entry.isIntersecting && !el.classList.contains("is-visible")) {
          for (const counter of counters) {
            counterUp(counter, {
              duration: 3000,
              delay: 16,
            });
            el.classList.add("is-visible");
          }
        }
      });
    };

    // observer
    const IO = new IntersectionObserver(callback, { threshold: 1 });

    // First element to target
    const el = document.querySelector(".counterNumber");

    // all numbers
    const counters = document.querySelectorAll(".counterNumber");
    IO.observe(el);
  }

  $(window).scroll(function () {
    $(".toAnim").each(function () {
      var _win = $(window),
        _ths = $(this),
        _pos = _ths.offset().top,
        _scroll = _win.scrollTop(),
        _height = _win.height();

      _scroll > _pos - _height * 0.7
        ? _ths.addClass("anim")
        : _ths.removeClass("anim");
    });
  });

  let observerOptions = {
    rootMargin: "0px",
    threshold: 0.2,
  };

  var observer = new IntersectionObserver(observerCallback, observerOptions);

  function observerCallback(entries, observer) {
    entries.forEach((entry) => {
      const node = entry.target;

      if (entry.isIntersecting) {
        node.classList.add("animated");
        return; // if we added the class, exit the function
      }

      // We're not intersecting, so remove the class!
      //node.classList.remove("animated");
    });
  }

  let target = ".animation-item";
  document.querySelectorAll(target).forEach((i) => {
    if (i) {
      observer.observe(i);
    }
  });

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
