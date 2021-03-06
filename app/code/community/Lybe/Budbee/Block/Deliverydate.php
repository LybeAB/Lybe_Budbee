<?php
/**
 *  Copyright 2016 Lybe AB.
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 *
 *  @package     Lybe_budbee
 *  @author      sabri.zouari@lybe.se
 */
class Lybe_budbee_Block_Deliverydate extends Mage_Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('lybe/budbee/sales/view_delivery_date.phtml');
    }

    public function displayDeliveryDate()
    {
        $displayDate = false;

        if($this->getOrder()->getBudbeeDesiredDeliveryDate() != NULL)
            $displayDate = true;

        return $displayDate;
    }

    public function getDisplayDeliveryDate()
    {
        $delivered_date = Mage::helper('lybe_budbee')->formatDesiredDeliveryDate($this->getOrder()->getBudbeeDesiredDeliveryDate());

        $info = array(
            'delivered_date' => $delivered_date,
            'door_code' => $this->getOrder()->getBudbeeDoorCode(),
            'outside_door' => $this->getOrder()->getBudbeeOutsideDoor()
        );

        return $info;
    }

    public function getOrder()
    {
        return Mage::registry('current_order');
    }
}