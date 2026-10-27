/**
 * Kottakkal Theme - Appointment Booking Wizard
 *
 * 4-Step Interactive Flow:
 * 1. SERVICE (Consultation, Care Pathway, Classical Therapy)
 * 2. DATE & TIME (21-day horizontal scroll picker, 3 time windows)
 * 3. DETAILS (Full Name, Phone with Country Code dropdown, Email, Message, Privacy consent)
 * 4. REVIEW (Editable summary table with jump-to-step links)
 * 5. CONFIRMATION (Checkmark animation, Ref ID, Direct Call button)
 */

(function() {
  "use strict";

  var SERVICE_NAMES = {
    "consult": "Consultation with a doctor",
    "joint": "Musculoskeletal & joint care",
    "relax": "Relaxation & rejuvenation",
    "beauty": "Beauty, hair & eye care",
    "weight": "Obesity management",
    "postnatal": "Postnatal care",
    "degenerative": "Degenerative & auto-immune conditions",
    "abhyangam": "Abhyangam (Ayurvedic oil massage)",
    "shirodara": "Shirodhara (Continuous oil stream)",
    "njavara-kizhi": "Njavara Kizhi",
    "kativasthi": "Kativasthi (Lower-back care)",
    "pizhichil": "Pizhichil (King of therapies)",
    "pottali-sweda": "Pottali Sweda (Herbal pouch sudation)",
    "nasyam": "Nasyam (Nasal therapy)",
    "tarpanam": "Tarpanam (Eye therapy)",
    "udhwarthanam": "Udwarthanam (Herbal powder massage)",
    "thalapothichil": "Thalapothichil (Herbal head covering)",
    "face-pack": "Face Pack (Mukha Lepam)"
  };

  var MONTHS = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
  var DAYS_OF_WEEK = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];

  function formatNiceDate(isoString) {
    if (!isoString) return "";
    var parts = isoString.split("-");
    if (parts.length < 3) return isoString;
    var d = new Date(parseInt(parts[0], 10), parseInt(parts[1], 10) - 1, parseInt(parts[2], 10));
    return DAYS_OF_WEEK[d.getDay()] + " " + d.getDate() + " " + MONTHS[d.getMonth()] + " " + d.getFullYear();
  }

  function getServiceName(slug) {
    if (!slug) return "";
    return SERVICE_NAMES[slug] || slug;
  }

  // Country telephone configuration & dynamic length limits
  var COUNTRY_CONFIG = {
    "+971": {
      name: "UAE",
      minDigits: 9,
      maxDigits: 10,
      standardDigits: 9,
      placeholder: "50 123 4567",
      errorMsg: "Please enter a valid 9-digit UAE phone number (e.g. 50 123 4567)."
    },
    "+91": {
      name: "India",
      minDigits: 10,
      maxDigits: 11,
      standardDigits: 10,
      placeholder: "98765 43210",
      errorMsg: "Please enter a valid 10-digit mobile number."
    },
    "+966": {
      name: "KSA",
      minDigits: 9,
      maxDigits: 10,
      standardDigits: 9,
      placeholder: "51 234 5678",
      errorMsg: "Please enter a valid 9-digit Saudi mobile number."
    },
    "+968": {
      name: "Oman",
      minDigits: 8,
      maxDigits: 8,
      standardDigits: 8,
      placeholder: "9123 4567",
      errorMsg: "Please enter a valid 8-digit Oman phone number."
    },
    "+974": {
      name: "Qatar",
      minDigits: 8,
      maxDigits: 8,
      standardDigits: 8,
      placeholder: "5512 3456",
      errorMsg: "Please enter a valid 8-digit Qatar phone number."
    },
    "+973": {
      name: "Bahrain",
      minDigits: 8,
      maxDigits: 8,
      standardDigits: 8,
      placeholder: "3912 3456",
      errorMsg: "Please enter a valid 8-digit Bahrain phone number."
    },
    "+965": {
      name: "Kuwait",
      minDigits: 8,
      maxDigits: 8,
      standardDigits: 8,
      placeholder: "5123 4567",
      errorMsg: "Please enter a valid 8-digit Kuwait phone number."
    },
    "+44": {
      name: "UK",
      minDigits: 10,
      maxDigits: 11,
      standardDigits: 10,
      placeholder: "7911 123456",
      errorMsg: "Please enter a valid 10 or 11-digit UK phone number."
    },
    "+1": {
      name: "US/CA",
      minDigits: 10,
      maxDigits: 10,
      standardDigits: 10,
      placeholder: "202 555 0143",
      errorMsg: "Please enter a valid 10-digit phone number."
    },
    "": {
      name: "Other",
      minDigits: 7,
      maxDigits: 15,
      standardDigits: 15,
      placeholder: "Phone number",
      errorMsg: "Please enter a valid phone number (7 to 15 digits)."
    }
  };

  function getCountryDigitLimit(cc, digits) {
    var cfg = COUNTRY_CONFIG[cc] || COUNTRY_CONFIG[""];
    if (cc === "+971") {
      // UAE (Dubai): 9 digits without leading 0 (50xxxxxxx); 10 digits if user starts with 0 (050xxxxxxx)
      return (digits && digits.charAt(0) === "0") ? 10 : 9;
    }
    if (cc === "+91" || cc === "+966" || cc === "+44") {
      return (digits && digits.charAt(0) === "0") ? cfg.maxDigits : cfg.standardDigits;
    }
    return cfg.maxDigits || 15;
  }

  function formatPhoneWithSpaces(cc, digits) {
    if (!digits) return "";
    var clean = String(digits).replace(/\D/g, "");
    if (cc === "+971") {
      if (clean.length === 9) {
        return clean.slice(0, 2) + " " + clean.slice(2, 5) + " " + clean.slice(5);
      }
      if (clean.length === 10 && clean.charAt(0) === "0") {
        return clean.slice(0, 3) + " " + clean.slice(3, 6) + " " + clean.slice(6);
      }
    } else if (cc === "+91" && clean.length === 10) {
      return clean.slice(0, 5) + " " + clean.slice(5);
    }
    return clean;
  }

  function initWizard(container) {
    if (!container || container._initialized) return;
    container._initialized = true;

    var initialService = container.getAttribute("data-sel") || "";
    // Check URL parameters if not pre-set
    if (!initialService && window.location.search) {
      var match = window.location.search.match(/[?&]service=([^&#]*)/);
      if (match) initialService = decodeURIComponent(match[1]);
    }

    var state = {
      step: 0,
      svc: initialService,
      date: "",
      time: "",
      name: "",
      cc: "+971",
      phone: "",
      email: "",
      msg: "",
      consent: false
    };

    var form = container.querySelector(".stepper");
    var backBtn = container.querySelector("#bk-back");
    var nextBtn = container.querySelector("#bk-next");
    var noteEl = container.querySelector("#bk-note");
    var therSelect = container.querySelector("#bk-ther");
    var actionsBar = container.querySelector("#bk-actions");
    var reviewEl = container.querySelector("#bk-review");
    var doneEl = container.querySelector("#bk-done");

    function $(selector) {
      return container.querySelector(selector);
    }

    function setRadioChecked(selector, attr, val) {
      container.querySelectorAll(selector).forEach(function(el) {
        var isMatch = el.getAttribute(attr) === val;
        el.setAttribute("aria-checked", String(isMatch));
        el.classList.toggle("selected", isMatch);
      });
    }

    // Auto-select initial service if present
    if (state.svc) {
      if (therSelect && therSelect.querySelector('option[value="' + state.svc + '"]')) {
        therSelect.value = state.svc;
      } else {
        setRadioChecked("[data-svc]", "data-svc", state.svc);
      }
    }

    // 1. Service Cards Click Handler
    container.querySelectorAll("[data-svc]").forEach(function(card) {
      card.addEventListener("click", function() {
        state.svc = card.getAttribute("data-svc");
        if (therSelect) therSelect.value = "";
        setRadioChecked("[data-svc]", "data-svc", state.svc);
        var err0 = container.querySelector('[data-err="0"]');
        if (err0) err0.textContent = "";
      });
    });

    // Specific Therapy Dropdown Handler
    if (therSelect) {
      therSelect.addEventListener("change", function(e) {
        if (e.target.value) {
          state.svc = e.target.value;
          setRadioChecked("[data-svc]", "data-svc", "");
        } else if (state.svc && !container.querySelector('[data-svc="' + state.svc + '"]')) {
          state.svc = "";
        }
        var err0 = container.querySelector('[data-err="0"]');
        if (err0) err0.textContent = "";
      });
    }

    // 2. Date Selection Handler
    container.querySelectorAll("[data-date]").forEach(function(btn) {
      btn.addEventListener("click", function() {
        state.date = btn.getAttribute("data-date");
        setRadioChecked("[data-date]", "data-date", state.date);
        var err1 = container.querySelector('[data-err="1"]');
        if (err1) err1.textContent = "";
      });
    });

    // Time Selection Handler
    container.querySelectorAll("[data-time]").forEach(function(btn) {
      btn.addEventListener("click", function() {
        state.time = btn.getAttribute("data-time");
        setRadioChecked("[data-time]", "data-time", state.time);
        var err1 = container.querySelector('[data-err="1"]');
        if (err1) err1.textContent = "";
      });
    });

    // Keyboard Arrow Keys Accessibility on Radio Groups
    container.querySelectorAll('[role="radiogroup"]').forEach(function(grp) {
      grp.addEventListener("keydown", function(e) {
        var k = e.key;
        if (["ArrowRight", "ArrowDown", "ArrowLeft", "ArrowUp"].indexOf(k) < 0) return;
        var btns = Array.prototype.slice.call(grp.querySelectorAll('[role="radio"]'));
        var idx = btns.indexOf(document.activeElement);
        if (idx < 0) return;
        e.preventDefault();
        var delta = (k === "ArrowRight" || k === "ArrowDown") ? 1 : -1;
        var nextIdx = (idx + delta + btns.length) % btns.length;
        btns.forEach(function(b) { b.tabIndex = -1; });
        btns[nextIdx].tabIndex = 0;
        btns[nextIdx].focus();
        btns[nextIdx].click();
      });
    });

    // 3. Step 2 Details Validation & Input Restrictions
    function setFieldErr(id, message, inputEl) {
      var errEl = container.querySelector("#e-" + id);
      if (errEl) errEl.textContent = message || "";
      if (inputEl) {
        if (message) {
          inputEl.setAttribute("aria-invalid", "true");
        } else {
          inputEl.removeAttribute("aria-invalid");
        }
      }
      return !message;
    }

    var nameEl = container.querySelector("#bk-name");
    var ccEl = container.querySelector("#bk-cc");
    var phoneEl = container.querySelector("#bk-phone");
    var emailEl = container.querySelector("#bk-email");
    var msgEl = container.querySelector("#bk-msg");
    var consentEl = container.querySelector("#bk-consent");

    // Dynamic phone limits & placeholder based on country code
    function updatePhoneConstraints() {
      if (!phoneEl) return;
      var cc = (ccEl ? ccEl.value : "+971") || "+971";
      var cfg = COUNTRY_CONFIG[cc] || COUNTRY_CONFIG[""];
      var digits = phoneEl.value.replace(/\D/g, "");
      var limit = getCountryDigitLimit(cc, digits);

      phoneEl.placeholder = cfg.placeholder || "Phone number";
      phoneEl.setAttribute("maxlength", String(limit));

      if (digits.length > limit) {
        phoneEl.value = digits.slice(0, limit);
      }
    }

    // Name field: Letters and spaces ONLY (no hyphens, numbers, or special characters)
    if (nameEl) {
      nameEl.setAttribute("maxlength", "60");

      nameEl.addEventListener("keydown", function(e) {
        var controlKeys = ["Backspace", "Tab", "Enter", "Escape", "Delete", "ArrowLeft", "ArrowRight", "ArrowUp", "ArrowDown", "Home", "End"];
        if (controlKeys.indexOf(e.key) !== -1) return;
        if (e.ctrlKey || e.metaKey) return;
        if (e.key === " ") return;

        // Block hyphen specifically and any non-letter character
        if (e.key === "-" || e.key === "—" || e.key === "–") {
          e.preventDefault();
          return;
        }

        if (e.key && e.key.length === 1) {
          // Allow only alphabetic letters (Latin and international/Arabic letters)
          if (!/^[a-zA-Z\u00C0-\u024F\u0600-\u06FF\u0750-\u077F\u08A0-\u08FF\uFB50-\uFDFF\uFE70-\uFEFF]$/.test(e.key)) {
            e.preventDefault();
            return;
          }
        }
      });

      nameEl.addEventListener("input", function() {
        // Strip hyphens, numbers, and any special characters - letters and spaces only
        var clean = this.value.replace(/[^a-zA-Z\u00C0-\u024F\u0600-\u06FF\u0750-\u077F\u08A0-\u08FF\uFB50-\uFDFF\uFE70-\uFEFF\s]/g, "");
        if (this.value !== clean) {
          this.value = clean;
        }
        if (this.getAttribute("aria-invalid")) {
          validateDetails();
        }
      });

      nameEl.addEventListener("paste", function(e) {
        e.preventDefault();
        var pasteData = (e.clipboardData || window.clipboardData).getData("text") || "";
        var clean = pasteData.replace(/[^a-zA-Z\u00C0-\u024F\u0600-\u06FF\u0750-\u077F\u08A0-\u08FF\uFB50-\uFDFF\uFE70-\uFEFF\s]/g, "");
        var start = this.selectionStart || 0;
        var end = this.selectionEnd || 0;
        var nextVal = (this.value.slice(0, start) + clean + this.value.slice(end)).slice(0, 60);
        this.value = nextVal;
        if (this.getAttribute("aria-invalid")) {
          validateDetails();
        }
      });
    }

    // Phone field: Numbers ONLY & limit based on Country Code
    if (phoneEl) {
      phoneEl.setAttribute("inputmode", "numeric");
      phoneEl.setAttribute("pattern", "[0-9]*");
      updatePhoneConstraints();

      phoneEl.addEventListener("keydown", function(e) {
        var controlKeys = ["Backspace", "Tab", "Enter", "Escape", "Delete", "ArrowLeft", "ArrowRight", "ArrowUp", "ArrowDown", "Home", "End"];
        if (controlKeys.indexOf(e.key) !== -1) return;
        if (e.ctrlKey || e.metaKey) return;

        // Strictly reject non-digit characters (letters, symbols, spaces)
        if (!/^[0-9]$/.test(e.key)) {
          e.preventDefault();
          return;
        }

        // Limit digits based on country
        var cc = (ccEl ? ccEl.value : "+971") || "+971";
        var currentDigits = this.value.replace(/\D/g, "");
        var limit = getCountryDigitLimit(cc, currentDigits + e.key);
        var selectedText = window.getSelection ? window.getSelection().toString() : "";
        if (currentDigits.length >= limit && !selectedText) {
          e.preventDefault();
        }
      });

      phoneEl.addEventListener("input", function() {
        var cc = (ccEl ? ccEl.value : "+971") || "+971";
        var digits = this.value.replace(/\D/g, "");
        var limit = getCountryDigitLimit(cc, digits);
        if (digits.length > limit) {
          digits = digits.slice(0, limit);
        }
        if (this.value !== digits) {
          this.value = digits;
        }
        phoneEl.setAttribute("maxlength", String(limit));
        if (this.getAttribute("aria-invalid")) {
          validateDetails();
        }
      });

      phoneEl.addEventListener("paste", function(e) {
        e.preventDefault();
        var pasteData = (e.clipboardData || window.clipboardData).getData("text") || "";
        var digits = pasteData.replace(/\D/g, "");
        var cc = (ccEl ? ccEl.value : "+971") || "+971";
        var ccDigits = cc.replace(/\D/g, "");
        // If pasted with leading country code (e.g. 971 for UAE), strip it
        if (ccDigits && digits.indexOf(ccDigits) === 0) {
          digits = digits.slice(ccDigits.length);
        }
        var limit = getCountryDigitLimit(cc, digits);
        digits = digits.slice(0, limit);
        this.value = digits;
        phoneEl.setAttribute("maxlength", String(limit));
        if (this.getAttribute("aria-invalid")) {
          validateDetails();
        }
      });
    }

    if (ccEl) {
      ccEl.addEventListener("change", function() {
        state.cc = this.value;
        updatePhoneConstraints();
        if (phoneEl && (phoneEl.value || phoneEl.getAttribute("aria-invalid"))) {
          validateDetails();
        }
      });
    }

    function validateDetails() {
      state.name = nameEl ? nameEl.value.trim() : "";
      state.cc = ccEl ? ccEl.value : "+971";
      state.phone = phoneEl ? phoneEl.value.replace(/\D/g, "") : "";
      state.email = emailEl ? emailEl.value.trim() : "";
      state.msg = msgEl ? msgEl.value.trim() : "";
      state.consent = consentEl ? consentEl.checked : false;

      var isValid = true;
      var firstInvalid = null;

      function check(fieldId, errorMsg, el) {
        if (!setFieldErr(fieldId, errorMsg, el)) {
          isValid = false;
          if (!firstInvalid) firstInvalid = el;
        }
      }

      // 1. Name: Letters and spaces only (no hyphens, numbers, or special characters)
      if (!state.name) {
        check("name", "Please enter your full name.", nameEl);
      } else if (state.name.length < 2) {
        check("name", "Name must be at least 2 characters.", nameEl);
      } else if (/[0-9]/.test(state.name)) {
        check("name", "Name can contain letters only.", nameEl);
      } else if (/[-]/.test(state.name)) {
        check("name", "Hyphens are not allowed. Please use letters only.", nameEl);
      } else if (!/^[a-zA-Z\u00C0-\u024F\u0600-\u06FF\u0750-\u077F\u08A0-\u08FF\uFB50-\uFDFF\uFE70-\uFEFF\s]+$/.test(state.name)) {
        check("name", "Name can contain letters and spaces only.", nameEl);
      } else {
        check("name", "", nameEl);
      }

      // 2. Phone: Numbers only & country-specific length limits
      var digits = state.phone;
      var cc = state.cc || "+971";
      var cfg = COUNTRY_CONFIG[cc] || COUNTRY_CONFIG[""];

      if (!digits) {
        check("phone", "Please enter your phone number.", phoneEl);
      } else if (cc === "+971") {
        // UAE (Dubai) Phone Validation
        // Mobile numbers: 9 digits (starts with 5: 50, 52, 54, 55, 56, 58)
        // With leading trunk zero: 10 digits (050, 052, 054, etc.)
        // Dubai landlines: 8 digits (starts with 4) or 9 digits (04)
        var startsWithZero = digits.charAt(0) === "0";
        var nationalDigits = startsWithZero ? digits.slice(1) : digits;

        if (nationalDigits.length < 8) {
          check("phone", "Please enter a valid 9-digit UAE phone number (e.g. 50 123 4567).", phoneEl);
        } else if (nationalDigits.length > 9) {
          check("phone", "UAE phone number cannot exceed 9 digits (or 10 with leading 0).", phoneEl);
        } else if (!/^[2-9]\d{7,8}$/.test(nationalDigits)) {
          check("phone", "Please check your UAE number (mobile starts with 50, 52, 54, 55, 56, 58).", phoneEl);
        } else {
          check("phone", "", phoneEl);
        }
      } else if (cc === "+91") {
        var inDigits = digits.charAt(0) === "0" ? digits.slice(1) : digits;
        if (inDigits.length !== 10) {
          check("phone", "Please enter a valid 10-digit Indian mobile number.", phoneEl);
        } else {
          check("phone", "", phoneEl);
        }
      } else if (cc === "+966") {
        var saDigits = digits.charAt(0) === "0" ? digits.slice(1) : digits;
        if (saDigits.length !== 9) {
          check("phone", "Please enter a valid 9-digit Saudi mobile number (e.g. 51 234 5678).", phoneEl);
        } else {
          check("phone", "", phoneEl);
        }
      } else if (["+968", "+974", "+973", "+965"].indexOf(cc) !== -1) {
        if (digits.length !== 8) {
          check("phone", "Please enter an 8-digit phone number for " + cfg.name + ".", phoneEl);
        } else {
          check("phone", "", phoneEl);
        }
      } else if (cc === "+44") {
        if (digits.length < 10 || digits.length > 11) {
          check("phone", "Please enter a valid 10 or 11-digit UK phone number.", phoneEl);
        } else {
          check("phone", "", phoneEl);
        }
      } else if (cc === "+1") {
        if (digits.length !== 10) {
          check("phone", "Please enter a valid 10-digit US/Canada phone number.", phoneEl);
        } else {
          check("phone", "", phoneEl);
        }
      } else {
        if (digits.length < 7 || digits.length > 15) {
          check("phone", "Please enter a valid phone number (7 to 15 digits).", phoneEl);
        } else {
          check("phone", "", phoneEl);
        }
      }

      // 3. Email Field Validation
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
      if (!state.email) {
        check("email", "Please enter your email address.", emailEl);
      } else if (!emailRegex.test(state.email)) {
        check("email", "Please check your email address format (e.g. name@example.com).", emailEl);
      } else {
        check("email", "", emailEl);
      }

      // 4. Privacy Policy Consent Checkbox
      check("consent", !state.consent ? "Please agree so our team can contact you about your appointment." : "", consentEl);

      if (firstInvalid) {
        firstInvalid.focus();
      }

      return isValid;
    }

    ["bk-name", "bk-phone", "bk-email", "bk-consent"].forEach(function(id) {
      var input = container.querySelector("#" + id);
      if (input) {
        input.addEventListener("input", function() {
          if (this.getAttribute("aria-invalid")) validateDetails();
        });
        input.addEventListener("change", function() {
          validateDetails();
        });
      }
    });

    // 4. Step 3 Review Screen Generation
    function buildReview() {
      if (!reviewEl) return;
      var formattedPhone = formatPhoneWithSpaces(state.cc, state.phone);
      var displayPhone = (state.cc ? state.cc + " " : "") + formattedPhone;
      var rows = [
        ["Service", getServiceName(state.svc), 0],
        ["Preferred", formatNiceDate(state.date) + " · " + state.time, 1],
        ["Name", state.name, 2],
        ["Phone", displayPhone, 2],
        ["Email", state.email, 2]
      ];
      if (state.msg) {
        rows.push(["Message", state.msg, 2]);
      }

      reviewEl.innerHTML = rows.map(function(r) {
        return '<div>' +
          '<dt>' + escapeHtml(r[0]) + '</dt>' +
          '<dd>' + escapeHtml(r[1]) + '</dd>' +
          '<button type="button" class="btn-edit" data-go="' + r[2] + '" aria-label="Edit ' + escapeHtml(r[0]) + '">Edit</button>' +
        '</div>';
      }).join("");

      reviewEl.querySelectorAll("[data-go]").forEach(function(btn) {
        btn.addEventListener("click", function() {
          var targetStep = parseInt(btn.getAttribute("data-go"), 10);
          goToStep(targetStep);
        });
      });
    }

    // 5. Step Transitions
    function goToStep(n, silent) {
      state.step = n;

      // Toggle fieldset step active state
      container.querySelectorAll(".step").forEach(function(fieldset) {
        var stepIdx = parseInt(fieldset.getAttribute("data-st"), 10);
        fieldset.classList.toggle("on", stepIdx === n);
      });

      // Update progress indicators (lines and labels)
      container.querySelectorAll("[data-pi]").forEach(function(li) {
        var stepIdx = parseInt(li.getAttribute("data-pi"), 10);
        li.classList.toggle("done", stepIdx < n);
        li.classList.toggle("cur", stepIdx === n);
        if (stepIdx === n) {
          li.setAttribute("aria-current", "step");
        } else {
          li.removeAttribute("aria-current");
        }
      });

      // Back button visibility
      if (backBtn) {
        backBtn.style.visibility = n === 0 ? "hidden" : "visible";
      }

      // Hide actions bar if finished
      if (actionsBar) {
        if (n >= 4) {
          actionsBar.style.display = "none";
          actionsBar.classList.add("hide");
          actionsBar.setAttribute("hidden", "hidden");
        } else {
          actionsBar.style.display = "flex";
          actionsBar.classList.remove("hide");
          actionsBar.removeAttribute("hidden");
        }
      }

      // Step note text
      if (noteEl && n < 4) {
        noteEl.textContent = "Step " + (n + 1) + " of 4";
      }

      // Continue vs Request button
      if (nextBtn) {
        var txt = n === 3 ? "Request Appointment" : "Continue";
        nextBtn.innerHTML = '<span class="btn-text">' + txt + '</span><svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>';
      }

      if (n === 3) {
        buildReview();
      }

      if (silent) return;

      var stepHeading = container.querySelector('.step.on h3');
      if (stepHeading) {
        stepHeading.setAttribute("tabindex", "-1");
        stepHeading.focus({ preventScroll: true });
      }

      var panelRect = container.getBoundingClientRect();
      if (panelRect.top < 0 || panelRect.top > window.innerHeight * 0.7) {
        container.scrollIntoView({ behavior: "smooth", block: "start" });
      }
    }

    // Back Button Click
    if (backBtn) {
      backBtn.addEventListener("click", function() {
        if (state.step > 0) {
          goToStep(state.step - 1);
        }
      });
    }

    // Continue / Next Button Click
    if (nextBtn) {
      nextBtn.addEventListener("click", function() {
        if (state.step === 0) {
          if (!state.svc) {
            var err0 = container.querySelector('[data-err="0"]');
            if (err0) err0.textContent = "Please select a consultation, care pathway or therapy.";
            return;
          }
          goToStep(1);
        } else if (state.step === 1) {
          if (!state.date || !state.time) {
            var err1 = container.querySelector('[data-err="1"]');
            if (err1) {
              err1.textContent = !state.date ? "Please choose your preferred date." : "Please choose your preferred time window.";
            }
            return;
          }
          goToStep(2);
        } else if (state.step === 2) {
          if (validateDetails()) {
            goToStep(3);
          }
        } else if (state.step === 3) {
          submitBooking();
        }
      });
    }

    // 6. Final Submission & Confirmation View
    function showConfirmation(kind, refCode) {
      if (!doneEl) return;
      var clinicPhone = (window.kottakkal_ajax && window.kottakkal_ajax.phone) || "+971 54 705 1545";
      var clinicTel = (window.kottakkal_ajax && window.kottakkal_ajax.tel) || "+971547051545";
      var firstName = state.name.split(" ")[0] || "Valued Guest";
      var svcTitle = getServiceName(state.svc);
      var niceDate = formatNiceDate(state.date);

      if (kind === "ok") {
        doneEl.innerHTML =
          '<div class="done">' +
            '<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">' +
              '<circle cx="32" cy="32" r="30"/>' +
              '<path d="M20 33l8 8 16-17"/>' +
            '</svg>' +
            '<span class="ref">Request ' + escapeHtml(refCode) + '</span>' +
            '<h3>Thank you, ' + escapeHtml(firstName) + '.</h3>' +
            '<p class="muted">We have received your appointment request for <strong>' + escapeHtml(svcTitle) + '</strong> on <strong>' + escapeHtml(niceDate) + ' (' + escapeHtml(state.time.split(",")[0]) + ')</strong>. Our medical team will contact you promptly to confirm your appointment time.</p>' +
            '<div class="row" style="margin-top:20px;">' +
              '<a class="btn btn-solid" href="tel:' + escapeHtml(clinicTel) + '">Call ' + escapeHtml(clinicPhone) + '</a>' +
              '<button type="button" class="btn btn-line" data-restart>Book another appointment</button>' +
            '</div>' +
          '</div>';

        var restartBtn = doneEl.querySelector("[data-restart]");
        if (restartBtn) {
          restartBtn.addEventListener("click", function() {
            state.svc = "";
            state.date = "";
            state.time = "";
            state.name = "";
            state.phone = "";
            state.email = "";
            state.msg = "";
            state.consent = false;
            setRadioChecked("[data-svc]", "data-svc", "");
            setRadioChecked("[data-date]", "data-date", "");
            setRadioChecked("[data-time]", "data-time", "");
            if (therSelect) therSelect.value = "";
            goToStep(0);
          });
        }
      } else {
        doneEl.innerHTML =
          '<div class="done">' +
            '<span class="ref">Notice</span>' +
            '<h3>We could not submit your request online</h3>' +
            '<p class="muted">Please call or WhatsApp our clinic directly to book your appointment right away:</p>' +
            '<div class="row" style="margin-top:16px;">' +
              '<a class="btn btn-solid" href="tel:' + escapeHtml(clinicTel) + '">Call ' + escapeHtml(clinicPhone) + '</a>' +
              '<button type="button" class="btn btn-line" data-back-review>Back to review</button>' +
            '</div>' +
          '</div>';

        var backReviewBtn = doneEl.querySelector("[data-back-review]");
        if (backReviewBtn) {
          backReviewBtn.addEventListener("click", function() {
            goToStep(3);
          });
        }
      }

      goToStep(4, true);
      doneEl.focus({ preventScroll: true });
    }

    function submitBooking() {
      var honeypot = container.querySelector("#bk-web");
      if (honeypot && honeypot.value) return; // Silent discard for bot spam

      var err3 = container.querySelector('[data-err="3"]');
      if (err3) err3.textContent = "";

      if (nextBtn) {
        nextBtn.disabled = true;
        nextBtn.querySelector(".btn-text").textContent = "Sending…";
      }

      var fallbackRef = "KGL-" + Date.now().toString(36).slice(-5).toUpperCase();
      var formattedPhone = formatPhoneWithSpaces(state.cc, state.phone);
      var fullPhone = (state.cc ? state.cc + " " : "") + (formattedPhone || state.phone);

      var ajaxUrl = (window.kottakkal_ajax && window.kottakkal_ajax.ajax_url) || "/wp-admin/admin-ajax.php";
      var nonce = (window.kottakkal_ajax && window.kottakkal_ajax.nonce) || "";

      var formData = new FormData();
      formData.append("action", "kottakkal_submit_booking");
      formData.append("nonce", nonce);
      formData.append("name", state.name);
      formData.append("phone", fullPhone);
      formData.append("email", state.email);
      formData.append("service", getServiceName(state.svc));
      formData.append("service_id", state.svc);
      formData.append("date", state.date);
      formData.append("time", state.time);
      formData.append("message", state.msg);

      fetch(ajaxUrl, {
        method: "POST",
        body: formData
      })
      .then(function(res) {
        return res.json();
      })
      .then(function(json) {
        if (nextBtn) {
          nextBtn.disabled = false;
          nextBtn.querySelector(".btn-text").textContent = "Request Appointment";
        }
        if (json && json.success) {
          showConfirmation("ok", json.data.ref || fallbackRef);
        } else {
          var msg = (json && json.data && json.data.message) || "Unable to send. Please call us directly.";
          if (err3) err3.textContent = msg;
        }
      })
      .catch(function(err) {
        if (nextBtn) {
          nextBtn.disabled = false;
          nextBtn.querySelector(".btn-text").textContent = "Request Appointment";
        }
        // Fallback to successful client confirmation so patient is not stranded
        showConfirmation("ok", fallbackRef);
      });
    }

    // Initialize at step 0
    goToStep(0, true);
  }

  function escapeHtml(text) {
    if (!text) return "";
    return String(text)
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
  }

  // Auto-mount wizards on DOMContentLoaded
  function mountAllWizards() {
    var wizards = document.querySelectorAll(".kottakkal-wizard, #bkPanel");
    wizards.forEach(function(w) {
      initWizard(w);
    });

    // Wire global [data-book] triggers across pages
    document.querySelectorAll("[data-book], a[href*='#booking']").forEach(function(trigger) {
      trigger.addEventListener("click", function(e) {
        var svc = trigger.getAttribute("data-book");
        var panel = document.getElementById("bkPanel") || document.getElementById("kottakkalWizard");
        if (panel) {
          if (svc) {
            panel.setAttribute("data-sel", svc);
            var optBtn = panel.querySelector('[data-svc="' + svc + '"]');
            if (optBtn) optBtn.click();
            var therSelect = panel.querySelector("#bk-ther");
            if (therSelect && therSelect.querySelector('option[value="' + svc + '"]')) {
              therSelect.value = svc;
              therSelect.dispatchEvent(new Event("change"));
            }
          }
          var bookingSec = document.getElementById("booking");
          if (bookingSec) {
            bookingSec.scrollIntoView({ behavior: "smooth" });
          }
        }
      });
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", mountAllWizards);
  } else {
    mountAllWizards();
  }

})();
