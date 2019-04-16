<?php
declare(strict_types=1);

namespace GeorgRinger\SchemaOrgGenerator\Transformator;

/**
 * This file is part of the "schema_org_generator" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use Spatie\SchemaOrg\Type;
use TYPO3\CMS\Extbase\DomainObject\DomainObjectInterface;

interface TransformatorInterface
{

    /**
     * Check if the transformator can handle incoming argument
     *
     * @param mixed $in
     * @return bool
     */
    public function canHandle($in): bool;

    /**
     * @param string $link
     * @param array $extraData
     */
    public function initialize(string $link = '', array $extraData = []):void;

    /**
     * Transform input to Schema type
     *
     * @param $in
     * @return Type|null
     */
    public function transform($in): ?Type;
}
