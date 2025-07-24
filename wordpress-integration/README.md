# Temoakte WordPress Integration with Blocksy Child Theme + Tailwind CSS & Flowbite Pro

## Overview

This is a complete WordPress integration system that creates a custom child theme based on Blocksy with the Temoakte design system, enhanced with **Tailwind CSS** and **Flowbite Pro** components. It includes custom post types, shortcodes, widgets, modern UI components, and a full-featured theme customization system.

## Features

### 🎨 **Modern Design System**
- **Tailwind CSS** utility-first framework for rapid styling
- **Flowbite Pro** premium UI components and interactions
- Custom color scheme with CSS variables and Tailwind config
- Smooth animations and hover effects with transition classes
- Mobile-first responsive design with Tailwind breakpoints
- Dark mode support (optional)

### 📝 **Custom Post Types**
- **Portfolio**: Showcase your work with project details
- **Services**: Display your services with pricing and features
- **Testimonials**: Customer feedback with ratings

### 🛠️ **Custom Fields & Meta Boxes**
- Portfolio: Project URL, Client Name, Date, Technologies
- Services: Price, Duration, Features list
- Testimonials: Client info, Company, Rating (1-5 stars)

### 🔧 **Shortcodes**
- `[temoakte_portfolio]` - Display portfolio grid
- `[temoakte_services]` - Display services grid
- `[temoakte_testimonials]` - Display testimonials
- `[temoakte_contact_form]` - Contact form with AJAX

### 🎛️ **Theme Customizer**
- Color customization
- Hero section settings
- Contact information
- Social media links
- Footer customization

### 📱 **Enhanced JavaScript Features**
- **Flowbite Pro** interactive components (modals, dropdowns, carousel, tabs)
- AJAX contact forms with Tailwind styling
- Smooth scrolling with easing animations
- Lazy loading images with Intersection Observer
- Mobile drawer menu (Flowbite Pro)
- Portfolio filtering with smooth transitions
- Testimonials slider/carousel
- Toast notifications system
- Live search functionality
- Counter animations
- Parallax scroll effects

## Installation

### Prerequisites
1. WordPress 5.0 or higher
2. Blocksy parent theme installed and activated
3. PHP 7.4 or higher

### Step 1: Install Blocksy Parent Theme
1. Go to **Appearance > Themes** in your WordPress admin
2. Click **Add New**
3. Search for "Blocksy"
4. Install and activate the Blocksy theme

### Step 2: Install Temoakte Child Theme
1. Copy the `blocksy-child` folder to your WordPress themes directory:
   ```
   /wp-content/themes/blocksy-child/
   ```
2. Go to **Appearance > Themes**
3. Activate "Blocksy Child - Temoakte Custom with Tailwind & Flowbite Pro"

### Step 3: Tailwind CSS & Flowbite Pro Setup
The theme automatically loads:
- **Tailwind CSS** from CDN (latest version)
- **Flowbite Pro** CSS and JavaScript from CDN
- Custom Tailwind configuration for Temoakte colors
- All Flowbite Pro components are ready to use

**Note**: For production, consider using a local build process for better performance.

## Usage

### Custom Post Types

#### Portfolio
1. Go to **Portfolio > Add New** in your WordPress admin
2. Add title, content, and featured image
3. Fill in the Portfolio Details:
   - Project URL
   - Client Name
   - Project Date
   - Technologies Used
4. Assign portfolio categories if needed
5. Publish

#### Services
1. Go to **Services > Add New**
2. Add title, content, and featured image
3. Fill in the Service Details:
   - Service Price
   - Service Duration
   - Service Features (one per line)
4. Assign service categories if needed
5. Publish

#### Testimonials
1. Go to **Testimonials > Add New**
2. Add the testimonial content in the editor
3. Fill in the Testimonial Details:
   - Client Name
   - Client Position
   - Client Company
   - Rating (1-5 stars)
4. Add client photo as featured image
5. Publish

### Shortcodes

#### Portfolio Shortcode
```php
[temoakte_portfolio limit="6" category="web-design" columns="3"]
```

**Parameters:**
- `limit` - Number of items to show (default: 6)
- `category` - Portfolio category slug to filter by
- `columns` - Number of columns (2, 3, or 4)

#### Services Shortcode
```php
[temoakte_services limit="6" category="development" columns="3"]
```

**Parameters:**
- `limit` - Number of items to show (default: 6)
- `category` - Service category slug to filter by
- `columns` - Number of columns (2, 3, or 4)

#### Testimonials Shortcode
```php
[temoakte_testimonials limit="3" columns="3"]
```

**Parameters:**
- `limit` - Number of items to show (default: 3)
- `columns` - Number of columns (1, 2, or 3)

#### Contact Form Shortcode
```php
[temoakte_contact_form title="Contact Us" button_text="Send Message"]
```

**Parameters:**
- `title` - Form title (default: "Contact Us")
- `button_text` - Submit button text (default: "Send Message")

### Theme Customization

1. Go to **Appearance > Customize**
2. Look for the **Temoakte Settings** section
3. Customize:
   - Primary and secondary colors
   - Hero section content
   - Contact information
   - Social media links
   - Footer text

### Widgets

The theme includes custom widget areas:
- **Temoakte Sidebar**
- **Temoakte Footer 1, 2, 3**

Go to **Appearance > Widgets** to add content to these areas.

### Menus

Register these menu locations:
1. **Primary Navigation** - Main header menu
2. **Footer Menu** - Footer links
3. **Footer Secondary** - Secondary footer links (Privacy, Terms, etc.)

Go to **Appearance > Menus** to create and assign menus.

## Customization

### CSS Customization

The theme uses CSS custom properties for easy color customization:

```css
:root {
  --temoakte-primary: #3b82f6;
  --temoakte-secondary: #1e40af;
  --temoakte-accent: #f59e0b;
  --temoakte-text: #1f2937;
  --temoakte-bg: #ffffff;
  --temoakte-border: #e5e7eb;
}
```

### Adding Custom CSS

1. Go to **Appearance > Customize > Additional CSS**
2. Add your custom styles
3. Use the Temoakte CSS classes for consistency

### Custom Templates

You can override any template by creating files in your child theme:

- `single-temoakte_portfolio.php` - Single portfolio template
- `archive-temoakte_portfolio.php` - Portfolio archive template
- `single-temoakte_services.php` - Single service template
- And more...

### Hooks and Filters

The theme provides several hooks for customization:

```php
// Add custom content after hero section
add_action('temoakte_after_hero', 'your_custom_function');

// Modify portfolio query
add_filter('temoakte_portfolio_query_args', 'your_filter_function');

// Customize contact form fields
add_filter('temoakte_contact_form_fields', 'your_fields_function');
```

## File Structure

```
blocksy-child/
├── style.css                 # Main stylesheet with theme info
├── functions.php            # Theme functions and features
├── js/
│   └── temoakte-custom.js   # Custom JavaScript functionality
├── header-temoakte.php      # Custom header template
├── footer-temoakte.php      # Custom footer template
├── templates/               # Custom page templates
├── inc/                     # Additional PHP includes
└── assets/                  # Images, fonts, etc.
```

## JavaScript API

### Contact Form

```javascript
// Custom validation
document.addEventListener('temoakte_form_validate', function(e) {
    // Your custom validation logic
});

// After successful submission
document.addEventListener('temoakte_form_success', function(e) {
    // Your success handler
});
```

### Portfolio Filter

```javascript
// Custom portfolio filter
TemoaktePortfolio.addFilter('category-name', function(items) {
    // Your filter logic
    return filteredItems;
});
```

## AJAX Endpoints

### Contact Form Submission
- **Action**: `temoakte_contact_form`
- **Method**: POST
- **Parameters**: name, email, subject, message, nonce

### Search
- **Action**: `temoakte_search`
- **Method**: POST
- **Parameters**: query, nonce

## Troubleshooting

### Common Issues

1. **Styles not loading**
   - Clear cache
   - Check if parent theme is active
   - Verify file permissions

2. **Custom post types not showing**
   - Go to **Settings > Permalinks** and click "Save Changes"
   - Check if theme is properly activated

3. **JavaScript not working**
   - Check browser console for errors
   - Ensure jQuery is loaded
   - Verify AJAX URL is correct

### Debug Mode

Add this to your `wp-config.php` for debugging:

```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

## Performance Optimization

### Recommended Plugins
- **WP Rocket** - Caching
- **Smush** - Image optimization
- **WP Optimize** - Database cleanup

### Built-in Optimizations
- Lazy loading images
- Minified CSS and JS (in production)
- Optimized database queries
- Conditional script loading

## Browser Support

- Chrome 60+
- Firefox 60+
- Safari 12+
- Edge 79+
- iOS Safari 12+
- Android Chrome 60+

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## License

This theme is licensed under the GPL v2 or later.

## Support

For support and questions:
- Check the documentation above
- Submit issues on GitHub
- Contact support team

## Changelog

### Version 1.0.0
- Initial release
- Custom post types (Portfolio, Services, Testimonials)
- Shortcode system
- Theme customizer integration
- AJAX contact form
- Responsive design
- JavaScript interactions
- Performance optimizations

---

**Made with ❤️ by Temoakte Team**