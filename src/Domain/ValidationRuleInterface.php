<?php

namespace ToniIlic\WCCartRules\Domain;

defined( 'ABSPATH' ) || exit;

use WC_Cart;

interface ValidationRuleInterface
{
    /**
     * Determine if the rule applies to the current context.
     *
     * @return bool
     */
    public function shouldApply(): bool;

    /**
     * Validate the cart against this rule.
     *
     * @param WC_Cart $cart
     * @return ValidationResult
     */
    public function validate(WC_Cart $cart): ValidationResult;
}
