<?php


namespace Rrosello\Blog\Model\ResourceModel\Tag;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'tag_id';

    protected function _construct()
    {
        $this->_init(
            'Rrosello\Blog\Model\Tag',
            'Rrosello\Blog\Model\ResourceModel\Tag'
        );
    }

}