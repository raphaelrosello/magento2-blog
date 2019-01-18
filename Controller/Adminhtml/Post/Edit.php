<?php


namespace Raphaelrosello\Blog\Controller\Adminhtml\Post;


use Magento\Backend\App\Action;
use Raphaelrosello\Blog\Api\PostRepositoryInterface;

class Edit extends Action
{

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var PostRepositoryInterface
     */
    protected $postRepository;

    /**
     * @param Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Registry $registry
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry,
        PostRepositoryInterface $postRepository
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        $this->postRepository = $postRepository;
        parent::__construct($context);
    }

    /**
     * Init actions
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function _initAction()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage
            ->setActiveMenu('Raphaelrosello_Blog::post')
            ->addBreadcrumb('Blog', 'Blog')
            ->addBreadcrumb('Manage Blog Posts', 'Manage Blog Posts');

        return $resultPage;
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function execute()
    {
        $post_id = $this->getRequest()->getParam('post_id');

        if(!$post_id) {

            $this->messageManager->addErrorMessage('This post no longer exists.');
            $resultRedirect = $this->resultRedirectFactory->create();

            return $resultRedirect->setPath('*/*/');
        }

        $post = $this->postRepository->getById($post_id);
        $this->_coreRegistry->register('blog_post', $post);

        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $post_id ? 'Edit Post' : 'New Post',
            $post_id ? 'Edit Post' : 'New Post'
        );

        $resultPage->getConfig()->getTitle()->prepend(__('Pages'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getPostId() ? $model->getTitle() : __('New Page'));

        return $resultPage;
    }

}