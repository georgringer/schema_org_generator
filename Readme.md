# TYPO3 Extension `schema_org_generator`

This extensions generates json-ld from models and is currently just a PoC.

## Installation

- Do `composer require spatie/schema-org`
- Install this extension

## Usage

### Basic usage

In your site template you can write:

```
<schema:jsonLd type="webSite" data="{url:'https://www.tld.com'}" />
```

As type you can use any type available at https://github.com/spatie/schema-org/tree/master/src

### Map models to json+ld

Currently only `tt_address` is supported. Add this snippet to your `ListItem.html`:

```
<schema:objectToJsonLd object="{address}" />
```

Currently it will only output the property `email`.


