<?php


namespace Raphaelrosello\Blog\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Post extends AbstractDb
{

    /**
     * Initialize resource model
     */
    protected function _construct()
    {
        $this->_init('raphaelrosello_blog_post', 'post_id');
    }

    protected function _getLoadSelect($field, $value, $object)
    {
        $select = parent::_getLoadSelect($field, $value, $object);

        if($object->getStoreId()) {
            $select->where('status = ?', 1)
                ->limit(1);
        }
    }

}