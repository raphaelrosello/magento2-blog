<?php


namespace Rrosello\Blog\Model\Post\Source;


use Magento\Framework\Data\OptionSourceInterface;
use Rrosello\Blog\Model\Post;

class IsActive implements OptionSourceInterface
{

    /**
     * @var Post
     */
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function toOptionArray()
    {
        $options = [];
        $availableOptions = $this->post->getAvailableStatuses();

        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key
            ];
        }

        array_walk(
            $options,
            function (&$option) {
                $option['__disableTmpl'] = true;
            }
        );

        return $options;
    }


}
