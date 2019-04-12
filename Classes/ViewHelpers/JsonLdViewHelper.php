<?php

namespace GeorgRinger\SchemaOrgGenerator\ViewHelpers;

use Spatie\SchemaOrg\Schema;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

class JsonLdViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;

    /**
     * @var boolean
     */
    protected $escapeOutput = false;

    /**
     * Initialize arguments
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('type', 'string', 'Schema org type', true);
        $this->registerArgument('data', 'array', 'Data', true);
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return int
     */
    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    )
    {
        $schemaType = $arguments['type'];
        /** @var \Spatie\SchemaOrg\Type $schemaOrg */
        $schemaOrg = Schema::$schemaType();
        $schemaOrg->addProperties($arguments['data']);
        return $schemaOrg->toScript();
    }
}
