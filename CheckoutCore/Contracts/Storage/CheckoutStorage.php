<?php

namespace SendCloud\SendCloud\CheckoutCore\Contracts\Storage;

use SendCloud\SendCloud\CheckoutCore\Domain\Delivery\DeliveryMethod;
use SendCloud\SendCloud\CheckoutCore\Domain\Delivery\DeliveryZone;

interface CheckoutStorage
{
    /**
     * Provides all delivery zone configurations.
     *
     * @return DeliveryZone[]
     */
    public function findAllZoneConfigs();

    /**
     * Deletes specified zone configurations.
     *
     * @param array $ids
     *
     * @return void
     */
    public function deleteSpecificZoneConfigs(array $ids);

    /**
     * Deletes all saved zone configurations.
     *
     * @return void
     */
    public function deleteAllZoneConfigs();

    /**
     * Updates saved zone configurations.
     *
     * @param DeliveryZone[] $zones
     *
     * @return void
     */
    public function updateZoneConfigs(array $zones);

    /**
     * Creates delivery zones.
     *
     * @param DeliveryZone[] $zones
     *
     * @return void
     */
    public function createZoneConfigs(array $zones);

    /**
     * Provides all delivery method configurations.
     *
     * @return DeliveryMethod[]
     */
    public function findAllMethodConfigs();

    /**
     * Deletes methods identified by the provided batch of ids.
     *
     * @param array $ids
     *
     * @return void
     */
    public function deleteSpecificMethodConfigs(array $ids);

    /**
     * Deletes all delivery method configurations.
     *
     * @return void
     */
    public function deleteAllMethodConfigs();

    /**
     * Updates saved delivery methods.
     *
     * @param DeliveryMethod[] $methods
     *
     * @return void
     */
    public function updateMethodConfigs(array $methods);

    /**
     * Creates method configurations.
     *
     * @param DeliveryMethod[] $methods
     *
     * @return void
     */
    public function createMethodConfigs(array $methods);

    /**
     * Deletes all delivery method data generated by the integration.
     *
     * @return void
     */
    public function deleteAllMethodData();

    /**
     * Provides delivery zones with specified ids.
     *
     * @param array $ids
     *
     * @return DeliveryZone[]
     */
    public function findZoneConfigs(array $ids);

    /**
     * Finds delivery methods for specified zone ids.
     *
     * @param array $zoneIds
     * @return DeliveryMethod[]
     */
    public function findMethodInZones(array $zoneIds);

    /**
     * Delete delivery method configs for delivery methods that no longer exist in system.
     *
     * @return void
     */
    public function deleteObsoleteMethodConfigs();

    /**
     * Delete delivery zone configs for delivery zones that no longer exist in system.
     *
     * @return void
     */
    public function deleteObsoleteZoneConfigs();
}
