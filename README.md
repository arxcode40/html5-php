# HTML5 PHP

## Description
Helper for generate HTML5 element.

## Syntax
```php
html5(
    string $tag = 'doctype',
    array $attributes = [],
    mixed ...$children
): string
```

## Parameters
**tag**
: The HTML5 tag.

**attributes**
: The HTML5 attributes.

**children**
: The HTML5 children.

## Return Values
Return the HTML5 element.

## Examples
**Example #1: Basic example**

```php
echo html5('div', ['class' => 'row'],
    html5('div', ['class' => ['col-sm-8', 'col-md-6']], '')
);
```
```html
<div class="row">
    <div class="col-sm-8 col-md-6"></div>
</div>
```

**Example #2: Doctype declaration**
```php
echo html5();
```
```html
<!DOCTYPE html>
```

**Example #3: Multiple children**
```php
echo html5('ul', [],
    html5('li', [], ''),
    html5('li', [], '')
);
```
```html
<ul>
    <li></li>
    <li></li>
</ul>
```

**Example #4: Self-closing tags**
```php
echo html5('input', [
    'required' => true,
    'style' => [
        'display' => 'block'
    ],
    'type' => 'text'
]);
```
```html
<input required style="display:block;" type="text">
```
