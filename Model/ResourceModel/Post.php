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

}