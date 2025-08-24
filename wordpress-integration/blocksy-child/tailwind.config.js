/** @type {import('tailwindcss').Config} */
export default {
  // Tailwind CSS v4 Configuration
  content: [
    './**/*.php',
    './**/*.html',
    './**/*.js',
    './js/**/*.js',
    // Add other file patterns as needed
  ],
  
  // Tailwind CSS v4 uses @theme directive in CSS instead of JS config
  // But we can still override here if needed
  theme: {
    extend: {
      // Custom Temoakte Color System
      colors: {
        temoakte: {
          // Primary Blues
          primary: {
            50: '#eff6ff',
            100: '#dbeafe',
            200: '#bfdbfe',
            300: '#93c5fd',
            400: '#60a5fa',
            500: '#3b82f6', // Main primary
            600: '#2563eb',
            700: '#1d4ed8',
            800: '#1e40af',
            900: '#1e3a8a',
            950: '#172554',
          },
          
          // Secondary Colors
          secondary: {
            50: '#f0f9ff',
            100: '#e0f2fe',
            200: '#bae6fd',
            300: '#7dd3fc',
            400: '#38bdf8',
            500: '#0ea5e9',
            600: '#0284c7',
            700: '#0369a1',
            800: '#1e40af', // Main secondary
            900: '#1e3a8a',
            950: '#0c4a6e',
          },
          
          // Accent Orange
          accent: {
            50: '#fffbeb',
            100: '#fef3c7',
            200: '#fde68a',
            300: '#fcd34d',
            400: '#fbbf24',
            500: '#f59e0b', // Main accent
            600: '#d97706',
            700: '#b45309',
            800: '#92400e',
            900: '#78350f',
            950: '#451a03',
          },
          
          // Neutral Grays
          text: {
            50: '#f9fafb',
            100: '#f3f4f6',
            200: '#e5e7eb',
            300: '#d1d5db',
            400: '#9ca3af',
            500: '#6b7280',
            600: '#4b5563',
            700: '#374151',
            800: '#1f2937', // Main text
            900: '#111827',
            950: '#030712',
          },
          
          // Border and Background
          border: '#e5e7eb',
          bg: '#ffffff',
        }
      },
      
      // Custom Font Families
      fontFamily: {
        temoakte: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
        'temoakte-display': ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
        'temoakte-mono': ['JetBrains Mono', 'ui-monospace', 'SFMono-Regular', 'monospace'],
      },
      
      // Custom Spacing Scale
      spacing: {
        'temoakte-xs': '0.5rem',
        'temoakte-sm': '1rem',
        'temoakte-md': '1.5rem',
        'temoakte-lg': '2rem',
        'temoakte-xl': '3rem',
        'temoakte-2xl': '4rem',
        'temoakte-3xl': '6rem',
      },
      
      // Custom Border Radius
      borderRadius: {
        'temoakte-card': '0.75rem',
        'temoakte-button': '0.5rem',
        'temoakte-input': '0.375rem',
        'temoakte-modal': '1rem',
      },
      
      // Custom Box Shadows
      boxShadow: {
        'temoakte-card': '0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1)',
        'temoakte-card-hover': '0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1)',
        'temoakte-button': '0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1)',
        'temoakte-modal': '0 25px 50px -12px rgb(0 0 0 / 0.25)',
      },
      
      // Custom Animation Durations
      transitionDuration: {
        'temoakte-fast': '150ms',
        'temoakte-normal': '300ms',
        'temoakte-slow': '500ms',
      },
      
      // Custom Animation Curves
      transitionTimingFunction: {
        'temoakte-bounce': 'cubic-bezier(0.68, -0.55, 0.265, 1.55)',
        'temoakte-smooth': 'cubic-bezier(0.4, 0, 0.2, 1)',
      },
      
      // Custom Breakpoints (if needed)
      screens: {
        'temoakte-mobile': '480px',
        'temoakte-tablet': '768px',
        'temoakte-desktop': '1024px',
        'temoakte-wide': '1280px',
        'temoakte-ultra': '1536px',
      },
      
      // Custom Container Sizes
      container: {
        center: true,
        padding: {
          DEFAULT: '1rem',
          sm: '1.5rem',
          lg: '2rem',
          xl: '2.5rem',
          '2xl': '3rem',
        },
        screens: {
          sm: '640px',
          md: '768px',
          lg: '1024px',
          xl: '1280px',
          '2xl': '1400px',
        },
      },
    },
  },
  
  // Tailwind CSS v4 Plugins
  plugins: [
    // Add plugins here if needed
  ],
  
  // Dark mode configuration
  darkMode: 'class', // or 'media'
  
  // Prefix for CSS classes (optional)
  // prefix: 'tw-',
  
  // Important selector (optional)
  // important: true,
  
  // Separator for variant modifiers (optional)
  // separator: ':',
  
  // Core plugins to disable (optional)
  corePlugins: {
    // Disable core plugins if needed
    // preflight: false,
  },
  
  // Safelist for dynamic classes
  safelist: [
    // Add classes that should never be purged
    'temoakte-btn',
    'temoakte-btn-primary',
    'temoakte-btn-secondary',
    'temoakte-btn-large',
    'temoakte-card',
    'temoakte-grid',
    'temoakte-grid-2',
    'temoakte-grid-3',
    'temoakte-grid-4',
    'temoakte-content',
    // Animation classes
    'animate-spin',
    'animate-pulse',
    'animate-bounce',
    // Responsive classes
    {
      pattern: /^(sm|md|lg|xl|2xl):/,
    },
    // State classes
    {
      pattern: /^(hover|focus|active|disabled):/,
    },
  ],
};