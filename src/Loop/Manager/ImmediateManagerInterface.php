<?php

/*
 * This file is part of Icicle, a library for writing asynchronous code in PHP using promises and coroutines.
 *
 * @copyright 2014-2015 Aaron Piotrowski. All rights reserved.
 * @license Apache-2.0 See the LICENSE file that was distributed with this source code for more information.
 */

namespace Icicle\Loop\Manager;

use Icicle\Loop\Events\ImmediateInterface;

interface ImmediateManagerInterface
{
    /**
     * Creates an immediate object connected to the manager.
     *
     * @param callable $callback
     * @param mixed[]|null $args
     *
     * @return \Icicle\Loop\Events\ImmediateInterface
     */
    public function create(callable $callback, array $args = null);

    /**
     * Puts the immediate in the loop again for execution.
     *
     * @param \Icicle\Loop\Events\ImmediateInterface $immediate
     */
    public function execute(ImmediateInterface $immediate);

    /**
     * Cancels the immeidate.
     *
     * @param \Icicle\Loop\Events\ImmediateInterface $immediate
     */
    public function cancel(ImmediateInterface $immediate);

    /**
     * Determines if the immediate is active in the loop.
     *
     * @param \Icicle\Loop\Events\ImmediateInterface $immediate
     *
     * @return bool
     */
    public function isPending(ImmediateInterface $immediate);

    /**
     * Determines if any immediates are pending in the manager.
     *
     * @return bool
     */
    public function isEmpty();

    /**
     * Clears all pending immediates from the manager.
     */
    public function clear();

    /**
     * Calls the next pending immediate. Returns true if an immediate was executed, false if not.
     *
     * @return bool
     */
    public function tick();
}
