Router
===

 Router is onepiece-framework's unit.

# Usage

# Methods

## EndPoint

 Get end-point file path.

```php
$endpoint = \OP\Unit::Singleton('Router')->EndPoint();
```

## Args

 Get SmartURL arguments.

```php
$args = \OP\Unit::Singleton('Router')->Args();
```

## G11n

 G11n is get locale code.

```php
$locale = \OP\Unit::Singleton('Router')->G11n();
list($country, $language) = explode(':', $locale);
```

### Notice

 Globalization is not Multilingalization.
 World Wide Web is connecting of world wide people.
 People from all over the world visit your site.

 Internationalization is not Multilingalization.
 Multilingualization is one manifestation of in that policy.

 Localization is local area unique settings.
 For example currency, tax, holiday.
