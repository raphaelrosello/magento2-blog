<?php


namespace Rrosello\Blog\Ui\Post\Source;


use Magento\Framework\Option\ArrayInterface;
use Rrosello\Blog\Model\ResourceModel\Tag\Collection as TagCollectionFactory;

class Tags implements ArrayInterface
{
    /**
     * @var TagCollectionFactory
     */
    protected $collectionFactory;

    public function __construct(TagCollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;

    }

    public function toOptionArray()
    {
        $result = array();

        /** @var \Rrosello\Blog\Model\Tag $tag */
        foreach ($this->collectionFactory->getItems() as $tag) {
            $result[] = [
                'label' => $tag->getName(),
                'value' => $tag->getTagId()
            ];
        }

        return $result;
    }


}