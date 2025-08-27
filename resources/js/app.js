import Masonry from "masonry-layout";
import imagesLoaded from "imagesloaded";

jQuery(function ($) {
  const grid = document.querySelector(".ff-masonry");
  if (grid) {
    imagesLoaded(grid, function () {
      const msnry = new Masonry(grid, {
        itemSelector: ".ff-grid-item",
        columnWidth: ".ff-grid-item",
        gutter: ".gutter-sizer",
        percentPosition: true,
      });
    });
  }

  // SHARE POPOVER
  // Show/hide popover
  $("body").on("click", ".share-btn", function (e) {
    e.stopPropagation();
    // Close all other popovers
    $(".share-popover")
      .not($(this).siblings(".share-popover"))
      .addClass("hidden");
    // Toggle current popover
    $(this).siblings(".share-popover").toggleClass("hidden");
  });

  // Close popovers when clicking outside
  $(document).on("click", function () {
    $(".share-popover").addClass("hidden");
  });

  // Stop click inside popover from closing it
  $("body").on("click", ".share-popover", function (e) {
    e.stopPropagation();
  });

  // Handle social sharing
  $("body").on("click", ".share-link", function (e) {
    e.preventDefault();
    const button = $(this);
    const container = button.closest(".share-container");
    const shareButton = container.find(".share-btn");
    const postSlug = shareButton.data("post-slug");
    const postTitle = shareButton.data("post-title");
    const pageUrl = window.location.href.split("#")[0];
    const shareUrl = `${pageUrl}#&gid=feline-gallery&pid=${postSlug}`;
    const encodedUrl = encodeURIComponent(shareUrl);
    const encodedTitle = encodeURIComponent(postTitle);

    let platformUrl = "";

    switch (button.data("platform")) {
      case "facebook":
        platformUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodedUrl}`;
        break;
      case "twitter":
        platformUrl = `https://twitter.com/intent/tweet?url=${encodedUrl}&text=${encodedTitle}`;
        break;
      case "linkedin":
        platformUrl = `https://www.linkedin.com/shareArticle?mini=true&url=${encodedUrl}`;
        break;
    }

    if (platformUrl) {
      window.open(platformUrl, "_blank", "width=600,height=400");
    }
  });

  // Handle Copy URL
  $("body").on("click", ".copy-url-btn", function (e) {
    e.preventDefault();
    const button = $(this);
    const container = button.closest(".share-container");
    const shareButton = container.find(".share-btn");
    const postSlug = shareButton.data("post-slug");
    const pageUrl = window.location.href.split("#")[0];
    const shareUrl = `${pageUrl}#&gid=feline-gallery&pid=${postSlug}`;
    const copyText = button.find(".copy-text");

    navigator.clipboard.writeText(shareUrl).then(() => {
      const originalText = button.text();
      copyText.text("Copied!");
      setTimeout(() => {
        copyText.text(originalText);
      }, 2000);
    });
  });

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
    $(this)
      .closest(".mega-menu--col-content")
      .find(".menu-article")
      .removeClass("active")
      .addClass("inactive");
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

  // Mobile Menu
  $(".menu-open-btn").click(function (e) {
    e.preventDefault();
    $(".main-nav--div").addClass("open");
    $(".menu-overlay").addClass("active");
    $("body").addClass("overflow-hidden");
  });
  $(".menu-close-btn, .menu-overlay").click(function (e) {
    e.preventDefault();
    $(".main-nav--div").removeClass("open");
    $(".menu-overlay").removeClass("active");
    $("body").removeClass("overflow-hidden");
  });
  $(".menu-right-btn").click(function (e) {
    e.preventDefault();
    $(this).siblings(".mega-menu").addClass("active");
    $(this).siblings(".dropdown-menu").addClass("active");
  });
  $(".menu-back-btn").click(function (e) {
    e.preventDefault();
    $(this).parents(".mega-menu").removeClass("active");
    $(this).parents(".dropdown-menu").removeClass("active");
  });

  // Search Form
  $(".menu-search-btn").click(function (e) {
    e.preventDefault();
    $("#header-searchform-input").focus();
    $("#search-form-container").addClass("show");
  });
  $("#close-searchform").click(function (e) {
    e.preventDefault();
    $("#search-form-container").removeClass("show");
  });

  // FANCYBOX
  Fancybox.bind("[data-fancybox='feline-gallery']", {
    // Custom options for this gallery
    Carousel: {
      Thumbs: false,
      Toolbar: {
        display: {
          left: [],
          middle: [],
          right: ["close"],
        },
      },
    },
    theme: "light",
    groupAll: true,
    slug: (fancybox, slide) => slide.triggerEl.dataset.slug,
  });

  // Also keep the generic one for other parts of the site.
  Fancybox.bind("[data-fancybox]:not([data-fancybox='feline-gallery'])", {
    // Custom options for all other galleries
    // tpl: {
    //   closeButton:
    //     '<button data-fancybox-close class="f-button is-close-btn top-6 right-6 rounded-full bg-black/50" title="{{CLOSE}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" tabindex="-1"><path d="M20 20L4 4m16 0L4 20"/></svg></button>',
    // },
  });

  // Woocommerce
  $(document).on("change", ".cart-content .quantity .qty", function (e) {
    $(".btn-update-cart").trigger("click");
  });

  // VOTE
  $("body").on("click", ".vote-btn", function (e) {
    e.preventDefault();
    const button = $(this);
    const postId = button.data("post-id");

    // Target all buttons for this post, including the one in the caption
    const allButtons = $(`.vote-btn[data-post-id='${postId}']`);
    const allVoteCountEls = allButtons.find(".vote-count");
    const allVoteLoaderEls = allButtons.find(".vote-loader");

    allVoteCountEls.hide();
    allVoteLoaderEls.show();

    $.post(my_theme_ajax.ajaxurl, {
      action: "handle_vote",
      post_id: postId,
    })
      .done(function (response) {
        if (response.success) {
          const newCount = response.data.new_count;
          const action = response.data.action;

          // Update vote count on all matching buttons
          allVoteCountEls.text(`${newCount}`);

          if (action === "voted") {
            allButtons.addClass("voted");
          } else {
            allButtons.removeClass("voted");
          }
        }
      })
      .always(function () {
        allVoteLoaderEls.hide();
        allVoteCountEls.show();
      });
  });

  // Sort Felines
  $(".ff-sort-buttons .sort-btn").on("click", function (e) {
    e.preventDefault();
    const button = $(this);
    const sortBy = button.data("sort");
    const searchTerm = $(".ff-search-form .ff-search-input").val();

    // Set active class
    $(".ff-sort-buttons .sort-btn").removeClass("active");
    button.addClass("active");

    trigger_feline_ajax(sortBy, searchTerm);
  });

  // Search Felines
  $(".ff-search-form").on("submit", function (e) {
    e.preventDefault();
    const searchTerm = $(this).find(".ff-search-input").val();
    const sortBy = $(".ff-sort-buttons .sort-btn.active").data("sort");
    trigger_feline_ajax(sortBy, searchTerm);
  });

  function trigger_feline_ajax(sortBy, searchTerm) {
    const scrollPos = $(window).scrollTop(); // Store scroll position
    const container = $("#ff-grid-container");
    const loader = container.siblings(".ff-loader-container"); // Updated selector

    loader.show(); // Show loader

    $.post(my_theme_ajax.ajaxurl, {
      action: "sort_famous_felines",
      sort_by: sortBy,
      search_term: searchTerm,
    })
      .done(function (response) {
        if (response.success) {
          container.html(response.data); // Replace content
          // Re-initialize masonry
          const grid = document.querySelector(".ff-masonry");
          if (grid) {
            imagesLoaded(grid, function () {
              const msnry = new Masonry(grid, {
                itemSelector: ".ff-grid-item",
                columnWidth: ".ff-grid-item",
                gutter: ".gutter-sizer",
                percentPosition: true,
              });
              // Restore scroll position
              $(window).scrollTop(scrollPos);
            });
          }
          // Check voted status
        }
      })
      .always(function () {
        loader.hide(); // Hide loader
      });
  }
});
