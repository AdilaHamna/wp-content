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

    ScrollTrigger.refresh();
  }

  // Initialize Motion on DOM ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initMotion);
  } else {
    initMotion();
  }

})();
