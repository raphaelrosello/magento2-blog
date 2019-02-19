<?php


namespace Rrosello\Blog\Controller\Adminhtml\Post;


use Magento\Backend\App\Action;
use Rrosello\Blog\Api\Data\PostInterface;
use Rrosello\Blog\Api\PostRepositoryInterface;
use Rrosello\Blog\Model\Post;

class Delete extends Action
{

    protected $postRepository;

    public function __construct(
        Action\Context $context,
        PostRepositoryInterface $postRepository
    )
    {
        $this->postRepository = $postRepository;
        parent::__construct($context);
    }

    public function execute()
    {
        // check if we know what should be deleted
        $post_id = $this->getRequest()->getParam('post_id');

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        if($post_id) {
            try {
                $this->postRepository->deleteById($post_id);

                // display success message
                $this->messageManager->addSuccessMessage(__('The post has been deleted.'));

                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['post_id' => $post_id]);
            }
        }

        $this->messageManager->addErrorMessage('We can\'t find the post to delete');

        return $resultRedirect->setPath('*/*/');

    }

    /**
     * @inheritdoc
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Rrosello_Blog::delete');
    }

}