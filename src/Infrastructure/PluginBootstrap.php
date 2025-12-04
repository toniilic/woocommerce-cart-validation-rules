<?php

namespace ToniIlic\WCCartRules\Infrastructure;

defined( 'ABSPATH' ) || exit;

use ToniIlic\WCCartRules\Domain\ValidationRuleInterface;
use ToniIlic\WCCartRules\Domain\Rules\MaxQuantityRule;

class PluginBootstrap
{
    private array $rules = [];

    public function init(): void
    {
        $this->registerRules();
        
        // Hook into WooCommerce checkout validation
        add_action('woocommerce_check_cart_items', [$this, 'validateCart']);
    }

    private function registerRules(): void
    {
        // In a real app, this could be dynamic or from a container
        // $this->rules[] = new MaxQuantityRule(10); 
    }

    public function validateCart(): void
    {
        if (is_admin() && !defined('DOING_AJAX')) {
            return;
        }

        $cart = WC()->cart;

        foreach ($this->rules as $rule) {
            /** @var ValidationRuleInterface $rule */
            if ($rule->shouldApply()) {
                $result = $rule->validate($cart);
                
                if (!$result->isValid()) {
                    wc_add_notice($result->getErrorMessage(), 'error');
                }
            }
        }
    }
}
