(function ($) {
  "use strict";

  $(document).ready(function () {
    var select = $("select[multiple]");
    var options = select.find("option");

    var div = $("<div />").addClass("selectMultiple");
    var active = $("<div />");
    var list = $("<ul />");
    var placeholder = select.data("placeholder");

    var span = $("<span />").text(placeholder).appendTo(active);

    options.each(function () {
      var text = $(this).text();
      if ($(this).is(":selected")) {
        active.append($("<a />").html("<em>" + text + "</em><i></i>"));
        span.addClass("hide");
      } else {
        list.append($("<li />").html(text));
      }
    });

    active.append($("<div />").addClass("arrow"));
    div.append(active).append(list);

    select.wrap(div);

    $(document).on("click", ".selectMultiple ul li", function (e) {
      var select = $(this).parent().parent();
      var li = $(this);
      if (!select.hasClass("clicked")) {
        select.addClass("clicked");
        li.prev().addClass("beforeRemove");
        li.next().addClass("afterRemove");
        li.addClass("remove");
        var a = $("<a />")
          .addClass("notShown")
          .html("<em>" + li.text() + "</em><i></i>")
          .hide()
          .appendTo(select.children("div"));
        a.slideDown(400, function () {
          setTimeout(function () {
            a.addClass("shown");
            select.children("div").children("span").addClass("hide");
            select
              .find("option:contains(" + li.text() + ")")
              .prop("selected", true);
          }, 500);
        });
        setTimeout(function () {
          if (li.prev().is(":last-child")) {
            li.prev().removeClass("beforeRemove");
          }
          if (li.next().is(":first-child")) {
            li.next().removeClass("afterRemove");
          }
          setTimeout(function () {
            li.prev().removeClass("beforeRemove");
            li.next().removeClass("afterRemove");
          }, 200);

          li.slideUp(400, function () {
            li.remove();
            select.removeClass("clicked");
          });
        }, 600);
      }
    });

    $(document).on("click", ".selectMultiple > div a", function (e) {
      var select = $(this).parent().parent();
      var self = $(this);
      self.removeClass().addClass("remove");
      select.addClass("open");
      setTimeout(function () {
        self.addClass("disappear");
        setTimeout(function () {
          self.animate(
            {
              width: 0,
              height: 0,
              padding: 0,
              margin: 0,
            },
            300,
            function () {
              var li = $("<li />")
                .text(self.children("em").text())
                .addClass("notShown")
                .appendTo(select.find("ul"));
              li.slideDown(400, function () {
                li.addClass("show");
                setTimeout(function () {
                  select
                    .find("option:contains(" + self.children("em").text() + ")")
                    .prop("selected", false);
                  if (!select.find("option:selected").length) {
                    select.children("div").children("span").removeClass("hide");
                  }
                  li.removeClass();
                }, 400);
              });
              self.remove();
            }
          );
        }, 300);
      }, 400);
    });

    $(document).on(
      "click",
      ".selectMultiple > div .arrow, .selectMultiple > div span",
      function (e) {
        $(this).parent().parent().toggleClass("open");
      }
    );

    $(document).on("click", function (e) {
      if (!$(e.target).closest(".selectMultiple").length) {
        $(".selectMultiple").removeClass("open");
      }
    });
  });
})(jQuery);


document.addEventListener("DOMContentLoaded", function () {
  var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

  if ("IntersectionObserver" in window) {
    let lazyImageObserver = new IntersectionObserver(function (entries, observer) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          let lazyImage = entry.target;
          lazyImage.src = lazyImage.dataset.src;
          lazyImage.srcset = lazyImage.dataset.srcset;
          lazyImage.classList.remove("lazy");
          lazyImageObserver.unobserve(lazyImage);
        }
      });
    });

    lazyImages.forEach(function (lazyImage) {
      lazyImageObserver.observe(lazyImage);
    });
  } else {
    // Possibly fall back to event handlers here
  }
});

document.addEventListener("DOMContentLoaded", function () {
  var lazyBackgrounds = [].slice.call(document.querySelectorAll("section.lazy-background"));

  if ("IntersectionObserver" in window) {
    let lazyBackgroundObserver = new IntersectionObserver(function (entries, observer) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {

          entry.target.classList.add("visible");
          lazyBackgroundObserver.unobserve(entry.target);

        }
      });
    });

    lazyBackgrounds.forEach(function (lazyBackground) {
      lazyBackgroundObserver.observe(lazyBackground);
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  var lazyvideo = [].slice.call(document.querySelectorAll("video.lazy-video"));

  if ("IntersectionObserver" in window) {

    let lazyVideoObserver = new IntersectionObserver(function (entries, observer) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {

          if (entry.target.querySelector('source').getAttribute('data-src') !== null) {
            const source = entry.target.querySelector('source').getAttribute('data-src')
            entry.target.setAttribute('src', source);
          }
          lazyVideoObserver.unobserve(entry.target);

        }
      });
    });

    lazyvideo.forEach(function (video) {
      lazyVideoObserver.observe(video);
    });
  }
});

!function (e) { e.extend({ uploadPreview: function (l) { var i = e.extend({ input_field: ".image-input", preview_box: ".image-preview", label_field: ".image-label", label_default: "Choose File", label_selected: "Change File", no_label: !1, success_callback: null }, l); return window.File && window.FileList && window.FileReader ? void (void 0 !== e(i.input_field) && null !== e(i.input_field) && e(i.input_field).change(function () { var l = this.files; if (l.length > 0) { var a = l[0], o = new FileReader; o.addEventListener("load", function (l) { var o = l.target; a.type.match("image") ? (e(i.preview_box).css("background-image", "url(" + o.result + ")"), e(i.preview_box).css("background-size", "cover"), e(i.preview_box).css("background-position", "center center")) : a.type.match("audio") ? e(i.preview_box).html("<audio controls><source src='" + o.result + "' type='" + a.type + "' />Your browser does not support the audio element.</audio>") : alert("This file type is not supported yet.") }), 0 == i.no_label && e(i.label_field).html(i.label_selected), o.readAsDataURL(a), i.success_callback && i.success_callback() } else 0 == i.no_label && e(i.label_field).html(i.label_default), e(i.preview_box).css("background-image", "none"), e(i.preview_box + " audio").remove() })) : (alert("You need a browser with file reader support, to use this form properly."), !1) } }) }(jQuery);