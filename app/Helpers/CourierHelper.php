<?php

namespace App\Helpers;

class CourierHelper
{
    /**
     * Supported courier partners and their official tracking templates
     */
    public static function getCouriers(): array
    {
        return [
            'Delhivery' => [
                'name' => 'Delhivery',
                'url_template' => 'https://www.delhivery.com/track/package/{TRACKING_ID}',
                'base_url' => 'https://www.delhivery.com/tracking',
            ],
            'Blue Dart' => [
                'name' => 'Blue Dart',
                'url_template' => 'https://www.bluedart.com/web/guest/trackdartresult?trackFor=0&trackNo={TRACKING_ID}',
                'base_url' => 'https://www.bluedart.com/tracking',
            ],
            'DTDC' => [
                'name' => 'DTDC',
                'url_template' => 'https://track.dtdc.com/ctbs-tracking/customerInterface.tr?submitName=showTrackingDetail&strCnno={TRACKING_ID}',
                'base_url' => 'https://www.dtdc.in/tracking.asp',
            ],
            'India Post' => [
                'name' => 'India Post',
                'url_template' => 'https://www.indiapost.gov.in/_layouts/15/dop.portal.tracking/trackconsignment.aspx',
                'base_url' => 'https://www.indiapost.gov.in/_layouts/15/dop.portal.tracking/trackconsignment.aspx',
            ],
            'DHL' => [
                'name' => 'DHL',
                'url_template' => 'https://www.dhl.com/in-en/home/tracking/tracking-express.html?submit=1&tracking-id={TRACKING_ID}',
                'base_url' => 'https://www.dhl.com/in-en/home/tracking.html',
            ],
            'FedEx' => [
                'name' => 'FedEx',
                'url_template' => 'https://www.fedex.com/fedextrack/?trknbr={TRACKING_ID}',
                'base_url' => 'https://www.fedex.com/en-in/tracking.html',
            ],
            'Other' => [
                'name' => 'Other',
                'url_template' => '',
                'base_url' => '',
            ],
        ];
    }

    /**
     * Supported delivery tracking statuses
     */
    public static function getStatuses(): array
    {
        return [
            'processing' => [
                'label' => 'Processing',
                'badge' => 'warning text-dark',
                'step' => 1,
                'description' => 'Your order is currently being processed and prepared for packing.',
            ],
            'ready_to_ship' => [
                'label' => 'Ready to Ship',
                'badge' => 'info text-dark',
                'step' => 2,
                'description' => 'Parcel is packaged, labeled, and waiting for courier pickup.',
            ],
            'shipped' => [
                'label' => 'Shipped',
                'badge' => 'primary',
                'step' => 3,
                'description' => 'Parcel handed over to courier partner and dispatched.',
            ],
            'in_transit' => [
                'label' => 'In Transit',
                'badge' => 'primary',
                'step' => 3,
                'description' => 'Parcel is on its way to the delivery hub.',
            ],
            'out_for_delivery' => [
                'label' => 'Out for Delivery',
                'badge' => 'info text-dark',
                'step' => 4,
                'description' => 'Courier agent is out for final doorstep delivery today.',
            ],
            'delivered' => [
                'label' => 'Delivered',
                'badge' => 'success',
                'step' => 5,
                'description' => 'Parcel has been successfully delivered.',
            ],
            'delivery_failed' => [
                'label' => 'Delivery Failed',
                'badge' => 'danger',
                'step' => 4,
                'description' => 'Delivery attempt was unsuccessful. A re-attempt or contact is needed.',
            ],
        ];
    }

    /**
     * Get label for a status
     */
    public static function getStatusLabel(?string $status): string
    {
        $statuses = self::getStatuses();
        return $statuses[$status]['label'] ?? (ucwords(str_replace('_', ' ', $status ?: 'Processing')));
    }

    /**
     * Get badge class for a status
     */
    public static function getStatusBadge(?string $status): string
    {
        $statuses = self::getStatuses();
        return $statuses[$status]['badge'] ?? 'secondary';
    }

    /**
     * Build the direct tracking URL for the courier and tracking ID
     */
    public static function buildTrackingUrl(?string $courier, ?string $trackingId, ?string $customUrl = null): ?string
    {
        $trackingId = trim((string)$trackingId);
        $customUrl = trim((string)$customUrl);

        // If customUrl is provided
        if (!empty($customUrl)) {
            if (str_contains($customUrl, '{TRACKING_ID}') && !empty($trackingId)) {
                return str_replace('{TRACKING_ID}', urlencode($trackingId), $customUrl);
            }
            return $customUrl;
        }

        if (empty($courier)) {
            return null;
        }

        $couriers = self::getCouriers();
        $matchedKey = null;

        foreach ($couriers as $key => $info) {
            if (strcasecmp($key, $courier) === 0 || strcasecmp($info['name'], $courier) === 0) {
                $matchedKey = $key;
                break;
            }
        }

        if ($matchedKey && !empty($couriers[$matchedKey]['url_template']) && !empty($trackingId)) {
            return str_replace('{TRACKING_ID}', urlencode($trackingId), $couriers[$matchedKey]['url_template']);
        }

        if ($matchedKey && !empty($couriers[$matchedKey]['base_url'])) {
            return $couriers[$matchedKey]['base_url'];
        }

        return null;
    }
}
