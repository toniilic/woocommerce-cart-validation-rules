# WooCommerce Cart Validation Rules

A robust, modular WordPress plugin designed to enforce complex cart validation rules in WooCommerce. This solution allows developers and store managers to implement custom logic for checkout eligibility without cluttering `functions.php`.

## The Problem

WooCommerce provides basic validation, but complex business requirements often lead to "spaghetti code" in theme files. Common requirements like:
- "Minimum order quantity for wholesale users"
- "Specific products cannot be shipped to certain zones"
- "Conflict resolution between specific product categories"

Often result in unmaintainable `woocommerce_check_cart_items` hooks.

## The Solution

This plugin introduces a `RuleEngine` architecture. Rules are isolated classes implementing a `ValidationRuleInterface`, making them testable, reusable, and easy to manage.

## Features

- **SOLID Architecture**: Rules are single-responsibility classes.
- **Extensible**: Add new rules by registering them in the container.
- **Performance**: Validations run only when necessary.
- **Developer Friendly**: PSR-4 autoloading and typed interfaces.

## Installation

1. Clone this repository into `wp-content/plugins/`.
2. Run `composer install` to generate the autoloader.
3. Activate the plugin via WordPress Admin.

## Usage Example

```php
use ToniIlic\WCCartRules\Domain\Rule;

class MinimumQuantityRule implements Rule {
    public function validate(Cart $cart): bool {
        // Implementation
    }
}
```
