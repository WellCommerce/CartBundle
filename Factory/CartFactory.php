<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 * 
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 * 
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\CartBundle\Factory;

use Doctrine\Common\Collections\ArrayCollection;
use WellCommerce\Bundle\CartBundle\Entity\CartInterface;
use WellCommerce\Bundle\CartBundle\Entity\CartTotals;
use WellCommerce\Bundle\DoctrineBundle\Factory\AbstractEntityFactory;

/**
 * Class CartFactory
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class CartFactory extends AbstractEntityFactory
{
    /**
     * @var string
     */
    protected $supportsInterface = CartInterface::class;

    /**
     * @return CartInterface
     */
    public function create() : CartInterface
    {
        /** @var $cart CartInterface */
        $cart = $this->init();
        $cart->setProducts(new ArrayCollection());
        $cart->setTotals(new CartTotals());
        $cart->setShippingMethodCost(null);
        $cart->setPaymentMethod(null);
        $cart->setCopyAddress(true);
        $cart->setCoupon(null);
        $cart->setCurrency($this->getRequestHelper()->getCurrentCurrency());
        $cart->setSessionId($this->getRequestHelper()->getSessionId());

        return $cart;
    }
}
