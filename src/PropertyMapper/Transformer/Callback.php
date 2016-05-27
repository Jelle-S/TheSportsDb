<?php
/**
 * @file
 * Contains heSportsDb\PropertyMapper\Transformer\Callback.
 */
namespace TheSportsDb\PropertyMapper\Transformer;

use FastNorth\PropertyMapper\Transformer\TransformerInterface;

/**
 * Callback transformer
 *
 * @author Jelle Sebreghts
 */
class Callback implements TransformerInterface
{
    /**
     * Transforming method.
     *
     * @param callable
     */
    private $transform;

    /**
     * Reversing method.
     *
     * @param callable
     */
    private $reverse;

    /**
     * Constructor.
     *
     * @param callable $transform
     * @param callable $reverse
     */
    public function __construct(callable $transform, callable $reverse)
    {
        $this->transform = $transform;
        $this->reverse   = $reverse;
    }

    /**
     * {@inheritdoc}
     */
    public function transform($value, $context)
    {
        return call_user_func_array($this->transform, [$value, $context]);
    }

    /**
     * {@inheritdoc}
     */
    public function reverse($value, $context)
    {
        return call_user_func_array($this->reverse, [$value, $context]);
    }
}
