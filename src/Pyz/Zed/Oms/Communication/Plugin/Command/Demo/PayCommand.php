<?php

namespace Pyz\Zed\Oms\Communication\Plugin\Command\Demo;

use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Spryker\Zed\Oms\Business\Util\ReadOnlyArrayObject;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Command\AbstractCommand;
use Spryker\Zed\Oms\Dependency\Plugin\Command\CommandByItemInterface;
use Spryker\Zed\Oms\Dependency\Plugin\Command\CommandByOrderInterface;

class PayCommand extends AbstractCommand implements CommandByItemInterface
{
    /**
     *
     * Command which is executed per order basis
     *
     * @api
     *
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderItem[] $orderItems
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrder $orderEntity
     * @param \Spryker\Zed\Oms\Business\Util\ReadOnlyArrayObject $data
     *
     * @return array
     */
    public function run(SpySalesOrderItem $orderItem, ReadOnlyArrayObject $data)
    {
        return [];
    }
}
