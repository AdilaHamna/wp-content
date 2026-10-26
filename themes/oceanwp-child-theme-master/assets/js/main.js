/**
 * Kottakkal Theme - Main JavaScript
 * Interactions, Mega Menu, Mobile Drawer, Clipboard, Scrollytelling
 */

(function() {
  "use strict";

  // Elements
  var hdr = document.getElementById("hdr");
  var nav = document.getElementById("nav");
  var ind = document.getElementById("navInd");
  var megaBtn = document.getElementById("megaBtn");
  var mega = document.getElementById("mega");
  var mm = document.getElementById("mmenu");
  var menuBtn = document.getElementById("menuBtn");
  var menuX = document.getElementById("menuX");

  // Nav indicator motion
  function moveInd(target) {
    if (!ind || !nav) return;
    var el = target || nav.querySelector('[aria-current="page"], .active, [data-current]');
    if (!el || !nav.offsetParent) {
      ind.style.opacity = 0;
      return;
    }
    var r = el.getBoundingClientRect();
    var nr = nav.getBoundingClientRect();
    ind.style.opacity = 1;
    ind.style.width = Math.max(0, r.width - 28) + "px";
    ind.style.transform = "translateX(" + (r.left - nr.left + 14) + "px)";
  }

  if (nav) {
    nav.addEventListener("mouseover", function(e) {
      var a = e.target.closest("a, button");
      if (a) moveInd(a);
    });
    nav.addEventListener("mouseleave", function() {
      moveInd();
    });
    window.addEventListener("resize", function() {
      moveInd();
    });
    setTimeout(function() {
      moveInd();
    }, 200);
  }

  // Header Scroll State
  var isHome = document.body.classList.contains("home") || location.pathname === "/" || location.pathname.indexOf("home") > -1;
  function onScroll() {
    if (!hdr) return;
    var y = window.scrollY || window.pageYOffset || 0;
    var isMegaOpen = mega && mega.classList.contains("open");
    var over = isHome && y < 80 && !isMegaOpen;
    hdr.classList.toggle("over", over);
    hdr.classList.toggle("solid", !over);
  }

  window.addEventListener("scroll", onScroll, { passive: true });
  onScroll();

  // Mega Menu Toggle
  function openMega(open) {
    if (!mega || !megaBtn) return;
    mega.classList.toggle("open", open);
    megaBtn.setAttribute("aria-expanded", String(open));
    onScroll();
  }

  if (megaBtn) {
    megaBtn.addEventListener("click", function(e) {
      e.preventDefault();
      var o = !mega.classList.contains("open");
      openMega(o);
    });

    if (hdr) {
      hdr.addEventListener("mouseleave", function() {
        if (window.matchMedia("(pointer: fine)").matches && mega.classList.contains("open")) {
          openMega(false);
        }
      });
    }

    document.addEventListener("click", function(e) {
      if (mega && mega.classList.contains("open") && !e.target.closest("#mega") && !e.target.closest("#megaBtn")) {
        openMega(false);
      }
    });
  }

  // Mega Menu Hover Preview
  if (mega) {
    var megaLinks = mega.querySelectorAll("[data-mp]");
    var megaPrev = document.getElementById("megaPrev");
    megaLinks.forEach(function(link) {
      link.addEventListener("mouseenter", function() {
        var name = link.getAttribute("data-title") || link.textContent;
        var desc = link.getAttribute("data-desc") || "";
        var img = link.getAttribute("data-img") || "";
        if (megaPrev) {
          var imgHtml = img ? '<img src="' + img + '" alt="" loading="lazy">' : '';
          megaPrev.innerHTML = '<div class="plate p-oil" style="aspect-ratio:4/5"><div class="art">' + imgHtml + '</div></div><p><b style="font:400 1.3rem/1.2 var(--display);color:var(--heading);display:block;margin-top:12px">' + name + '</b>' + desc + '</p>';
        }
      });
    });
  }

  // Mobile Menu Drawer
  if (menuBtn && mm) {
    menuBtn.addEventListener("click", function() {
      mm.classList.add("open");
      menuBtn.setAttribute("aria-expanded", "true");
      document.body.style.overflow = "hidden";
    });

    if (menuX) {
      menuX.addEventListener("click", function() {
        mm.classList.remove("open");
        menuBtn.setAttribute("aria-expanded", "false");
        document.body.style.overflow = "";
      });
    }

    document.addEventListener("keydown", function(e) {
      if (e.key === "Escape") {
        if (mega && mega.classList.contains("open")) openMega(false);
        if (mm && mm.classList.contains("open")) {
          mm.classList.remove("open");
          menuBtn.setAttribute("aria-expanded", "false");
          document.body.style.overflow = "";
        }
      }
    });
  }

  // Copy to Clipboard buttons
  document.querySelectorAll("[data-copy]").forEach(function(btn) {
    btn.addEventListener("click", function() {
      var text = btn.getAttribute("data-copy");
      if (text) {
        var orig = btn.textContent;
        try {
          navigator.clipboard.writeText(text).then(function() {
            btn.textContent = "Copied!";
            setTimeout(function() { btn.textContent = orig; }, 1800);
          });
        } catch(e) {
          btn.textContent = "Copied!";
          setTimeout(function() { btn.textContent = orig; }, 1800);
        }
      }
    });
  });

  // Magnetic Button Hover Physics
  if (window.matchMedia("(pointer: fine)").matches) {
    document.querySelectorAll(".mag").forEach(function(b) {
      b.addEventListener("pointermove", function(e) {
        var r = b.getBoundingClientRect();
        var x = (e.clientX - r.left - r.width / 2) * 0.2;
        var y = (e.clientY - r.top - r.height / 2) * 0.28;
        b.style.transform = "translate(" + x.toFixed(1) + "px," + y.toFixed(1) + "px)";
      });
      b.addEventListener("pointerleave", function() {
        b.style.transform = "";
      });
    });
  }

})();
