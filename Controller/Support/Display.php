<?php

namespace SendCloud\SendCloud\Controller\Support;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;
use SendCloud\SendCloud\Services\BusinessLogic\SupportService;

/**
 * Class Display
 *
 * @package SendCloud\SendCloud\Controller\Support
 */
class Display extends Action implements HttpPostActionInterface
{
    /**
     * @var JsonFactory
     */
    private $resultJsonFactory;

    /**
     * @var SupportService
     */
    private $supportService;

    /**
     * Display Constructor.
     *
     * @param Context $context
     * @param JsonFactory $resultJsonFactory
     * @param SupportService $supportService
     * @param RequestInterface $request
     */
    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory,
        SupportService $supportService,
        RequestInterface $request
    )
    {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->supportService = $supportService;
        $this->request = $request;
    }

    /**
     * Displays configuration data.
     *
     * @return mixed
     */
    public function execute()
    {
        $body = json_decode($this->request->getContent(), true);

        return $this->resultJsonFactory->create()->setData($this->supportService->get($body));
    }
}
