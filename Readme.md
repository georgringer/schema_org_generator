# TYPO3 Extension `schema_org_generator`

This extensions generates json-ld from models and is currently just a PoC.

## Installation

- Do `composer require spatie/schema-org`
- Install this extension

## Requirements

- TYPO3 10,11,12
- PHP 7.2+

## Usage

### Basic usage

In your site template you can write:

```
<schema:jsonLd type="webSite" data="{url:'https://www.tld.com'}" />
```
This will output
```
<script type="application/ld+json">
    {"@context":"https:\/\/schema.org","@type":"WebSite","url":"https:\/\/www.tld.com"}
</script>
```


As type you can use any type available at https://github.com/spatie/schema-org/tree/master/src

### Map models to json+ld

Currently only `tt_address` is supported. Add this snippet to your `ListItem.html`:
Currently it will only output the property `email`.

```
<schema:objectToJsonLd object="{address}" />
```

This will output
```
<script type="application/ld+json">
    {"@context":"https:\/\/schema.org","@graph":[{"@type":"PostalAddress","email":"mailus@email.com"}]}
</script>
```
