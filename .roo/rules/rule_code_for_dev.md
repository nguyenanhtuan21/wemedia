# 📋 WordPress Theme Development Rules - AI Agent Format

## 🎯 Project Context

**Project Type:** WordPress Theme Development  
**Purpose:** Product showcase website for company  
**Your Role:** Software Architect with 10+ years experience  
**Environment:**
- OS: Windows 10
- Terminal: Git Bash

---

## 📁 Directory Structure


@wemedia/
├── sites/ # Resources, static files, libraries
│ ├── assets/
│ ├── libraries/
│ └── static/
└── wp-content/
└── themes/ # Theme code location
└── [your-theme]/


**Path Rules:**
- **Resources/Static/Libraries:** `@wemedia/sites/...`
- **Theme Code:** `@wemedia/wp-content/themes`

---

## 🎨 CSS Coding Standards

### Block Structure
All CSS blocks MUST be wrapped in region tags:

```css
#region BlockName
.block-name {
  /* Your styles here */
}
#endregion

Naming Conventions
Classes: camelCase (English only)
✅ .heroSection, .productCard, .navMenu
❌ .hero-section, .HeroSection
Quality Requirements
✅ Match design/screenshot pixel-perfect
✅ Accurate spacing, colors, typography
✅ Responsive across breakpoints
🏗️ HTML Coding Standards
Naming Conventions
Classes: camelCase (lowercase first letter)

✅ class="heroSection", class="productCard"
❌ class="HeroSection", class="hero-section"
IDs: PascalCase (uppercase first letter)

✅ id="MainHeader", id="ContactForm"
❌ id="mainHeader", id="main-header"
Language: English only

Structure Requirements
1. Minimize DOM Depth
❌ Avoid: <div><div><div><div><span>Content</span></div></div></div></div>
✅ Prefer: <div><span>Content</span></div>
2. Image Alt Attributes
ALL <img> tags MUST have contextual alt attributes:

<!-- ✅ Good -->
<img src="product.jpg" alt="Premium wireless headphones with noise cancellation">

<!-- ❌ Bad -->
<img src="product.jpg">
<img src="product.jpg" alt="image">

3. Block Structure Template
Every block MUST follow this pattern:

<section class="{block-name} common-padding">
  <div class="container">
    <div class="row">
      <!-- Your implementation code here -->
    </div>
  </div>
</section>

Example:

<section class="heroSection common-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Welcome to Our Product</h1>
      </div>
    </div>
  </div>
</section>

⚙️ JavaScript Coding Standards
Core Principles
Follow Coding Conventions

Use established JavaScript best practices
Consistent indentation and formatting
Write Clear, Explicit Code

Prioritize readability over cleverness
Use meaningful variable/function names
Comprehensive Comments Required

Document complex logic
Explain “why”, not just “what”
Example
/**
 * Initializes the product carousel with lazy loading
 * @param {string} selector - CSS selector for carousel container
 * @param {Object} options - Configuration options
 */
function initProductCarousel(selector, options) {
  // Get carousel container
  const carouselContainer = document.querySelector(selector);
  
  // Validate container exists
  if (!carouselContainer) {
    console.error(`Carousel container not found: ${selector}`);
    return;
  }
  
  // Initialize Swiper with lazy loading enabled
  const swiper = new Swiper(selector, {
    lazy: true,
    ...options
  });
  
  return swiper;
}

✅ Quality Checklist
Before Committing Code
CSS:

[ ] All blocks wrapped in #region / #endregion
[ ] Classes use camelCase
[ ] Styles match design specifications
[ ] Responsive breakpoints tested
HTML:

[ ] Classes use camelCase
[ ] IDs use PascalCase
[ ] DOM depth minimized
[ ] All <img> tags have contextual alt attributes
[ ] Blocks follow section > container > row pattern
[ ] Semantic HTML used appropriately

[ ] Follows coding conventions
[ ] Code is clear and explicit
[ ] Adequate comments present
[ ] No console errors
[ ] Cross-browser tested