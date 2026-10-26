/**
 * Kottakkal Theme - Home Page Interactive Scripts
 * Hero canvas animation, Explorer filters, Ritual scrollytelling, Accordion
 */

(function() {
  "use strict";

  // 1. Hero Canvas Particle & Light Pool Effect
  var cv = document.getElementById("gl");
  if (cv) {
    var ctx = cv.getContext("2d");
    if (ctx) {
      var W = 0, H = 0, dpr = 1, raf = 0;
      var size = function() {
        dpr = Math.min(window.devicePixelRatio || 1, 2);
        W = cv.clientWidth;
        H = cv.clientHeight;
        cv.width = Math.round(W * dpr);
        cv.height = Math.round(H * dpr);
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
      };
      size();
      window.addEventListener("resize", size);

      var motes = [];
      for (var i = 0; i < 28; i++) {
        motes.push({
          x: Math.random(),
          y: Math.random(),
          r: 0.6 + Math.random() * 1.6,
          s: 0.003 + Math.random() * 0.008,
          p: Math.random() * 6.28
        });
      }

      var draw = function() {
        ctx.clearRect(0, 0, W, H);
        var sx = W * (W < 760 ? 0.7 : 0.8), px = sx, py = H * 0.93;

        // Light Pool
        var g = ctx.createRadialGradient(px, py, 0, px, py, Math.max(W, H) * 0.55);
        g.addColorStop(0, "rgba(226, 182, 104, 0.16)");
        g.addColorStop(1, "rgba(226, 182, 104, 0)");
        ctx.fillStyle = g;
        ctx.fillRect(0, 0, W, H);

        // Motes
        motes.forEach(function(m) {
          m.y = (m.y - m.s) % 1;
          if (m.y < 0) m.y = 1;
          var x = m.x + Math.sin(m.p) * 0.01;
          ctx.fillStyle = "rgba(240, 214, 160, 0.35)";
          ctx.beginPath();
          ctx.arc(x * W, m.y * H, m.r, 0, Math.PI * 2);
          ctx.fill();
        });

        raf = requestAnimationFrame(draw);
      };
      draw();
    }
  }

  // 2. Therapies Explorer Filtering
  var grid = document.getElementById("xgrid");
  var chips = document.querySelectorAll(".filters .chip");
  var countEl = document.getElementById("xcount");
  if (grid && chips.length) {
    var cards = grid.querySelectorAll(".xcard");
    chips.forEach(function(chip) {
      chip.addEventListener("click", function(e) {
        e.preventDefault();
        var filter = chip.getAttribute("data-f");

        chips.forEach(function(c) {
          c.setAttribute("aria-pressed", String(c === chip));
          c.classList.toggle("active", c === chip);
        });

        var visibleCount = 0;
        cards.forEach(function(card) {
          var cats = (card.getAttribute("data-cats") || "").split(" ");
          var show = filter === "all" || cats.indexOf(filter) > -1;
          card.hidden = !show;
          if (show) visibleCount++;
        });

        if (countEl) {
          countEl.textContent = filter === "all"
            ? "Showing all " + cards.length + " therapies."
            : "Showing " + visibleCount + " " + (visibleCount === 1 ? "therapy" : "therapies") + " for " + chip.querySelector("span").textContent.toLowerCase() + ".";
        }
      });
    });

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

  // 3. Care Pathways Accordion Panes Hover / Focus
  var acc = document.getElementById("acc");
  if (acc) {
    var panes = acc.querySelectorAll(".pane");
    panes.forEach(function(pane) {
      pane.addEventListener("mouseenter", function() {
        panes.forEach(function(p) { p.classList.toggle("on", p === pane); });
      });
      pane.addEventListener("focus", function() {
        panes.forEach(function(p) { p.classList.toggle("on", p === pane); });
      });
    });
  }

  // 4. Ritual Scrollytelling
  var rvis = document.getElementById("rvis");
  var steps = document.querySelectorAll(".rstep");
  var prog = document.getElementById("rprog");
  if (rvis && steps.length) {
    var plates = rvis.querySelectorAll(".plate");
    var setStep = function(idx) {
      steps.forEach(function(s, k) { s.classList.toggle("on", k === idx); });
      plates.forEach(function(p, k) {
        p.classList.toggle("on", k === idx);
        p.classList.toggle("past", k < idx);
      });
      if (prog) prog.style.height = (((idx + 1) / steps.length) * 100) + "%";
    };

    if ("IntersectionObserver" in window) {
      var io = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            setStep(+entry.target.getAttribute("data-rs"));
          }
        });
      }, { rootMargin: "-45% 0px -45% 0px" });

      steps.forEach(function(step) { io.observe(step); });
    }
  }

  // 5. Statistics Number Countup
  var stats = document.querySelectorAll("[data-count]");
  if (stats.length && "IntersectionObserver" in window) {
    var statObs = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          var el = entry.target;
          var target = parseInt(el.getAttribute("data-count"), 10);
          var count = 0;
          var speed = 2000 / target;
          var timer = setInterval(function() {
            count++;
            el.textContent = count;
            if (count >= target) clearInterval(timer);
          }, Math.max(speed, 20));
          statObs.unobserve(el);
        }
      });
    }, { threshold: 0.5 });

    stats.forEach(function(stat) { statObs.observe(stat); });
  }

  // 6. Testimonial Slider / Carousel
  var car = document.getElementById("car");
  if (car) {
    var slides = car.querySelectorAll(".slide");
    var dots = car.querySelectorAll("[data-dot]");
    var current = 0;

    var showSlide = function(idx) {
      current = (idx + slides.length) % slides.length;
      slides.forEach(function(s, k) { s.classList.toggle("on", k === current); });
      dots.forEach(function(d, k) {
        if (k === current) d.setAttribute("aria-current", "true");
        else d.removeAttribute("aria-current");
      });
    };

    car.querySelectorAll("[data-c]").forEach(function(btn) {
      btn.addEventListener("click", function() {
        showSlide(current + parseInt(btn.getAttribute("data-c"), 10));
      });
    });

    dots.forEach(function(dot) {
      dot.addEventListener("click", function() {
        showSlide(parseInt(dot.getAttribute("data-dot"), 10));
      });
    });
  }

})();
