# Craft Field Connector Module

The **craft-field-connector** is a key component in our software architecture that plays a crucial role in enabling
communication between different services concerning data transmission.

## Overview

Applications often interact with several disparate services, each requiring different types of data. This diversity can
lead to confusion on the type of data being transmitted between these services. The `craft-field-connector` module's
primary purpose is to solve this problem.

## Functionality

The role of the module is to label the data before it's transmitted. This label provides an identification to the
receiving service about the type of data it is, thereby allowing the service to process it accordingly. This labeling
ensures robust integration between multiple services and improves our system's reliability.

Irrespective of the variety in services, the module allows the receiving services to understand the type of data being
transferred, reducing possible misinterpretations among services and ensuring a smoother user experience.

## Usage

Using the `craft-field-connector` module is intuitive and straightforward. Here is a high-level illustration of how it
can be integrated into your services:

First, you need to import the module:

```php
use CraftFieldConnector\Enums\FieldType;
```

## Examples
### Example 1: Matching a Craft field to a FieldType enum
This example demonstrates how to match a Craft CMS field instance to a corresponding `FieldType` enum case.

```php
use craft\fields\PlainText;
use CraftFieldConnector\Enums\FieldType;

$field = new PlainText();
$fieldType = FieldType::matchFromCraftField($field);

echo $fieldType->value; // Output: "plainText"
```

### Example 2: Checking if a FieldType is a Text Field
This example shows how to determine if a given `FieldType` is considered a text field.

```php
$fieldTypeValue = 'plainText';
$isTextField = FieldType::isTextField($fieldTypeValue);

echo $isTextField; // Output: True or false, in this case true.

```

### Example 3: Verifying if a FieldType Supports Iterable Operations
In this example, we check if a FieldType supports iterable operations.

```php
$fieldTypeValue = 'matrix';
$isIterable = FieldType::isIterable($fieldTypeValue);

echo $isIterable; // Output: True or false, in this case true.
```


### Example 4: Converting String Value to FieldType Enum
This example demonstrates how to convert a string value to a FieldType enum case.

```php
$fieldTypeValue = 'assets';
$fieldType = FieldType::fromType($fieldTypeValue);
```


### Example 5:
In this example, we demonstrate how to utilise the CraftFieldConnector to handle different field types within an entry and prepare an associative array with processed values.

The function fieldValuesBody(), accepts an $entry array, which contains a variety of fields. Each field is represented as a key-value pair, with the key being the field name and the value being another associative array comprising the fieldType and its value.

The function begins by creating an empty $body array. It then loops over the fields in the $entry, extracting the fieldType and value for each field.

The FieldType::fromType() method from the CraftFieldConnector is used to identify the specific field type. Then, depending on the field type, an accompanying method is invoked to appropriately process the fieldValue.

The processed value is then stored in the $body array, with the fieldName as its key. In situations where the fieldType is unrecognized, an exception is thrown, notifying you that a mapping for that particular field type could not be found.

With this function, you can handle numerous fields with different types in a streamlined manner, leveraging the CraftFieldConnector's enum checking capabilities for precision and accuracy. The function concludes by returning the populated $body array, granting you a neatly packaged mixed data bundle based on your entry's original structure and content.
```php
public function fieldValuesBody($entry): array
    {
        $body = [];
        $fields = $entry['fields'];

        foreach ($fields as $fieldName => $field) {
            $fieldType = FieldType::fromType($field['fieldType']);
            $fieldValue = $field['value'];

            match ($fieldType) {
                FieldType::Assets => $body[$fieldName] = $this->getAssetsTypeBody($fieldValue),
                FieldType::Blurhash => $body[$fieldName] = $this->getBlurhashTypeBody($fieldValue),
                FieldType::Categories => $body[$fieldName] = $this->getCategoriesTypeBody($fieldValue),
                FieldType::Checkboxes => $body[$fieldName] = $this->getCheckboxesTypeBody($fieldValue),
                FieldType::Ckeditor => $body[$fieldName] = $this->getCkeditorTypeBody($fieldValue),
                FieldType::Color => $body[$fieldName] = $this->getColorTypeBody($fieldValue),
                FieldType::Country => $body[$fieldName] = $this->getCountryTypeBody($fieldValue),
                FieldType::Date => $body[$fieldName] = $this->getDateTypeBody($fieldValue),
                FieldType::Dropdown => $body[$fieldName] = $this->getDropdownBody($fieldValue),
                FieldType::Email => $body[$fieldName] = $this->getEmailBody($fieldValue),
                FieldType::Embed => $body[$fieldName] = $this->getEmbedBody($fieldValue),
                FieldType::Entries => $body[$fieldName] = $this->getEntriesBody($fieldValue),
                FieldType::LightSwitch,
                FieldType::Lightswitch => $body[$fieldName] = $this->getLightSwitchBody($fieldValue),
                FieldType::Link => $body[$fieldName] = $this->getLinkBody($fieldValue),
                FieldType::Matrix => $body[$fieldName] = $this->getMatrixBody($fieldValue),
                FieldType::Money => $body[$fieldName] = $this->getMoneyBody($fieldValue),
                FieldType::MultiSelect => $body[$fieldName] = $this->getMultiSelectBody($fieldValue),
                FieldType::Number => $body[$fieldName] = $this->getNumberBody($fieldValue),
                FieldType::PlainText => $body[$fieldName] = $this->getPlainTextBody($fieldValue),
                FieldType::Position => $body[$fieldName] = $this->getPositionBody($fieldValue),
                FieldType::RadioButtons => $body[$fieldName] = $this->getRadioButtonsBody($fieldValue),
                FieldType::Redactor => $body[$fieldName] = $this->getRedactorBody($fieldValue),
                FieldType::SuperTable => $body[$fieldName] = $this->getSuperTableBody($fieldValue),
                FieldType::Table => $body[$fieldName] = $this->getTableBody($fieldValue),
                FieldType::Tags => $body[$fieldName] = $this->getTagsBody($fieldValue),
                FieldType::Time => $body[$fieldName] = $this->getTimeBody($fieldValue),
                FieldType::Url => $body[$fieldName] = $this->getUrlBody($fieldValue),
                FieldType::Users => $body[$fieldName] = $this->getUsersBody($fieldValue),
                default => throw new \Exception("Could not map field $fieldName of field type $fieldType->name"),
            };
        }

        return $body;
    }
```