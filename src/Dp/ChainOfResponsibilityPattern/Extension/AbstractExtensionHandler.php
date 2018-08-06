<?php
namespace Dp\ChainOfResponsibilityPattern\Extension;


abstract class AbstractExtensionHandler
{
    /**
     * @var AbstractExtensionHandler
     */
    private $nextHandler;

    /**
     * @param AbstractExtensionHandler $nextHandler
     */
    public function setNextHandler($nextHandler)
    {
        if (null === $this->nextHandler) {
            $this->nextHandler = $nextHandler;
            return $this;
        }

        $this->nextHandler->setNextHandler($nextHandler);
        return $this;
    }

    public function getExtension($fileContent)
    {
        $extension = $this->findExtension($fileContent);
        if (null !== $extension) {
            return $extension;
        }

        if (!$this->nextHandler) {
            //throw new \RuntimeException('Next handler not found. Current handler : ' . get_class($this));
            return null;
        }

        return $this->nextHandler->getExtension($fileContent);
    }

    /**
     * @return string|null
     */
    abstract protected function findExtension($fileContent);
}