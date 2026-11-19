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

  // Copy to Clipboard buttons with robust HTTP & HTTPS fallback
  function copyTextToClipboard(text, btn) {
    var orig = btn.textContent;
    var setSuccess = function() {
      btn.textContent = "Copied";
      btn.classList.add("copied");
      setTimeout(function() {
        btn.textContent = orig;
        btn.classList.remove("copied");
      }, 1800);
    };

    if (navigator.clipboard && window.isSecureContext) {
      navigator.clipboard.writeText(text).then(setSuccess).catch(function() {
        fallbackCopy(text, setSuccess);
      });
    } else {
      fallbackCopy(text, setSuccess);
    }
  }

  function fallbackCopy(text, cb) {
    var ta = document.createElement("textarea");
    ta.value = text;
    ta.style.position = "fixed";
    ta.style.top = "0";
    ta.style.left = "-9999px";
    ta.style.opacity = "0";
    ta.setAttribute("readonly", "");
    document.body.appendChild(ta);
    ta.focus();
    ta.select();
    try {
      var successful = document.execCommand("copy");
      if (cb) cb();
    } catch(err) {
      if (cb) cb();
    }
    document.body.removeChild(ta);
  }

  document.querySelectorAll("[data-copy]").forEach(function(btn) {
    btn.addEventListener("click", function(e) {
      e.preventDefault();
      var text = btn.getAttribute("data-copy");
      if (text) {
        copyTextToClipboard(text, btn);
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

  // Sidebar Table of Contents (TOC) smooth scroll & heading visibility
  function initTocScroll() {
    var tocLinks = document.querySelectorAll(".toc a[href^='#']");
    if (!tocLinks.length) return;

    function getScrollOffset(targetEl) {
      var header = document.querySelector(".hdr");
      var headerH = header ? header.offsetHeight : 80;
      var adminBar = document.querySelector("#wpadminbar");
      var adminH = adminBar ? adminBar.offsetHeight : 0;
      var rect = targetEl.getBoundingClientRect();
      var targetTop = rect.top + (window.pageYOffset || document.documentElement.scrollTop || 0);
      // Offset so heading appears cleanly with generous breathing room below the fixed header
      return Math.max(0, targetTop - headerH - adminH - 32);
    }

    // Capture click before OceanWP or browser default
    document.addEventListener("click", function(e) {
      var anchor = e.target.closest(".toc a[href^='#']");
      if (!anchor) return;

      var hash = anchor.getAttribute("href");
      if (!hash || hash === "#") return;

      var targetEl = document.querySelector(hash);
      if (!targetEl) return;

      e.preventDefault();
      e.stopPropagation();

      var scrollPos = getScrollOffset(targetEl);

      window.scrollTo({
        top: scrollPos,
        behavior: "smooth"
      });

      var parentToc = anchor.closest(".toc");
      if (parentToc) {
        parentToc.querySelectorAll("a").forEach(function(a) { a.classList.remove("active"); });
        anchor.classList.add("active");
      }

      if (history.pushState) {
        history.pushState(null, null, hash);
      }
    }, true);

    // ScrollSpy: highlight active TOC item as user scrolls
    function updateTocActive() {
      var header = document.querySelector(".hdr");
      var headerH = (header ? header.offsetHeight : 80) + 40;
      var activeId = "";

      document.querySelectorAll(".dsec[id]").forEach(function(sec) {
        var rect = sec.getBoundingClientRect();
        if (rect.top <= headerH + 60 && rect.bottom > headerH) {
          activeId = sec.id;
        }
      });

      if (activeId) {
        tocLinks.forEach(function(a) {
          if (a.getAttribute("href") === "#" + activeId) {
            a.classList.add("active");
          } else {
            a.classList.remove("active");
          }
        });
      }
    }

    window.addEventListener("scroll", updateTocActive, { passive: true });
    updateTocActive();
  }

  initTocScroll();

  // Therapies Explorer Filtering (used on Home and Treatments Archive)
  function initTherapiesFilter() {
    var grid = document.getElementById("xgrid");
    var chips = document.querySelectorAll(".filters .chip");
    var countEl = document.getElementById("xcount");
    if (!grid || !chips.length || grid._filtersInitialized) return;
    grid._filtersInitialized = true;

    var cards = grid.querySelectorAll(".xcard");
    chips.forEach(function(chip) {
      chip.addEventListener("click", function(e) {
        e.preventDefault();
        var filter = chip.getAttribute("data-f");

        chips.forEach(function(c) {
          var isActive = (c === chip);
          c.setAttribute("aria-pressed", String(isActive));
          c.classList.toggle("active", isActive);
        });

        // Smoothly bring active chip into view inside scrollable track
        if (typeof chip.scrollIntoView === "function") {
          chip.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "center" });
        }

        var visibleCount = 0;
        var shownCards = [];
        cards.forEach(function(card) {
          var rawCats = card.getAttribute("data-cats") || "";
          var cats = rawCats.trim().split(/\s+/);
          var show = (filter === "all" || cats.indexOf(filter) > -1);
          card.hidden = !show;
          if (show) {
            visibleCount++;
            shownCards.push(card);
          }
        });

        if (countEl) {
          var labelSpan = chip.querySelector("span");
          var label = labelSpan ? labelSpan.textContent.trim().toLowerCase() : "";
          countEl.textContent = (filter === "all")
            ? "Showing all " + cards.length + " therapies."
            : "Showing " + visibleCount + " " + (visibleCount === 1 ? "therapy" : "therapies") + " for " + label + ".";
        }

        if (window.gsap && shownCards.length) {
          gsap.fromTo(shownCards,
            { opacity: 0, y: 15 },
            { opacity: 1, y: 0, duration: 0.35, stagger: 0.03, ease: "power2.out", overwrite: "auto" }
          );
        }

        if (window.ScrollTrigger) {
          ScrollTrigger.refresh();
        }
      });
    });

    // Support deep-linking via URL hash or query param (e.g. #f=panchakarma or ?filter=panchakarma)
    try {
      var initialFilter = "";
      if (window.location.hash && window.location.hash.indexOf("f=") > -1) {
        initialFilter = window.location.hash.split("f=")[1].split("&")[0];
      } else if (window.location.search) {
        var urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has("filter")) initialFilter = urlParams.get("filter");
      }
      if (initialFilter) {
        var targetChip = document.querySelector('.filters .chip[data-f="' + CSS.escape(initialFilter) + '"]');
        if (targetChip) {
          setTimeout(function() { targetChip.click(); }, 150);
        }
      }
    } catch (err) {}

    // Custom view dot
    if (window.matchMedia("(pointer: fine)").matches) {
      var dot = document.getElementById("cdot");
      if (dot) {
        grid.addEventListener("pointermove", function(e) {
          dot.style.transform = "translate(" + e.clientX + "px," + e.clientY + "px)";
        });
        grid.addEventListener("pointerover", function(e) {
          if (e.target.closest(".xcard")) dot.classList.add("on");
        });
        grid.addEventListener("pointerout", function(e) {
          if (!e.relatedTarget || !e.relatedTarget.closest || !e.relatedTarget.closest(".xcard")) {
            dot.classList.remove("on");
          }
        });
      }
    }
  }

  // Horizontal Drag & Wheel Scroll for .filters on all screens
  function initFiltersHorizontalScroll() {
    var filterContainers = document.querySelectorAll(".filters");
    filterContainers.forEach(function(slider) {
      if (slider._dragInit) return;
      slider._dragInit = true;

      // Mouse wheel horizontal translation on desktop
      slider.addEventListener("wheel", function(e) {
        if (slider.scrollWidth > slider.clientWidth) {
          if (Math.abs(e.deltaY) > Math.abs(e.deltaX) && !e.shiftKey) {
            slider.scrollLeft += e.deltaY;
            e.preventDefault();
          }
        }
      }, { passive: false });

      // Mouse click-and-drag horizontal scroll
      var isDown = false;
      var startX = 0;
      var scrollLeft = 0;
      var moved = false;

      slider.addEventListener("mousedown", function(e) {
        if (e.button !== 0) return;
        isDown = true;
        moved = false;
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
        slider.classList.add("is-dragging");
      });

      window.addEventListener("mouseup", function() {
        if (isDown) {
          isDown = false;
          slider.classList.remove("is-dragging");
        }
      });

      slider.addEventListener("mouseleave", function() {
        if (isDown) {
          isDown = false;
          slider.classList.remove("is-dragging");
        }
      });

      slider.addEventListener("mousemove", function(e) {
        if (!isDown) return;
        var x = e.pageX - slider.offsetLeft;
        var walk = (x - startX);
        if (Math.abs(walk) > 4) {
          moved = true;
        }
        slider.scrollLeft = scrollLeft - walk;
      });

      // Prevent accidental click during drag
      slider.addEventListener("click", function(e) {
        if (moved) {
          e.preventDefault();
          e.stopPropagation();
          moved = false;
        }
      }, true);
    });
  }

  window.initTherapiesFilter = initTherapiesFilter;
  initTherapiesFilter();
  initFiltersHorizontalScroll();
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", function() {
      initTherapiesFilter();
      initFiltersHorizontalScroll();
    });
  }

  // Page Transition Curtain (safe dismissal on load and back-forward cache restore)
  var cur = document.getElementById("curtain");
  if (cur) {
    function dismissCurtain() {
      cur.style.transition = "opacity 0.25s ease, transform 0.25s ease";
      cur.style.opacity = "0";
      cur.style.visibility = "hidden";
      cur.style.pointerEvents = "none";
      cur.style.transform = "translateY(100%)";
    }

    // Dismiss immediately on load, on back/forward cache restore (pageshow), and on pagehide
    dismissCurtain();
    window.addEventListener("pageshow", dismissCurtain);
    window.addEventListener("pagehide", dismissCurtain);
    window.addEventListener("popstate", dismissCurtain);

    try {
      sessionStorage.removeItem("kottakkal_curtain_entered");
    } catch (err) {}
  }

  // Editorial Parallax and Scroll Animations (GSAP + ScrollTrigger)
  function initMotion() {
    if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined") return;
    gsap.registerPlugin(ScrollTrigger);

    var reduce = window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    if (reduce) return;

    // Split words on elements with [data-split]
    function splitWords(el) {
      if (el._split) return;
      el._split = 1;
      var walk = function(node) {
        [].slice.call(node.childNodes).forEach(function(n) {
          if (n.nodeType === 3) {
            var frag = document.createDocumentFragment();
            n.textContent.split(/(\s+)/).forEach(function(w) {
              if (!w) return;
              if (/^\s+$/.test(w)) {
                frag.appendChild(document.createTextNode(" "));
                return;
              }
              var o = document.createElement("span");
              o.className = "wl";
              var i = document.createElement("span");
              i.className = "w";
              i.textContent = w;
              o.appendChild(i);
              frag.appendChild(o);
            });
            n.parentNode.replaceChild(frag, n);
          } else if (n.nodeType === 1) {
            walk(n);
          }
        });
      };
      walk(el);
    }

    document.querySelectorAll("[data-split]").forEach(function(el) {
      splitWords(el);
      gsap.fromTo(el.querySelectorAll(".w"), { yPercent: 115 }, {
        yPercent: 0,
        duration: 1.3,
        ease: "expo.out",
        stagger: 0.05,
        immediateRender: false,
        scrollTrigger: { trigger: el, start: "top bottom-=30", once: true }
      });
    });

    // Reveal Image with clipPath
    document.querySelectorAll('[data-reveal="img"]').forEach(function(el) {
      var art = el.querySelector(".art");
      gsap.fromTo(el, { clipPath: "inset(100% 0% 0% 0%)" }, {
        clipPath: "inset(0% 0% 0% 0%)",
        duration: 1.6,
        ease: "expo.inOut",
        immediateRender: false,
        scrollTrigger: { trigger: el, start: "top bottom-=10", once: true }
      });
      if (art) {
        gsap.fromTo(art, { scale: 1.25 }, {
          scale: 1,
          duration: 2.2,
          ease: "expo.out",
          immediateRender: false,
          scrollTrigger: { trigger: el, start: "top bottom-=10", once: true }
        });
      }
    });

    // Reveal elements fade-up
    document.querySelectorAll('[data-reveal="up"]').forEach(function(el) {
      gsap.fromTo(el, { y: 50, opacity: 0 }, {
        y: 0,
        opacity: 1,
        duration: 1.4,
        ease: "expo.out",
        immediateRender: false,
        scrollTrigger: { trigger: el, start: "top bottom-=20", once: true }
      });
    });

    // Stagger children
    document.querySelectorAll("[data-stagger]").forEach(function(el) {
      gsap.fromTo(el.children, { y: 30, opacity: 0 }, {
        y: 0,
        opacity: 1,
        duration: 1.2,
        ease: "expo.out",
        stagger: 0.09,
        immediateRender: false,
        scrollTrigger: { trigger: el, start: "top bottom-=20", once: true }
      });
    });

    // Parallax background elements [data-speed]
    document.querySelectorAll("[data-speed]").forEach(function(el) {
      var s = parseFloat(el.getAttribute("data-speed")) || 1;
      gsap.fromTo(el, { y: -60 * s }, {
        y: 60 * s,
        ease: "none",
        scrollTrigger: {
          trigger: el.parentElement,
          start: "top bottom",
          end: "bottom top",
          scrub: 0.6
        }
      });
    });

    // Bottom Scroll Animation: Footer watermark scrub parallax & light effect
    var foot = document.getElementById("foot");
    if (foot) {
      var wm = foot.querySelector(".wordmark");
      if (wm) {
        gsap.fromTo(wm, { yPercent: 40 }, {
          yPercent: 8,
          ease: "none",
          scrollTrigger: {
            trigger: foot,
            start: "top bottom",
            end: "bottom bottom",
            scrub: 0.6
          }
        });
      }
    }

    // Home intro section overlapping image scrub parallax
    var ig = document.querySelector(".intro-art .b");
    if (ig) {
      gsap.fromTo(ig, { y: 60 }, {
        y: -40,
        ease: "none",
        scrollTrigger: {
          trigger: ig.parentElement,
          start: "top bottom",
          end: "bottom top",
          scrub: 0.6
        }
      });
    }

    // Hero section scroll scrub
    var hero = document.querySelector(".hero");
    if (hero) {
      var heroIn = hero.querySelector(".hero-in");
      var heroCv = hero.querySelector("canvas");
      if (heroIn) {
        gsap.to(heroIn, {
          yPercent: -14,
          opacity: 0.15,
          ease: "none",
          scrollTrigger: {
            trigger: hero,
            start: "top top",
            end: "bottom top",
            scrub: true
          }
        });
      }
      if (heroCv) {
        gsap.to(heroCv, {
          yPercent: 16,
          ease: "none",
          scrollTrigger: {
            trigger: hero,
            start: "top top",
            end: "bottom top",
            scrub: true
          }
        });
      }
    }

    // Route path line draw animation
    var rp = document.getElementById("routePath");
    if (rp && rp.getTotalLength) {
      try {
        var L = rp.getTotalLength();
        gsap.fromTo(rp, { strokeDasharray: L + " " + L, strokeDashoffset: L }, {
          strokeDashoffset: 0,
          duration: 2.4,
          ease: "power2.inOut",
          immediateRender: false,
          scrollTrigger: { trigger: "#map", start: "top 85%", once: true },
          onComplete: function() {
            rp.setAttribute("stroke-dasharray", "6 8");
            rp.style.strokeDashoffset = "";
          }
        });
      } catch(e) {}
    }

    // Doctor Cards Scroll Animation
    var docCards = document.querySelectorAll(".docs .doc-reveal, .docfull.doc-reveal");
    if (docCards.length && typeof ScrollTrigger !== "undefined") {
      ScrollTrigger.batch(".docs .doc-reveal, .docfull.doc-reveal", {
        start: "top 85%",
        once: true,
        onEnter: function(batch) {
          batch.forEach(function(el) {
            el.classList.add("is-in-view");
          });
        }
      });
    }

    ScrollTrigger.refresh();
  }

  // IntersectionObserver for Doctor Cards Entrance
  function initDocScrollObserver() {
    var cards = document.querySelectorAll(".doc-reveal:not(.is-in-view)");
    if (!cards.length) return;

    if ("IntersectionObserver" in window) {
      var obs = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-in-view");
            obs.unobserve(entry.target);
          }
        });
      }, {
        threshold: 0.1,
        rootMargin: "0px 0px -40px 0px"
      });

      cards.forEach(function(card) {
        obs.observe(card);
      });
    } else {
      cards.forEach(function(card) {
        card.classList.add("is-in-view");
      });
    }
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initDocScrollObserver);
  } else {
    initDocScrollObserver();
  }

  // Care Pathways Accordion Panes Hover / Focus Interaction
  function initAccordionPanes() {
    var accordions = document.querySelectorAll(".acc, #acc");
    accordions.forEach(function(acc) {
      if (acc._accInitialized) return;
      acc._accInitialized = true;
      var panes = acc.querySelectorAll(".pane, [data-pane]");
      if (!panes.length) return;

      panes.forEach(function(pane) {
        pane.addEventListener("mouseenter", function() {
          panes.forEach(function(p) {
            p.classList.toggle("on", p === pane);
          });
        });
        pane.addEventListener("focus", function() {
          panes.forEach(function(p) {
            p.classList.toggle("on", p === pane);
          });
        });
        pane.addEventListener("click", function(e) {
          if (window.innerWidth > 860 && !pane.classList.contains("on")) {
            e.preventDefault();
            panes.forEach(function(p) {
              p.classList.toggle("on", p === pane);
            });
          }
        });
      });
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initAccordionPanes);
  } else {
    initAccordionPanes();
  }

  // Initialize Motion on DOM ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initMotion);
  } else {
    initMotion();
  }

})();
