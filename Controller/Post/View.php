<?php


namespace Raphaelrosello\Blog\Controller\Post;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\ForwardFactory;

class View extends Action
{
    protected $_resultForwardFactory;

    public function __construct(
        Context $context,
        ForwardFactory $_resultForwardFactory
    )
    {
        $this->_resultForwardFactory = $_resultForwardFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultForward = $this->_resultForwardFactory->create();
        return $resultForward->forward('noroute');

    }

}