<?php


namespace Raphaelrosello\Blog\Model\ResourceModel\Post;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'post_id';

    protected function _construct()
    {
        $this->_init(
            'Raphaelrosello\Blog\Model\Post',
            'Raphaelrosello\Blog\Model\ResourceModel\Post'
        );
    }
}