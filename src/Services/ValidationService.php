<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Services;


use Illuminate\Support\Str;

class ValidationService
{
    /**
     * get validation message
     *
     * @param   string  $attribute
     * @param   string  $rule
     * @param   array   $placeholders
     * @return  string
     */
    public function getMessage($attribute, $rule, $placeholders = null)
    {
        $lowerRule = Str::snake($rule);

        // custom validation message check
        $customKey = "validation.custom.{$attribute}.{$lowerRule}";
        $customMessage = trans($customKey);
        if ($customMessage !== $customKey) {
            return $customMessage;
        }

        // finally default validation message
        $messageKey = "validation.{$lowerRule}";
        $attributeKey = "validation.attributes.{$attribute}";
        if (is_null($placeholders)) {
            return str_replace([':attribute'], [trans($attributeKey)], trans($messageKey));
        }

        $placeholders[':attribute'] = trans($attributeKey);
        $keys = array_keys($placeholders);
        $values = array_values($placeholders);
        return str_replace($keys, $values, trans($messageKey));
    }
}