//@prepros-prepend fslightbox.js
//@prepros-prepend slick.min.js
//@prepros-prepend scrollreveal.js
//@prepros-prepend mixitup.min.js
//@prepros-prepend read-more.js

jQuery(document).ready(function ($) {
  /* ADD CLASS ON SCROLL*/

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
      $("body").addClass("scrolled");
    } else {
      $("body").removeClass("scrolled");
    }
  });

  // ========== Controller for lightbox elements

  // ========== NAVBAR SCROLL AWAY

  $(document).ready(function () {
    "use strict";

    var c,
      currentScrollTop = 0,
      navbar = $("#header"),
      campTabs = $("#camp-tabs");

    $(window).scroll(function () {
      var a = $(window).scrollTop();
      var b = navbar.height();

      currentScrollTop = a;

      if (c < currentScrollTop && a > b + b) {
        navbar.addClass("scrollUp");
        campTabs.addClass("scrollUp");
      } else if (c > currentScrollTop && !(a <= b)) {
        navbar.removeClass("scrollUp");
        campTabs.removeClass("scrollUp");
      }
      c = currentScrollTop;
    });
  });

  //=========== Slick Slider

  $(".testimonial-carousel").slick({
    centerMode: false,
    centerPadding: "125px",
    slidesToShow: 1,
    prevArrow:
      "<button type='button' class='slick-prev pull-left'><i class='fa-thin fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow:
      "<button type='button' class='slick-next pull-right'><i class='fa-thin fa-angle-right' aria-hidden='true'></i></button>",
    // responsive: [
    //   {
    //     breakpoint: 768,
    //     settings: {
    //       arrows: false,
    //       centerMode: true,
    //       centerPadding: '40px',
    //       slidesToShow: 1
    //     }
    //   },
    //   {
    //     breakpoint: 480,
    //     settings: {
    //       arrows: false,
    //       centerMode: true,
    //       centerPadding: '40px',
    //       slidesToShow: 1
    //     }
    //   }
    // ]
  });

  $(".hero-slider").slick({
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: "linear",
    autoplay: true,
    autoplaySpeed: 7000,
    arrows: false,
  });

  $(".awards-wrapper").slick({
    centerMode: false,
    centerPadding: "125px",
    slidesToShow: 3,
    prevArrow:
      "<button type='button' class='slick-prev pull-left'><i class='fa-thin fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow:
      "<button type='button' class='slick-next pull-right'><i class='fa-thin fa-angle-right' aria-hidden='true'></i></button>",
    autoplay: true,
    autoplaySpeed: 4000,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          slidesToShow: 1,
        },
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          slidesToShow: 1,
        },
      },
    ],
  });

  $(".accom-slider").slick({
    adaptiveHeight: true,
    prevArrow:
      "<button type='button' class='slick-prev pull-left'><i class='fa-thin fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow:
      "<button type='button' class='slick-next pull-right'><i class='fa-thin fa-angle-right' aria-hidden='true'></i></button>",
  });

  $(".slider-gallery").slick({
    infinite: true,
    slidesToShow: 3,
    prevArrow:
      "<button type='button' class='slick-prev pull-left'><i class='fa-thin fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow:
      "<button type='button' class='slick-next pull-right'><i class='fa-thin fa-angle-right' aria-hidden='true'></i></button>",
  });

  $(".gallery-wrapper").slick({
    arrows: false,
    slidesToShow: 1.1,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          slidesToShow: 1,
          dots: true,
        },
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          slidesToShow: 1,
          dots: true,
        },
      },
    ],
  });

  $(document).ready(function () {
    $(".block__title").click(function (event) {
      if ($(".block").hasClass("one")) {
        $(".block__title").not($(this)).removeClass("active");
        $(".block__text").not($(this).next()).slideUp(300);
      }
      $(this).toggleClass("active").next().slideToggle(300);
    });
  });

  //=========== Scroll Reveal

  var slideLeft = {
    distance: "40px",
    origin: "left",
    opacity: 0.0,
    duration: 1000,
    delay: 250,
    mobile: false,
  };
  var slideRight = {
    distance: "40px",
    origin: "right",
    opacity: 0.0,
    duration: 1000,
    mobile: false,
  };
  var slideDown = {
    distance: "40px",
    origin: "top",
    opacity: 0.0,
    duration: 1000,
    mobile: false,
  };
  var slideUp = {
    distance: "40px",
    origin: "bottom",
    opacity: 0.0,
    duration: 1000,
    mobile: false,
  };
  var tileDown = {
    distance: "40px",
    origin: "top",
    opacity: 0.0,
    duration: 1500,
    mobile: false,
    interval: 40,
  };

  ScrollReveal().reveal(".fmleft", slideLeft);
  ScrollReveal().reveal(".fmtop", slideDown);
  ScrollReveal().reveal(".fmbottom", slideUp);
  ScrollReveal().reveal(".fmright", slideRight);
  ScrollReveal().reveal(".tile", tileDown);
  ScrollReveal().reveal(".row-default", slideRight);
  ScrollReveal().reveal(".row-reverse", slideLeft);

  // Show the first tab and hide the rest
  $("#tabs-nav li:first-child").addClass("active");
  $(".tab-content").hide();
  $(".tab-content:first").show();

  // Click function
  $("#tabs-nav li").click(function () {
    $("#tabs-nav li").removeClass("active");
    $(this).addClass("active");
    $(".tab-content").hide();

    var activeTab = $(this).find("a").attr("href");
    $(activeTab).fadeIn();
    return false;
  });

  // NAV BAR

  $(".burger").click(function () {
    $(".mobile-header").toggleClass("is--active");
    $(".mobile-nav").toggleClass("is--active");
  });

  //==============BLOG READ MORE AJAX CALL

  var ppp = 6; // Post per page
  var pageNumber = 1;

  function load_posts() {
    pageNumber++;
    var str =
      "&pageNumber=" + pageNumber + "&ppp=" + ppp + "&action=more_post_ajax";
    $.ajax({
      type: "POST",
      dataType: "html",
      url: ajax_posts.ajaxurl,
      data: str,
      success: function (data) {
        var $data = $(data);
        if ($data.length) {
          $("#ajax-posts").append($data);
          //$("#more_posts").attr("disabled",false); // Uncomment this if you want to disable the button once all posts are loaded
          $("#more_posts").hide(); // This will hide the button once all posts have been loaded
        } else {
          $("#more_posts").attr("disabled", true);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
      },
    });
    return false;
  }

  $("#more_posts").on("click", function () {
    // When btn is pressed.
    $("#more_posts").attr("disabled", true); // Disable the button, temp.
    load_posts();
    $(this).insertAfter("#ajax-posts"); // Move the 'Load More' button to the end of the the newly added posts.
  });

  $(".hamburger-menu, .link").click(function () {
    $("body").hasClass("menu-open")
      ? $("body").removeClass("menu-open")
      : $("body").addClass("menu-open");
  });

  $(document).ready(function () {
    $(".footer-accordian--heading").click(function () {
      $(this).siblings(".footer-accordian--content").slideToggle();
      $(this).toggleClass("active");
    });
  });

  $(".toggle-block label").click(function () {
    var otherLabels = $(this).parent().siblings(".item").find("label");
    otherLabels.removeClass("collapsed");
    otherLabels.next().slideUp();
    $(this).toggleClass("collapsed");
    $(this).next().slideToggle();
  });

  $(".timeline-event__details .label").click(function () {
    var otherLabels = $(this)
      .parent()
      .siblings(".timeline-event__details")
      .find("label");
    otherLabels.removeClass("collapsed");
    otherLabels.next().slideUp();
    $(this).toggleClass("collapsed");
    $(this).next().slideToggle();
  });

  class StickyNavigation {
    constructor() {
      this.currentId = null;
      this.currentTab = null;
      this.tabContainerHeight = 70;
      if ($(".et-hero-tab").length > 0) {
        // Check if .et-hero-tab element exists
        this.bindEvents();
      }
    }

    bindEvents() {
      $(".et-hero-tab").on("click", (event) => this.onTabClick(event));
      $(window).on("scroll", () => this.onScroll());
      $(window).on("resize", () => this.onResize());
    }

    onTabClick(event) {
      event.preventDefault();
      const $clickedTab = $(event.currentTarget);
      const target = $clickedTab.attr("href");
      const scrollTop = $(target).offset().top - this.tabContainerHeight + 1;
      $("html, body").animate({ scrollTop }, 600);
      this.activateTab($clickedTab);
    }

    activateTab($tab) {
      $(".et-hero-tab").removeClass("active");
      $tab.addClass("active");
    }

    onScroll() {
      this.checkTabContainerPosition();
      this.findCurrentTabSelector();
    }

    onResize() {
      if (this.currentId) {
        this.setSliderCss();
      }
    }

    checkTabContainerPosition() {
      const offset =
        $(".et-hero-tabs").offset().top +
        $(".et-hero-tabs").height() -
        this.tabContainerHeight;
      const $tabsContainer = $(".et-hero-tabs-container");
      $tabsContainer.toggleClass(
        "et-hero-tabs-container--top",
        $(window).scrollTop() > offset
      );
    }

    findCurrentTabSelector() {
      const self = this;
      const $tabs = $(".et-hero-tab");
      $tabs.each(function () {
        const $tab = $(this);
        const id = $tab.attr("href");
        const offsetTop = $(id).offset().top - self.tabContainerHeight;
        const offsetBottom = offsetTop + $(id).height();
        if (
          $(window).scrollTop() > offsetTop &&
          $(window).scrollTop() < offsetBottom
        ) {
          if (self.currentId !== id || self.currentId === null) {
            self.currentId = id;
            self.currentTab = $tab;
            self.setSliderCss();
            self.activateTab($tab);
          }
          return false; // Exit the loop early if a match is found
        }
      });
    }

    setSliderCss() {
      const $slider = $(".et-hero-tab-slider");
      const width = this.currentTab ? this.currentTab.css("width") : 0;
      $slider.css("width", width);
    }
  }

  new StickyNavigation();

  // var containerEl = document.querySelector(".gallery-wrapper");
  // var mixer;

  // if (containerEl) {
  //   mixer = mixitup(containerEl, {
  //     // multifilter: {
  //     //   enable: true,
  //     // },
  //   });
  // }

  // Hide all tab content except the first one
  $(".tabgroup > div").hide();
  $(".tabgroup > div:first-of-type").show();

  // Handle tab click event
  $(".tabs a").click(function (e) {
    e.preventDefault();

    // Get the necessary elements
    var $this = $(this),
      tabgroup = "#" + $this.parents(".tabs").data("tabgroup"),
      target = $this.attr("href");

    // Update active classes
    $(".tabs a").removeClass("active");
    $this.addClass("active");

    // Hide all tab content and show the selected one
    $(tabgroup).children("div").hide();
    $(target).show();
  });
}); //Don't remove ---- end of jQuery wrapper

// ==============================
// Nav
// ========================================

const readMoreContainer = document.querySelector(".read-more");

if (readMoreContainer) {
  const readMoreLink = readMoreContainer.querySelector(".read-more-link");
  const paragraphs = readMoreContainer.querySelectorAll("p:not(:first-child)");

  if (paragraphs.length <= 1) {
    readMoreLink.style.display = "none";
  }

  readMoreLink.addEventListener("click", function (e) {
    e.preventDefault();

    readMoreContainer.classList.toggle("expanded");
    readMoreLink.textContent =
      readMoreLink.textContent === "Read More" ? "Read Less" : "Read More";
  });
}

// Get all the activity-trigger elements
var activityTriggers = document.querySelectorAll(".activity-trigger");

// Add a click event listener to each activity-trigger
activityTriggers.forEach(function (trigger) {
  trigger.addEventListener("click", function () {
    // Get the parent element (activity-item)
    var activityItem = this.closest(".activity-item");

    // Check if the clicked item is already active
    if (activityItem.classList.contains("active")) {
      // Close the active item by removing the 'active' class
      activityItem.classList.remove("active");
    } else {
      // Remove the 'active' class from all activity-items
      var activityItems = document.querySelectorAll(".activity-item");
      activityItems.forEach(function (item) {
        item.classList.remove("active");
      });

      // Add the 'active' class to the clicked activity-item
      activityItem.classList.add("active");
    }
  });
});

// document.getElementById("scrollButton").addEventListener("click", function () {
//   const windowHeight = window.innerHeight;
//   window.scrollTo({
//     top: windowHeight,
//     behavior: "smooth",
//   });
// });
