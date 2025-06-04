var mainHeader, hero, moreText, desktopLogo, isMobile;
var togglePosition = 0;

jQuery(document).ready(function () {
  mainHeader = jQuery(".main-header");
  hero = jQuery(".hero");
  moreText = jQuery(".more-text");
  isMobile = window.innerWidth < 992;
  startOwlSlider();
  setHamburgerOnClick();
  setOpenOverlay();
  setOpenQuestions();
  // setToggleLightbox();
  setScrollTOWoningen();
  // wrapIframe();

  // replaceImgWithSvg();
  // setAlignInATag();
  // setOnSearch();
  // squareAspectRatio();
  // responsiveLogoSwitch();
});
jQuery(window).scroll(function () {
  // hideOnScroll();
});
// jQuery(window).resize(function () {
//   squareAspectRatio();
//   isMobile = window.innerWidth < 992;
// });

function setOpenOverlay() {
  jQuery(".overlayTrigger").on("click", function (e) {
    e.preventDefault();
    jQuery(this).find(".overlay").fadeIn();
  });
  jQuery(".overlay").on("click", function (e) {
    e.stopPropagation();
    jQuery(this).fadeOut();
  });
}

function setOpenQuestions() {
  jQuery(".question-container").click(function () {
    jQuery(this).toggleClass("open");
    console.log("hi!");
  });
}

function setHamburgerOnClick() {
  var $mobileMenu = jQuery(".mobile-menu");
  var $body = jQuery("body");

  jQuery(".hamburger").on("click", function () {
    jQuery(this).toggleClass("is-active");
    $mobileMenu.toggleClass("is-active");
    $body.toggleClass("menu-open");

    $body.on("touchmove", function (e) {
      if ($body.hasClass("menu-open")) {
        e.preventDefault();
      }
    });
  });
}
function hideOnScroll() {
  var currentScrollTop = jQuery(window).scrollTop();
  if (togglePosition < currentScrollTop && togglePosition > 180 && !isMobile) {
    mainHeader.addClass("hide");
  } else {
    mainHeader.removeClass("hide");
  }
  togglePosition = currentScrollTop;
}
function startOwlSlider() {
  jQuery(".owl-carousel").owlCarousel({
    dots: false,
    nav: true,
    margin: 12,
    loop: true,
    autoplay: true,
    autoplayHoverPause: false,
    // autoHeight: true,
    navText: [
      '<div class="button"><i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i></div>',
      '<div class="button"><i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i></div>',
    ],
    responsive: {
      0: {
        items: 1,
        stagePadding: 32,
      },
      768: {
        items: 1,
      },
      1199: {
        items: 1,
      },
    },
  });
}

function setScrollTOWoningen() {
  jQuery("#menu-item-274").click(function (e) {
    e.preventDefault();
    console.log("button gedrukt");
    const baseUrl = window.location.origin;
    window.location.href = baseUrl + "#woningen-scroll";
  });
}

// function setAlignInATag() {

//   jQuery("img[class*=align]").each(function (i, e) {
//     jQuery(e).parents("a").addClass(jQuery(e).attr("class"));
//   });
// }

// function setOnRecordView() {
//   inView(".should-animate").on("enter", function (element) {
//     jQuery(element)
//       .addClass("animate__animated")
//       .removeClass("remove__animate");
//   });
// }

// function _fetch(options) {
//   return jQuery.ajax({
//     url: ajaxurl,
//     dataType: "json",
//     data: options,
//     method: "POST",
//   });
// }

// function replaceImgWithSvg() {
//   jQuery("img.svg").each(function () {
//     var $img = jQuery(this);
//     var imgID = $img.attr("id");
//     var imgClass = $img.attr("class");
//     var imgURL = $img.attr("src");
//     jQuery.get(
//       imgURL,
//       function (data) {
//         var $svg = jQuery(data).find("svg");
//         if (typeof imgID !== "undefined") {
//           $svg = $svg.attr("id", imgID);
//         }
//         if (typeof imgClass !== "undefined") {
//           $svg = $svg.attr("class", imgClass + " replaced-svg");
//         }
//         $svg = $svg.removeAttr("xmlns:a");
//         if (
//           !$svg.attr("viewBox") &&
//           $svg.attr("height") &&
//           $svg.attr("width")
//         ) {
//           $svg.attr(
//             "viewBox",
//             "0 0 " + $svg.attr("height") + " " + $svg.attr("width")
//           );
//         }
//         $img.replaceWith($svg);
//       },
//       "xml"
//     );
//   });
// }

// function squareAspectRatio() {
//   jQuery(".square").each(function () {
//     var width = jQuery(this).width();
//     jQuery(this).css("height", width);
//   });
// }

// function wrapIframe() {
//   jQuery(".page-content iframe").wrap("<div class='embed-container'></div>");
// }

// function setOnSearch() {
//   jQuery(".launch-search, .btn-search-close").on("click", function (e) {
//     e.preventDefault();
//     jQuery(".search-screen").toggleClass("active");
//   });
// }
