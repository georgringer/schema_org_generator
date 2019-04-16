<?php
declare(strict_types=1);

namespace GeorgRinger\SchemaOrgGenerator\Transformator;

/**
 * This file is part of the "schema_org_generator" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use FriendsOfTYPO3\TtAddress\Domain\Model\Address;
use Spatie\SchemaOrg\Graph;
use Spatie\SchemaOrg\PostalAddress;
use Spatie\SchemaOrg\Schema;
use Spatie\SchemaOrg\Type;

/**
 * Transform tt_address Address model
 */
class TtAddressTransformator implements TransformatorInterface
{
    public function canHandle($in): bool
    {
        return $in instanceof Address;
    }

    /**
     * @param Address $address
     * @return Type
     */
    public function transform($address): Type
    {
        $graph = new Graph();

        $postalAddress = $this->mapPostalAddress($address);
        $graph->add($postalAddress);

        return $graph;
    }

    public function initialize(string $link = '', array $extraData = []): void
    {
        // TODO: Implement initialize() method.
    }


    /**
     * @param Address $address
     */
    protected function mapPostalAddress(Address $address): PostalAddress
    {
        $schemaAddress = Schema::postalAddress();

        $mapping = [
            'address' => 'streetAddress',
            'zip' => 'postalCode',
            'city' => 'addressLocality',
            'country' => 'addressCountry',
            'phone' => 'telephone', // todo + mobile
            'fax' => 'faxNumber',
            'position' => 'jobTitle',
            'www' => 'url', // todo simplified
            'birthday' => 'birthDate', // todo format %Y-%m-%d
            'email' => 'email',
        ];
        // + twitter, skype, facebook, linkedin
        // + images

        foreach ($mapping as $from => $to) {
            $getter = 'get' . ucfirst($from);
            $content = $address->$getter();
            if ($content) {
                $schemaAddress->setProperty($to, $content);
            }
        }
        return $schemaAddress;
    }

}
