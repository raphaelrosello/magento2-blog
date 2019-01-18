<?php


namespace Raphaelrosello\Blog\Controller\Adminhtml\Post;


use Magento\Backend\App\Action;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\StateException;
use Raphaelrosello\Blog\Api\PostRepositoryInterface;
use Raphaelrosello\Blog\Model\Post;
use Raphaelrosello\Blog\Model\PostFactory;

class Save extends Action
{

    /**
     * @var PostRepositoryInterface
     */
    protected $postRepository;

    protected $postFactory;

    public function __construct(
        Action\Context $context,
        PostRepositoryInterface $postRepository,
        PostFactory $postFactory
    )
    {
        $this->postRepository = $postRepository;
        $this->postFactory = $postFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        $resultRedirect = $this->resultRedirectFactory->create();

        if($data) {
            if (isset($data['is_active']) && $data['is_active'] === 'true') {
                $data['is_active'] = Post::STATUS_ENABLED;
            }

            $model = $this->postFactory->create();

            $id = $this->getRequest()->getParam('post_id');

            if($id) {
                $model = $this->postRepository->getById($id);
            }

            $model->setData($data);

            try {
                $this->postRepository->save($model);
                $this->messageManager->addSuccessMessage('Blog post has been saved');

            } catch (CouldNotSaveException $couldNotSaveException) {
                $this->messageManager->addExceptionMessage($couldNotSaveException);
            } catch (InputException $inputException) {
                $this->messageManager->addExceptionMessage($inputException);
            } catch (StateException $stateException) {
                $this->messageManager->addExceptionMessage($stateException);

            }

            return $resultRedirect->setPath('*/*/edit', ['post_id' => $this->getRequest()->getParam('post_id')]);

        }

        return $resultRedirect->setPath('*/*/');
    }


}