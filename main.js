import './src/style.css'
import { setupCounter } from './lib/main.js'

// Wait for DOM to be ready
document.addEventListener('DOMContentLoaded', function() {
    // Initialize counter if element exists
    const counterElement = document.querySelector('#counter')
    if (counterElement) {
        setupCounter(counterElement)
    }
    
    // Add smooth scrolling for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]')
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault()
            const target = document.querySelector(this.getAttribute('href'))
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                })
            }
        })
    })
    
    // Add mobile menu toggle functionality
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle')
    const mobileMenu = document.querySelector('.mobile-menu')
    
    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('active')
            this.classList.toggle('active')
        })
    }
    
    // Add scroll effects
    window.addEventListener('scroll', function() {
        const header = document.querySelector('.site-header')
        if (header) {
            if (window.scrollY > 100) {
                header.classList.add('scrolled')
            } else {
                header.classList.remove('scrolled')
            }
        }
    })
    
    // Initialize any service-specific functionality
    initializeServices()
})

// Service-specific functionality
function initializeServices() {
    // Add click handlers for service cards
    const serviceCards = document.querySelectorAll('.service-card')
    serviceCards.forEach(card => {
        card.addEventListener('click', function() {
            // Add your service card interaction logic here
            console.log('Service card clicked:', this.dataset.service)
        })
    })
    
    // Add contact form handling
    const contactForm = document.querySelector('#contact-form')
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault()
            // Add your contact form submission logic here
            console.log('Contact form submitted')
        })
    }
}
