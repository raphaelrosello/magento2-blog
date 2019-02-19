<?php


namespace Rrosello\Blog\Api\Data;


interface PostSearchInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get blog list
     * @return \Rrosello\Blog\Api\Data\PostInterface[]
     */
    public function getItems();

    /**
     * @param \Rrosello\Blog\Api\Data\PostInterface[] $items
     * @return $this
     */
    public function setItems(array $items);

}