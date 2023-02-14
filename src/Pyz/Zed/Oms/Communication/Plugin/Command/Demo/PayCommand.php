<?php

namespace Pyz\Zed\Oms\Communication\Plugin\Command\Demo;

use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Spryker\Zed\Oms\Business\Util\ReadOnlyArrayObject;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Command\AbstractCommand;
use Spryker\Zed\Oms\Dependency\Plugin\Command\CommandByOrderInterface;

class PayCommand extends AbstractCommand implements CommandByOrderInterface
{
    /**
     *
     * Command which is executed per order basis
     *
     * @param SpySalesOrderItem[] $orderItems
     * @param SpySalesOrder $orderEntity
     * @param ReadOnlyArrayObject $data
     *
     * @return array
     * @api
     *
     */
    public function run(array $orderItems, SpySalesOrder $orderEntity, ReadOnlyArrayObject $data)
    {
        return [];
    }
}
