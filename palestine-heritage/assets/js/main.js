document.addEventListener("DOMContentLoaded", () => {
  initLoadingScreen()
  setTimeout(() => {
    initNavigation()
    initScrollAnimations()
    initBackToTop()
    initDonationHandlers()
    initGalleryFilters()
    initNewsletterForm()
    initImageModal()
    initSmoothScrolling()
    initParallaxEffects()
    initCounterAnimations()
  }, 100)
})
function initLoadingScreen() {
  const loadingScreen = document.getElementById("loading-screen")
  if (loadingScreen) {
    window.addEventListener("load", () => {
      setTimeout(() => {
        loadingScreen.classList.add("hidden")
        
        setTimeout(() => {
          if (loadingScreen.parentNode) {
            loadingScreen.remove()
          }
        }, 500)
      }, 1000)
    })
    setTimeout(() => {
      if (loadingScreen && !loadingScreen.classList.contains("hidden")) {
        loadingScreen.classList.add("hidden")
        setTimeout(() => {
          if (loadingScreen.parentNode) {
            loadingScreen.remove()
          }
        }, 500)
      }
    }, 3000)
  }
}
function initNavigation() {
  const navbar = document.querySelector(".palestine-nav")
  const navLinks = document.querySelectorAll(".nav-link")
  function handleNavbarScroll() {
    if (window.scrollY > 100) {
      navbar.classList.add("scrolled")
    } else {
      navbar.classList.remove("scrolled")
    }
  }
  window.addEventListener("scroll", handleNavbarScroll)
  function updateActiveLink() {
    const sections = document.querySelectorAll("section[id], main[id]")
    let current = ""
    sections.forEach((section) => {
      const sectionTop = section.offsetTop - 150
      const sectionHeight = section.clientHeight
      if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
        current = section.getAttribute("id")
      }
    })
    navLinks.forEach((link) => {
      link.classList.remove("active")
      const href = link.getAttribute("href")
      if (href && href.includes(current) && current !== "") {
        link.classList.add("active")
      }
    })
  }
  window.addEventListener("scroll", updateActiveLink)
  navLinks.forEach((link) => {
    link.addEventListener("click", () => {
      const navbarCollapse = document.querySelector(".navbar-collapse")
      const navbarToggler = document.querySelector(".navbar-toggler")
      if (navbarCollapse && navbarCollapse.classList.contains("show")) {
        navbarToggler.click()
      }
    })
  })
}
function initScrollAnimations() {
  const animatedElements = document.querySelectorAll(
    ".feature-card, .timeline-item, .city-card, .stat-card, .area-card, .donation-card, .help-card, .story-card, .gallery-item",
  )
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  }
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        setTimeout(() => {
          entry.target.classList.add("animate-fade-in-up")
        }, index * 100)
        observer.unobserve(entry.target)
      }
    })
  }, observerOptions)
  animatedElements.forEach((element) => {
    element.style.opacity = "0"
    element.style.transform = "translateY(30px)"
    observer.observe(element)
  })
}
function initBackToTop() {
  const backToTopBtn = document.getElementById("backToTop")
  if (backToTopBtn) {
    function toggleBackToTop() {
      if (window.scrollY > 300) {
        backToTopBtn.classList.add("visible")
      } else {
        backToTopBtn.classList.remove("visible")
      }
    }
    window.addEventListener("scroll", toggleBackToTop)
    backToTopBtn.addEventListener("click", () => {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      })
    })
  }
}
function initDonationHandlers() {
  const donationBtns = document.querySelectorAll(".donation-btn")
  const customDonateBtn = document.getElementById("customDonateBtn")
  const customAmountInput = document.getElementById("customAmount")
  donationBtns.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault()
      const amount = this.getAttribute("data-amount") || "custom"
      showDonationModal(amount)
    })
  })
  if (customDonateBtn && customAmountInput) {
    customDonateBtn.addEventListener("click", (e) => {
      e.preventDefault()
      const amount = customAmountInput.value
      if (amount && amount > 0) {
        showDonationModal(amount)
      } else {
        showAlert("Please enter a valid donation amount.", "warning")
      }
    })
    customAmountInput.addEventListener("input", function () {
      const value = Number.parseFloat(this.value)
      customDonateBtn.disabled = !value || value <= 0
      if (value && value > 0) {
        this.classList.remove("is-invalid")
        this.classList.add("is-valid")
      } else {
        this.classList.remove("is-valid")
        this.classList.add("is-invalid")
      }
    })
  }
  function showDonationModal(amount) {
    const donationModal = document.getElementById("donationModal")
    if (donationModal) {
      const modalTitle = donationModal.querySelector(".modal-title")
      if (modalTitle && amount !== "custom") {
        modalTitle.textContent = `Thank You for Your $${amount} Donation`
      }
      const modal = window.bootstrap.Modal.getOrCreateInstance(donationModal)
      modal.show()
    }
  }
}
function initGalleryFilters() {
  const filterBtns = document.querySelectorAll(".filter-btn")
  const galleryItems = document.querySelectorAll(".gallery-item")
  const loadMoreBtn = document.getElementById("loadMore")
  let visibleItems = 6
  filterBtns.forEach((btn) => {
    btn.addEventListener("click", function () {
      const filter = this.getAttribute("data-filter")
      filterBtns.forEach((b) => b.classList.remove("active"))
      this.classList.add("active")
      galleryItems.forEach((item, index) => {
        const category = item.getAttribute("data-category")
        if (filter === "all" || category === filter) {
          item.classList.remove("hidden")
          setTimeout(() => {
            item.style.opacity = "1"
            item.style.transform = "translateY(0)"
          }, index * 50)
        } else {
          item.classList.add("hidden")
          item.style.opacity = "0"
          item.style.transform = "translateY(20px)"
        }
      })
      visibleItems = 6
      updateLoadMoreButton()
    })
  })
  if (loadMoreBtn) {
    loadMoreBtn.addEventListener("click", () => {
      const hiddenItems = Array.from(galleryItems).filter(
        (item) => !item.classList.contains("hidden") && item.style.display === "none",
      )
      hiddenItems.slice(0, 6).forEach((item, index) => {
        setTimeout(() => {
          item.style.display = "block"
          item.style.opacity = "1"
          item.style.transform = "translateY(0)"
        }, index * 100)
      })
      visibleItems += 6
      updateLoadMoreButton()
    })
  }
  function updateLoadMoreButton() {
    if (loadMoreBtn) {
      const visibleGalleryItems = Array.from(galleryItems).filter((item) => !item.classList.contains("hidden"))
      if (visibleItems >= visibleGalleryItems.length) {
        loadMoreBtn.style.display = "none"
      } else {
        loadMoreBtn.style.display = "inline-flex"
      }
    }
  }
  galleryItems.forEach((item, index) => {
    if (index >= visibleItems) {
      item.style.display = "none"
    }
  })
  updateLoadMoreButton()
}
function initNewsletterForm() {
  const newsletterForms = document.querySelectorAll(".newsletter-form")
  newsletterForms.forEach((form) => {
    form.addEventListener("submit", function (e) {
      e.preventDefault()
      const emailInput = this.querySelector('input[type="email"]')
      const email = emailInput.value.trim()
      if (email && isValidEmail(email)) {
        fetch("/api/subscribe-newsletter.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ email: email }),
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.success) {
              showAlert(
                "Thank you for subscribing! You will receive updates about Palestinian heritage and culture.",
                "success",
              )
              emailInput.value = ""
            } else {
              showAlert(data.message || "An error occurred. Please try again.", "warning")
            }
          })
          .catch((error) => {
            showAlert("An error occurred. Please try again later.", "danger")
          })
      } else {
        showAlert("Please enter a valid email address.", "warning")
      }
    })
  })
}
function initImageModal() {
  const galleryCards = document.querySelectorAll(".gallery-card")
  const imageModal = document.getElementById("imageModal")
  if (imageModal) {
    const modalImage = document.getElementById("modalImage")
    const modalImageTitle = document.getElementById("modalImageTitle")
    const modalImageDescription = document.getElementById("modalImageDescription")
    galleryCards.forEach((card) => {
      const expandBtn = card.querySelector('.gallery-btn[data-bs-toggle="modal"]')
      if (expandBtn) {
        expandBtn.addEventListener("click", () => {
          const img = card.querySelector("img")
          const title = card.querySelector(".gallery-info h4")?.textContent || "Palestine Heritage"
          const description = card.querySelector(".gallery-info p")?.textContent || "Beautiful image from Palestine"
          if (modalImage) modalImage.src = img.src
          if (modalImageTitle) modalImageTitle.textContent = title
          if (modalImageDescription) modalImageDescription.textContent = description
        })
      }
    })
  }
}
function initSmoothScrolling() {
  const scrollLinks = document.querySelectorAll('a[href^="#"]')
  scrollLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      const href = this.getAttribute("href")
      if (href === "#") return
      e.preventDefault()
      const targetId = href.substring(1)
      const targetElement = document.getElementById(targetId)
      if (targetElement) {
        const offsetTop = targetElement.offsetTop - 100
        window.scrollTo({
          top: offsetTop,
          behavior: "smooth",
        })
      }
    })
  })
}
function initParallaxEffects() {
  const parallaxElements = document.querySelectorAll(".hero-particles, .floating-element")
  function updateParallax() {
    const scrolled = window.pageYOffset
    parallaxElements.forEach((element) => {
      const speed = element.dataset.speed || 0.5
      const yPos = -(scrolled * speed)
      element.style.transform = `translateY(${yPos}px)`
    })
  }
  let ticking = false
  function requestTick() {
    if (!ticking) {
      requestAnimationFrame(updateParallax)
      ticking = true
    }
  }
  window.addEventListener("scroll", () => {
    requestTick()
    ticking = false
  })
}
function initCounterAnimations() {
  const counters = document.querySelectorAll(".stat-number")
  const counterObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animateCounter(entry.target)
          counterObserver.unobserve(entry.target)
        }
      })
    },
    { threshold: 0.5 },
  )
  counters.forEach((counter) => {
    counterObserver.observe(counter)
  })
  function animateCounter(element) {
    const target = Number.parseInt(element.textContent.replace(/[^\d]/g, ""))
    const suffix = element.textContent.replace(/[\d]/g, "")
    const duration = 2000
    const step = target / (duration / 16)
    let current = 0
    const timer = setInterval(() => {
      current += step
      if (current >= target) {
        current = target
        clearInterval(timer)
      }
      element.textContent = Math.floor(current) + suffix
    }, 16)
  }
}
function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  return emailRegex.test(email)
}
function showAlert(message, type = "info") {
  const existingAlerts = document.querySelectorAll(".custom-alert")
  existingAlerts.forEach((alert) => alert.remove())
  const alertDiv = document.createElement("div")
  alertDiv.className = `alert alert-${type} alert-dismissible fade show custom-alert position-fixed`
  alertDiv.style.cssText =
    "top: 100px; right: 20px; z-index: 9999; max-width: 400px; box-shadow: 0 10px 40px rgba(0,0,0,0.15);"
  alertDiv.innerHTML = `
        <div class="d-flex align-items-center">
            <i class="fas fa-${getAlertIcon(type)} me-2"></i>
            <span>${message}</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `
  document.body.appendChild(alertDiv)
  setTimeout(() => {
    if (alertDiv.parentNode) {
      alertDiv.remove()
    }
  }, 5000)
}
function getAlertIcon(type) {
  const icons = {
    success: "check-circle",
    warning: "exclamation-triangle",
    danger: "exclamation-circle",
    info: "info-circle",
  }
  return icons[type] || "info-circle"
}
document.addEventListener("keydown", (e) => {
  if (e.key === "Escape") {
    const openModals = document.querySelectorAll(".modal.show")
    openModals.forEach((modal) => {
      const modalInstance = window.bootstrap.Modal.getInstance(modal)
      if (modalInstance) {
        modalInstance.hide()
      }
    })
  }
})
setInterval(() => {
  if (typeof window.loadStatistics === "function") {
    window.loadStatistics()
  }
}, 30000)
document.querySelectorAll('button[type="submit"]').forEach((button) => {
  const form = button.closest("form")
  if (form) {
    form.addEventListener("submit", () => {
      button.disabled = true
      const originalHtml = button.innerHTML
      button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...'
      setTimeout(() => {
        button.disabled = false
        button.innerHTML = originalHtml
      }, 5000)
    })
  }
})
