<?php

declare(strict_types=1);

namespace GeorgRinger\SchemaOrgGenerator\Transformator;

use Spatie\SchemaOrg\Type;
use TYPO3\CMS\Extbase\DomainObject\DomainObjectInterface;

interface TransformatorInterface
{

    public function canHandle($in): bool;

    public function transform($in): Type;
}
