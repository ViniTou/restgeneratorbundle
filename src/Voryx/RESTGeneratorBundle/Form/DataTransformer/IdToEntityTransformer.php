<?php

namespace Voryx\RESTGeneratorBundle\Form\DataTransformer;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\DataTransformerInterface;

class IdToEntityTransformer implements DataTransformerInterface
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var string Name spaced entity
     */
    private $class;

    /**
     * @param EntityManager $em
     * @param string        $class
     */
    public function __construct(EntityManager $em, $class)
    {
        $this->em = $em;
        $this->class = $class;
    }

    /**
     * @param mixed $data
     *
     * @return mixed
     */
    public function transform($data)
    {
        return $data;
    }

    /**
     * Transforms a string or array into an id.
     */
    public function reverseTransform($data)
    {
        if (!$data) {
            return null;
        }

        if (is_scalar($data)) {
            $repository = $this->getEm()->getRepository($this->getClass());
            return $repository->find($data);
        }

        if (is_array($data)) {
            $repository = $this->getEm()->getRepository($this->getClass());
            return new ArrayCollection($repository->findBy(['id' => $data]));
        }

        return null;

    }

    /**
     * @return EntityManager
     */
    public function getEm()
    {
        return $this->em;
    }

    /**
     * @param EntityManager $em
     */
    public function setEm($em)
    {
        $this->em = $em;
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param string $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }
}
