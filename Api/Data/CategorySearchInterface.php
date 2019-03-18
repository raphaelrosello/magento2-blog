<?php


namespace Rrosello\Blog\Api\Data;


interface CategorySearchInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get blog list
     * @return \Rrosello\Blog\Api\Data\CategoryInterface[]
     */
    public function getItems();

    /**
     * @param \Rrosello\Blog\Api\Data\CategoryInterface[] $items
     * @return $this
     */
    public function setItems(array $items);

}