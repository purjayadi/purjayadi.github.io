// @file Portfolio interactions: language switch, animation, particles, and scroll controls.
// ===== Smooth Scrolling =====
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute("href"));
    if (target) {
      target.scrollIntoView({
        behavior: "smooth",
        block: "start",
      });

      // Close mobile menu
      const navMenu = document.querySelector(".nav-menu");
      const hamburger = document.querySelector(".hamburger");
      if (navMenu.classList.contains("active")) {
        navMenu.classList.remove("active");
        hamburger.classList.remove("active");
      }
    }
  });
});

// ===== Language Switcher =====
let currentLang = "en"; // Default language

function switchLanguage(lang) {
  currentLang = lang;

  // Update HTML lang attribute
  document.documentElement.lang = lang;

  // Update all elements with data-en and data-id attributes
  document.querySelectorAll("[data-en][data-id]").forEach((element) => {
    const text =
      lang === "en"
        ? element.getAttribute("data-en")
        : element.getAttribute("data-id");
    if (text) {
      element.textContent = text;
    }
  });

  // Update active button
  document.querySelectorAll(".lang-btn").forEach((btn) => {
    btn.classList.remove("active");
    if (btn.getAttribute("data-lang") === lang) {
      btn.classList.add("active");
    }
  });

  // Store preference
  localStorage.setItem("preferredLanguage", lang);

  // Update dynamic durations with new language
  updateDynamicDurations();
}

// Language button listeners
document.querySelectorAll(".lang-btn").forEach((btn) => {
  btn.addEventListener("click", () => {
    const lang = btn.getAttribute("data-lang");
    switchLanguage(lang);
  });
});

// Load saved language preference
document.addEventListener("DOMContentLoaded", () => {
  const savedLang = localStorage.getItem("preferredLanguage") || "en";
  switchLanguage(savedLang);
  updateDynamicDurations(); // Calculate durations on page load
});

// ===== Dynamic Duration Calculator =====
function calculateDuration(startDate, endDate) {
  const start = new Date(startDate + "-01");
  const end = endDate === "present" ? new Date() : new Date(endDate + "-01");

  let years = end.getFullYear() - start.getFullYear();
  let months = end.getMonth() - start.getMonth();

  if (months < 0) {
    years--;
    months += 12;
  }

  return { years, months };
}

function formatDuration(years, months, lang) {
  const translations = {
    en: {
      present: "Present",
      year: "yr",
      years: "yrs",
      month: "mo",
      months: "mos",
    },
    id: {
      present: "Sekarang",
      year: "thn",
      years: "thn",
      month: "bln",
      months: "bln",
    },
  };

  const t = translations[lang] || translations.en;
  const parts = [];

  if (years > 0) {
    parts.push(`${years} ${years === 1 ? t.year : t.years}`);
  }

  if (months > 0) {
    parts.push(`${months} ${months === 1 ? t.month : t.months}`);
  }

  return parts.length > 0 ? parts.join(" ") : `1 ${t.month}`;
}

function updateDynamicDurations() {
  const lang = currentLang || "en";
  const translations = {
    en: { present: "Present" },
    id: { present: "Sekarang" },
  };

  document.querySelectorAll(".dynamic-duration").forEach((element) => {
    const startDate = element.getAttribute("data-start");
    const endDate = element.getAttribute("data-end");
    const durationText = element.querySelector(".duration-text");

    if (startDate && endDate && durationText) {
      const { years, months } = calculateDuration(startDate, endDate);
      const duration = formatDuration(years, months, lang);

      // Parse start date for display
      const [startYear, startMonth] = startDate.split("-");
      const startMonthNames = {
        en: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
        id: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "Mei",
          "Jun",
          "Jul",
          "Agu",
          "Sep",
          "Okt",
          "Nov",
          "Des",
        ],
      };
      const startMonthName =
        startMonthNames[lang][parseInt(startMonth) - 1] || startMonth;

      // Parse end date for display
      let endDisplay;
      if (endDate === "present") {
        endDisplay = translations[lang].present;
      } else {
        const [endYear, endMonth] = endDate.split("-");
        const endMonthName =
          startMonthNames[lang][parseInt(endMonth) - 1] || endMonth;
        endDisplay = `${endMonthName} ${endYear}`;
      }

      durationText.textContent = `${startMonthName} ${startYear} - ${endDisplay} · ${duration}`;
    }
  });
}

// ===== Mobile Menu Toggle =====
const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  navMenu.classList.toggle("active");
});

// Close menu when clicking outside
document.addEventListener("click", (e) => {
  if (!hamburger.contains(e.target) && !navMenu.contains(e.target)) {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
  }
});

// ===== Active Navigation Link =====
const sections = document.querySelectorAll("section[id]");
const navLinks = document.querySelectorAll(".nav-link");

function activateNavLink() {
  const scrollPosition = window.pageYOffset + 100;

  sections.forEach((section) => {
    const sectionTop = section.offsetTop;
    const sectionHeight = section.clientHeight;
    const sectionId = section.getAttribute("id");

    if (
      scrollPosition >= sectionTop &&
      scrollPosition < sectionTop + sectionHeight
    ) {
      navLinks.forEach((link) => {
        link.classList.remove("active");
        if (link.getAttribute("href") === `#${sectionId}`) {
          link.classList.add("active");
        }
      });
    }
  });
}

window.addEventListener("scroll", activateNavLink);
window.addEventListener("load", activateNavLink);

// ===== Navbar Scroll Effect =====
const navbar = document.querySelector(".navbar");
let lastScroll = 0;

window.addEventListener("scroll", () => {
  const currentScroll = window.pageYOffset;

  if (currentScroll > 100) {
    navbar.style.boxShadow = "0 10px 30px -10px rgba(2, 12, 27, 0.9)";
  } else {
    navbar.style.boxShadow = "0 10px 30px -10px rgba(2, 12, 27, 0.7)";
  }
});

// ===== Scroll Animations =====
const observerOptions = {
  threshold: 0.1,
  rootMargin: "0px 0px -50px 0px",
};

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.style.opacity = "1";
      entry.target.style.transform = "translateY(0)";
    }
  });
}, observerOptions);

// Observe elements
document.addEventListener("DOMContentLoaded", () => {
  const animateElements = document.querySelectorAll(
    ".stat-card, .timeline-item, .skill-category, .contact-card",
  );

  animateElements.forEach((el) => {
    el.style.opacity = "0";
    el.style.transform = "translateY(30px)";
    el.style.transition = "opacity 0.6s ease, transform 0.6s ease";
    observer.observe(el);
  });
});

// ===== Particles Effect =====
function createParticles() {
  const particlesContainer = document.getElementById("particles");
  const particleCount = 50;

  for (let i = 0; i < particleCount; i++) {
    const particle = document.createElement("div");
    particle.style.position = "absolute";
    particle.style.width = Math.random() * 3 + 1 + "px";
    particle.style.height = particle.style.width;
    particle.style.background = "rgba(96, 165, 250, 0.28)";
    particle.style.borderRadius = "50%";
    particle.style.left = Math.random() * 100 + "%";
    particle.style.top = Math.random() * 100 + "%";
    particle.style.animation = `float ${Math.random() * 10 + 5}s ease-in-out infinite`;
    particle.style.animationDelay = Math.random() * 5 + "s";
    particlesContainer.appendChild(particle);
  }
}

// Create particles on load
window.addEventListener("load", createParticles);

// ===== Scroll to Top Button =====
const createScrollToTopButton = () => {
  const button = document.createElement("button");
  button.innerHTML = '<i class="fas fa-arrow-up"></i>';
  button.className = "scroll-to-top";
  button.style.cssText = `
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        border-radius: 8px;
        background: rgba(96, 165, 250, 0.16);
        color: var(--text-highlight);
        border: 1px solid var(--text-highlight);
        cursor: pointer;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 999;
        font-size: 18px;
    `;

  button.addEventListener("click", () => {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });

  button.addEventListener("mouseenter", () => {
    button.style.background = "rgba(96, 165, 250, 0.28)";
    button.style.transform = "translateY(-3px)";
  });

  button.addEventListener("mouseleave", () => {
    button.style.background = "rgba(96, 165, 250, 0.16)";
    button.style.transform = "translateY(0)";
  });

  document.body.appendChild(button);

  window.addEventListener("scroll", () => {
    if (window.pageYOffset > 300) {
      button.style.opacity = "1";
      button.style.visibility = "visible";
    } else {
      button.style.opacity = "0";
      button.style.visibility = "hidden";
    }
  });
};

createScrollToTopButton();

// ===== Add Float Animation =====
const style = document.createElement("style");
style.textContent = `
    @keyframes float {
        0%, 100% {
            transform: translateY(0) translateX(0);
        }
        33% {
            transform: translateY(-20px) translateX(10px);
        }
        66% {
            transform: translateY(10px) translateX(-10px);
        }
    }
`;
document.head.appendChild(style);

// ===== Console Message =====
console.log(
  "%c👋 Hi there!",
  "color: #60a5fa; font-size: 24px; font-weight: bold;",
);
console.log(
  "%cThanks for checking out my portfolio!",
  "color: #8892b0; font-size: 16px;",
);
console.log(
  "%cFeel free to reach out if you want to collaborate.",
  "color: #8892b0; font-size: 14px;",
);

// ===== Loading Animation =====
window.addEventListener("load", () => {
  document.body.style.opacity = "0";
  document.body.style.transition = "opacity 0.5s ease";

  setTimeout(() => {
    document.body.style.opacity = "1";
  }, 100);
});
