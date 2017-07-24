<?php
/**
 * DISCLAIMER
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future.
 *
 * @category  Smile
 * @package   Smile\StoreLocator
 * @author    Romain Ruaud <romain.ruaud@smile.fr>
 * @copyright 2017 Smile
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Smile\StoreLocator\Model\Data;

use Smile\StoreLocator\Api\Data\RetailerTimeSlotInterface;
use Zend\Stdlib\JsonSerializable;

/**
 * Data Object for Time Slot entries.
 *
 * @category Smile
 * @package  Smile\StoreLocator
 * @author   Romain Ruaud <romain.ruaud@smile.fr>
 */
class RetailerTimeSlot extends \Magento\Framework\Model\AbstractExtensibleModel implements RetailerTimeSlotInterface, JsonSerializable
{
    /**
     * {@inheritDoc}
     */
    public function getDayOfWeek()
    {
        return $this->getData(self::DAY_OF_WEEK_FIELD);
    }

    /**
     * {@inheritDoc}
     */
    public function getDate()
    {
        return $this->getData(self::DATE_FIELD);
    }

    /**
     * {@inheritDoc}
     */
    public function setDayOfWeek($dayOfWeek)
    {
        $this->setData(self::DAY_OF_WEEK_FIELD, $dayOfWeek);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setDate($date)
    {
        $this->setData(self::DATE_FIELD, $date);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setStartTime($time)
    {
        $this->setData('start_time', $time);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setEndTime($time)
    {
        $this->setData('end_time', $time);

        return $this;
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     *        which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'start_time' => $this->getStartTime(),
            'end_time'   => $this->getEndTime(),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getStartTime()
    {
        return $this->getData('start_time');
    }

    /**
     * {@inheritDoc}
     */
    public function getEndTime()
    {
        return $this->getData('end_time');
    }

    /**
     * {@inheritDoc}
     */
    public function getExtensionAttributes()
    {
        $extensionAttributes = $this->_getExtensionAttributes();
        if (!$extensionAttributes) {
            return $this->extensionAttributesFactory->create('Smile\StoreLocator\Api\Data\RetailerTimeSlotInterface');
        }

        return $extensionAttributes;
    }

    /**
     * {@inheritDoc}
     */
    public function setExtensionAttributes(\Smile\StoreLocator\Api\Data\RetailerTimeSlotExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
