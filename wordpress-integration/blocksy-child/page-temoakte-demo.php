<?php
/**
 * Template Name: Temoakte Demo Page
 * 
 * This template demonstrates all the custom features of the Temoakte system
 * 
 * @package Blocksy_Child_Temoakte
 */

get_header('temoakte'); ?>

<main id="primary" class="site-main">
    
    <!-- Hero Section -->
    <section class="temoakte-demo-hero temoakte-hero">
        <div class="temoakte-content">
            <h1 class="temoakte-hero-title">Welcome to Temoakte</h1>
            <p class="temoakte-hero-description">Experience the power of custom WordPress integration with modern design and functionality.</p>
            <div class="temoakte-hero-actions">
                <a href="#portfolio" class="temoakte-btn temoakte-btn-primary temoakte-btn-large">View Portfolio</a>
                <a href="#services" class="temoakte-btn temoakte-btn-secondary temoakte-btn-large">Our Services</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="temoakte-features">
        <div class="temoakte-content">
            <h2 class="section-title">Key Features</h2>
            <div class="temoakte-grid temoakte-grid-3">
                <div class="temoakte-card temoakte-animate">
                    <div class="feature-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2" stroke="currentColor" stroke-width="2"/>
                            <circle cx="9" cy="9" r="2" stroke="currentColor" stroke-width="2"/>
                            <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                    <h3 class="temoakte-card-title">Portfolio Management</h3>
                    <p class="temoakte-card-content">Showcase your work with custom portfolio post types, categories, and detailed project information.</p>
                </div>
                
                <div class="temoakte-card temoakte-animate">
                    <div class="feature-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/>
                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                    <h3 class="temoakte-card-title">Service Listings</h3>
                    <p class="temoakte-card-content">Display your services with pricing, duration, and feature lists to attract potential clients.</p>
                </div>
                
                <div class="temoakte-card temoakte-animate">
                    <div class="feature-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                    <h3 class="temoakte-card-title">Customer Testimonials</h3>
                    <p class="temoakte-card-content">Build trust with customer reviews, ratings, and testimonials displayed beautifully.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="temoakte-portfolio-section">
        <div class="temoakte-content">
            <h2 class="section-title">Our Portfolio</h2>
            <p class="section-description">Check out some of our recent work and projects.</p>
            
            <!-- Portfolio Filter (Optional) -->
            <div class="temoakte-portfolio-filter">
                <button data-filter="all" class="active">All</button>
                <button data-filter="web-design">Web Design</button>
                <button data-filter="development">Development</button>
                <button data-filter="branding">Branding</button>
            </div>
            
            <!-- Portfolio Grid using Shortcode -->
            <?php echo do_shortcode('[temoakte_portfolio limit="6" columns="3"]'); ?>
            
            <div class="text-center">
                <a href="/portfolio" class="temoakte-btn temoakte-btn-secondary">View All Projects</a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="temoakte-services-section">
        <div class="temoakte-content">
            <h2 class="section-title">Our Services</h2>
            <p class="section-description">We offer a wide range of professional services to help your business grow.</p>
            
            <!-- Services Grid using Shortcode -->
            <?php echo do_shortcode('[temoakte_services limit="6" columns="3"]'); ?>
            
            <div class="text-center">
                <a href="/services" class="temoakte-btn temoakte-btn-primary">View All Services</a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="temoakte-stats">
        <div class="temoakte-content">
            <div class="temoakte-grid temoakte-grid-4">
                <div class="stat-item temoakte-animate">
                    <div class="stat-number temoakte-counter" data-target="150" data-duration="2000">0</div>
                    <div class="stat-label">Projects Completed</div>
                </div>
                <div class="stat-item temoakte-animate">
                    <div class="stat-number temoakte-counter" data-target="50" data-duration="2000">0</div>
                    <div class="stat-label">Happy Clients</div>
                </div>
                <div class="stat-item temoakte-animate">
                    <div class="stat-number temoakte-counter" data-target="5" data-duration="2000">0</div>
                    <div class="stat-label">Years Experience</div>
                </div>
                <div class="stat-item temoakte-animate">
                    <div class="stat-number temoakte-counter" data-target="24" data-duration="2000">0</div>
                    <div class="stat-label">Support Hours</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="temoakte-testimonials-section">
        <div class="temoakte-content">
            <h2 class="section-title">What Our Clients Say</h2>
            <p class="section-description">Don't just take our word for it - hear from our satisfied customers.</p>
            
            <!-- Testimonials using Shortcode -->
            <div class="temoakte-testimonials-slider">
                <?php echo do_shortcode('[temoakte_testimonials limit="3" columns="1"]'); ?>
            </div>
        </div>
    </section>

    <!-- Technology Stack -->
    <section class="temoakte-tech-stack">
        <div class="temoakte-content">
            <h2 class="section-title">Technologies We Use</h2>
            <div class="tech-grid">
                <div class="tech-item">
                    <div class="tech-icon">🚀</div>
                    <h4>WordPress</h4>
                    <p>Custom themes and plugins</p>
                </div>
                <div class="tech-item">
                    <div class="tech-icon">⚛️</div>
                    <h4>React</h4>
                    <p>Modern JavaScript framework</p>
                </div>
                <div class="tech-item">
                    <div class="tech-icon">🎨</div>
                    <h4>CSS3</h4>
                    <p>Modern styling and animations</p>
                </div>
                <div class="tech-item">
                    <div class="tech-icon">⚡</div>
                    <h4>JavaScript</h4>
                    <p>Interactive user experiences</p>
                </div>
                <div class="tech-item">
                    <div class="tech-icon">🔧</div>
                    <h4>PHP</h4>
                    <p>Server-side development</p>
                </div>
                <div class="tech-item">
                    <div class="tech-icon">📱</div>
                    <h4>Responsive</h4>
                    <p>Mobile-first design</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="temoakte-contact-section">
        <div class="temoakte-content">
            <div class="temoakte-grid temoakte-grid-2">
                <div class="contact-info">
                    <h2>Get In Touch</h2>
                    <p>Ready to start your project? Contact us today and let's discuss how we can help bring your vision to life.</p>
                    
                    <div class="contact-details">
                        <div class="contact-item">
                            <strong>Email:</strong>
                            <a href="mailto:hello@temoakte.com">hello@temoakte.com</a>
                        </div>
                        <div class="contact-item">
                            <strong>Phone:</strong>
                            <a href="tel:+1234567890">+1 (234) 567-890</a>
                        </div>
                        <div class="contact-item">
                            <strong>Address:</strong>
                            <span>123 Business St, City, State 12345</span>
                        </div>
                    </div>
                    
                    <div class="social-links">
                        <a href="#" class="social-link">Facebook</a>
                        <a href="#" class="social-link">Twitter</a>
                        <a href="#" class="social-link">LinkedIn</a>
                        <a href="#" class="social-link">Instagram</a>
                    </div>
                </div>
                
                <div class="contact-form-wrapper">
                    <!-- Contact Form using Shortcode -->
                    <?php echo do_shortcode('[temoakte_contact_form title="Send us a message" button_text="Send Message"]'); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="temoakte-cta">
        <div class="temoakte-content">
            <div class="cta-content">
                <h2>Ready to Get Started?</h2>
                <p>Let's work together to create something amazing for your business.</p>
                <div class="cta-actions">
                    <a href="/contact" class="temoakte-btn temoakte-btn-primary temoakte-btn-large">Start Your Project</a>
                    <a href="/portfolio" class="temoakte-btn temoakte-btn-secondary temoakte-btn-large">View Our Work</a>
                </div>
            </div>
        </div>
    </section>

</main><!-- #main -->

<style>
/* Demo Page Specific Styles */
.temoakte-demo-hero {
    background: linear-gradient(135deg, var(--temoakte-primary), var(--temoakte-secondary));
    color: white;
    padding: 6rem 0;
    text-align: center;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    text-align: center;
    margin-bottom: 1rem;
    color: var(--temoakte-text);
}

.section-description {
    font-size: 1.125rem;
    text-align: center;
    color: #6b7280;
    margin-bottom: 3rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.temoakte-features,
.temoakte-portfolio-section,
.temoakte-services-section,
.temoakte-testimonials-section,
.temoakte-tech-stack,
.temoakte-contact-section {
    padding: 5rem 0;
}

.temoakte-features {
    background: #f9fafb;
}

.feature-icon {
    background: var(--temoakte-primary);
    color: white;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
}

.temoakte-portfolio-filter {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 3rem;
    flex-wrap: wrap;
}

.temoakte-portfolio-filter button {
    background: transparent;
    border: 2px solid var(--temoakte-border);
    padding: 0.5rem 1.5rem;
    border-radius: 2rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.temoakte-portfolio-filter button:hover,
.temoakte-portfolio-filter button.active {
    background: var(--temoakte-primary);
    color: white;
    border-color: var(--temoakte-primary);
}

.temoakte-stats {
    background: var(--temoakte-text);
    color: white;
    padding: 4rem 0;
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: 3rem;
    font-weight: 700;
    color: var(--temoakte-primary);
    display: block;
}

.stat-label {
    font-size: 1rem;
    opacity: 0.8;
    margin-top: 0.5rem;
}

.temoakte-testimonials-section {
    background: #f9fafb;
}

.tech-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.tech-item {
    text-align: center;
    padding: 2rem;
    background: white;
    border-radius: 0.5rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease;
}

.tech-item:hover {
    transform: translateY(-4px);
}

.tech-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.tech-item h4 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--temoakte-text);
}

.tech-item p {
    color: #6b7280;
    font-size: 0.875rem;
}

.temoakte-contact-section {
    background: #f9fafb;
}

.contact-details {
    margin: 2rem 0;
}

.contact-item {
    margin-bottom: 1rem;
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.contact-item strong {
    color: var(--temoakte-text);
}

.contact-item a {
    color: var(--temoakte-primary);
    text-decoration: none;
}

.contact-item a:hover {
    text-decoration: underline;
}

.social-links {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
}

.social-link {
    padding: 0.5rem 1rem;
    background: var(--temoakte-primary);
    color: white;
    text-decoration: none;
    border-radius: 0.25rem;
    font-size: 0.875rem;
    transition: background-color 0.2s ease;
}

.social-link:hover {
    background: var(--temoakte-secondary);
    color: white;
}

.temoakte-cta {
    background: linear-gradient(135deg, var(--temoakte-primary), var(--temoakte-secondary));
    color: white;
    padding: 5rem 0;
    text-align: center;
}

.cta-content h2 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.cta-content p {
    font-size: 1.25rem;
    margin-bottom: 2rem;
    opacity: 0.9;
}

.cta-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.text-center {
    text-align: center;
    margin-top: 3rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .section-title {
        font-size: 2rem;
    }
    
    .temoakte-demo-hero {
        padding: 4rem 0;
    }
    
    .temoakte-hero-title {
        font-size: 2.5rem;
    }
    
    .tech-grid {
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1rem;
    }
    
    .tech-item {
        padding: 1.5rem;
    }
    
    .stat-number {
        font-size: 2rem;
    }
    
    .cta-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .temoakte-btn-large {
        width: 100%;
        max-width: 300px;
    }
}
</style>

<?php get_footer('temoakte'); ?>