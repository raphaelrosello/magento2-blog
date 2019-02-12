<?php


namespace Raphaelrosello\Blog\Api\Data;


interface PostSearchInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get blog list
     * @return \Raphaelrosello\Blog\Api\Data\PostInterface[]
     */
    public function getItems();

    /**
     * @param \Raphaelrosello\Blog\Api\Data\PostInterface[] $items
     * @return $this
     */
    public function setItems(array $items);

}