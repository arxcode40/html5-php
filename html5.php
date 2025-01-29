<?php

if (!function_exists('html5')) {
	function html5($tag = 'doctype', $attributes = [], ...$children) {
		$tag = strtolower($tag);

		if ($tag === 'doctype') {
			return '<!DOCTYPE html>';
		}

		$attributes = implode(' ', array_map(function ($name, $value) {
			$name = strtolower($name);

			switch ($name) {
				case 'class':
					if (is_array($value)) {
						$value = implode(' ', $value);
					}
					break;

				case 'style':
					if (is_array($value)) {
						$value = implode('', array_map(function($property, $value) {
							$property = strtolower($property);

							return sprintf('%s:%s;', $property, $value);
						}, array_keys($value), array_values($value)));
					}
					break;
				
				default:
					break;
			}

			if (!is_bool($value)) {
				return sprintf('%s="%s"', $name, $value);
			}

			return $value ? $name : '';
		}, array_keys($attributes), array_values($attributes)));

		if (!empty($attributes)) {
			$attributes = sprintf(' %s', $attributes);
		}

		if (!$children) {
			return sprintf('<%s%s>', $tag, $attributes);
		}

		$children = implode('', $children);

		return sprintf('<%s%s>%s</%s>', $tag, $attributes, $children, $tag);
	}
}
