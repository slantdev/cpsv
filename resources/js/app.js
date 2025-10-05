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
    const pageUrl = window.location.href.split('?')[0].split('#')[0];
    const shareUrl = `${pageUrl}?cat=${postSlug}`;
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
    const pageUrl = window.location.href.split('?')[0].split('#')[0];
    const shareUrl = `${pageUrl}?cat=${postSlug}`;
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

  // Feline AJAX Popup
  const felinePopup = {
    isOpen: false,
    galleryItems: [],
    currentIndex: -1,
    init: function () {
      this.shell = $("#feline-popup-shell");
      this.content = $("#feline-popup-content");
      this.closeBtn = $("#feline-popup-close");
      this.nextBtn = $("#feline-popup-next");
      this.prevBtn = $("#feline-popup-prev");

      this.updateGalleryItems();
      this.bindEvents();
      this.checkUrlOnLoad();
    },
    updateGalleryItems: function () {
      this.galleryItems = [];
      $(".open-feline-popup").each((index, el) => {
        this.galleryItems.push($(el).attr("href").replace("#", ""));
      });
    },
    bindEvents: function () {
      $("body").on("click", ".open-feline-popup", (e) => {
        e.preventDefault();
        const slug = $(e.currentTarget).attr("href").replace("#", "");
        const showActions = $(e.currentTarget).data("show-actions");
        this.open(slug, false, showActions);
      });

      this.closeBtn.on("click", (e) => {
        e.preventDefault();
        this.close();
      });

      this.shell.on("click", (e) => {
        if (
          $(e.target).is(this.shell) ||
          $(e.target).is(".feline-popup-wrapper")
        ) {
          e.preventDefault();
          this.close();
        }
      });

      this.nextBtn.on("click", (e) => {
        e.preventDefault();
        this.navigate(1);
      });

      this.prevBtn.on("click", (e) => {
        e.preventDefault();
        this.navigate(-1);
      });

      $(window).on("popstate", () => {
        this.checkUrlOnLoad();
      });
    },
    navigate: function (direction) {
      if (this.galleryItems.length === 0) return;
      let newIndex = this.currentIndex + direction;

      if (newIndex >= this.galleryItems.length) {
        newIndex = 0; // Loop to start
      } else if (newIndex < 0) {
        newIndex = this.galleryItems.length - 1; // Loop to end
      }

      const newSlug = this.galleryItems[newIndex];
      this.open(newSlug);
    },
    checkUrlOnLoad: function () {
      const urlParams = new URLSearchParams(window.location.search);
      const catSlug = urlParams.get('cat');

      if (catSlug) {
        if (this.galleryItems.includes(catSlug)) {
          this.open(catSlug, true); // Pass flag to prevent another pushState
        }
      } else {
        if (this.isOpen) {
          this.close(true); // Close without changing history
        }
      }
    },
    open: function (slug, fromHistory = false, showActions = true) {
      this.currentIndex = this.galleryItems.indexOf(slug);
      this.isOpen = true;
      this.shell.removeClass("hidden");
      $("body").addClass("overflow-hidden");

      this.content.html('<div class="feline-popup-loader"></div>');

      $.post(my_theme_ajax.ajaxurl, {
        action: "get_feline_popup_content",
        post_slug: slug,
        show_actions: showActions,
      })
        .done((response) => {
          if (response.success) {
            this.content.html(response.data.html);
            if (!fromHistory) {
              const newUrl = new URL(window.location.href);
              newUrl.searchParams.set("cat", slug);
              window.history.pushState({path: newUrl.href}, '', newUrl.href);
            }
          } else {
            this.content.html("<p>Could not load cat details.</p>");
          }
        })
        .fail(() => {
          this.content.html("<p>An error occurred.</p>");
        });
    },
    close: function (fromHistory = false) {
      this.isOpen = false;
      this.shell.addClass("hidden");
      this.content.html("");
      $("body").removeClass("overflow-hidden");
      if (!fromHistory) {
        const newUrl = new URL(window.location.href);
        newUrl.searchParams.delete("cat");
        window.history.pushState({path: newUrl.href}, '', newUrl.href);
      }
    },
  };

  felinePopup.init();

  // Also keep the generic one for other parts of the site.
  Fancybox.bind("[data-fancybox]:not([data-fancybox='purrfect-pin-up'])", {
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
  const confirmMovePopup = $("#vote-confirm-popup");
  const confirmMoveYesBtn = $("#vote-confirm-yes");
  const confirmMoveCancelBtn = $("#vote-confirm-cancel");
  let moveVotePromise = null;

  const welcomePopup = $("#vote-popup");
  const welcomeCloseBtn = $("#close-vote-popup");

  function processVote(postId) {
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
          // Handle 'voted' and 'unvoted' actions
          if (response.data.action === 'voted' || response.data.action === 'unvoted') {
            const newPost = response.data.new_post_data;
            const targetButtons = $(`.vote-btn[data-post-id='${newPost.id}']`);
            targetButtons.find(".vote-count").text(newPost.count);
            if (response.data.action === 'voted') {
              targetButtons.addClass("voted");
            } else {
              targetButtons.removeClass("voted");
            }
          }

          // Handle 'moved' action
          if (response.data.action === 'moved') {
            const newPost = response.data.new_post_data;
            const oldPost = response.data.old_post_data;

            const oldButtons = $(`.vote-btn[data-post-id='${oldPost.id}']`);
            oldButtons.removeClass("voted");
            oldButtons.find(".vote-count").text(oldPost.count);

            const newButtons = $(`.vote-btn[data-post-id='${newPost.id}']`);
            newButtons.addClass("voted");
            newButtons.find(".vote-count").text(newPost.count);
          }

          // After handling the vote, check if we need to show the welcome popup.
          const welcomePopupShown = sessionStorage.getItem("votePopupShown") === "true";
          if (!welcomePopupShown && (response.data.action === 'voted' || response.data.action === 'moved')) {
            welcomePopup.removeClass("hidden").addClass("flex");
            sessionStorage.setItem("votePopupShown", "true");
          }
        }
      })
      .always(function () {
        $(".vote-loader").hide();
        $(".vote-count").show();
        moveVotePromise = null;
        confirmMovePopup.addClass("hidden");
      });
  }

  $("body").on("click", ".vote-btn", function (e) {
    e.preventDefault();
    const button = $(this);
    const postId = button.data("post-id");
    const alreadyVotedForThis = button.hasClass("voted");
    const hasVotedForAnother = $(".vote-btn.voted").length > 0 && !alreadyVotedForThis;

    if (hasVotedForAnother) {
      // This is a vote move, ask for confirmation
      confirmMovePopup.removeClass("hidden").addClass("flex");
      moveVotePromise = { postId: postId };
    } else {
      // This is a fresh vote or an un-vote. Process immediately.
      processVote(postId);
    }
  });

  confirmMoveYesBtn.on("click", function(e) {
    e.preventDefault();
    if (moveVotePromise) {
      processVote(moveVotePromise.postId);
    }
  });

  confirmMoveCancelBtn.on("click", function(e) {
    e.preventDefault();
    moveVotePromise = null;
    confirmMovePopup.addClass("hidden");
  });

  // Handler for the welcome popup's close button
  welcomeCloseBtn.on("click", function () {
    welcomePopup.addClass("hidden");
  });

  // Sort Felines
  $(".ff-sort-buttons .sort-btn").on("click", function (e) {
    e.preventDefault();
    const button = $(this);
    const sortBy = button.data("sort");
    const section = button.closest(".section-wrapper");
    const searchTerm = section.find(".ff-search-form .ff-search-input").val();

    // Set active class
    section.find(".ff-sort-buttons .sort-btn").removeClass("active");
    button.addClass("active");

    trigger_feline_ajax(sortBy, searchTerm, 1, section);
  });

  // Search Felines
  $(".ff-search-form").on("submit", function (e) {
    e.preventDefault();
    const form = $(this);
    const section = form.closest(".section-wrapper");
    const searchTerm = form.find(".ff-search-input").val();
    const sortBy = section
      .find(".ff-sort-buttons .sort-btn.active")
      .data("sort");
    trigger_feline_ajax(sortBy, searchTerm, 1, section);
  });

  // Pagination
  $("body").on("click", ".ff-pagination a", function (e) {
    e.preventDefault();
    const link = $(this);
    const section = link.closest(".section-wrapper");
    const pageUrl = link.prop("href");
    let page = 1;

    const pagedMatch = pageUrl.match(/paged=(\d+)/);
    const pageMatch = pageUrl.match(/\/page\/(\d+)/);

    if (pagedMatch && pagedMatch[1]) {
      page = pagedMatch[1];
    } else if (pageMatch && pageMatch[1]) {
      page = pageMatch[1];
    }

    const sortBy = section
      .find(".ff-sort-buttons .sort-btn.active")
      .data("sort");
    const searchTerm = section.find(".ff-search-form .ff-search-input").val();

    trigger_feline_ajax(sortBy, searchTerm, page, section);
  });

  function trigger_feline_ajax(sortBy, searchTerm, page, section) {
    const scrollPos = $(window).scrollTop(); // Store scroll position
    const container = section.find("#ff-grid-container");
    const paginationContainer = $("#ff-pagination-container");
    const loader = section.find(".ff-loader-container");
    const postsPerPage = section.data("posts-per-page");

    loader.show(); // Show loader

    $.post(my_theme_ajax.ajaxurl, {
      action: "sort_famous_felines",
      sort_by: sortBy,
      search_term: searchTerm,
      page: page,
      posts_per_page: postsPerPage,
    })
      .done(function (response) {
        if (response.success) {
          container.html(response.data.posts); // Replace content
          paginationContainer.html(response.data.pagination); // Replace pagination

          felinePopup.updateGalleryItems(); // Update the gallery list

          const scrollToTarget = () => {
            $("html, body").animate(
              {
                scrollTop: container.offset().top - 100, // 100px offset
              },
              500
            );
          };

          // Re-initialize masonry
          const grid = container.find(".ff-masonry")[0];
          if (grid) {
            imagesLoaded(grid, function () {
              const msnry = new Masonry(grid, {
                itemSelector: ".ff-grid-item",
                columnWidth: ".ff-grid-item",
                gutter: ".gutter-sizer",
                percentPosition: true,
              });
              scrollToTarget();
            });
          } else {
            scrollToTarget();
          }
        }
      })
      .always(function () {
        loader.hide(); // Hide loader
      });
  }
});
