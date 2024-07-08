<?php

namespace CraftFieldConnector\Enums;

enum TransferTypeEnum: string
{
    /**
     * Contained will pack all the detail data in the event itself.
     *
     * @var string
     */
    case Contained = 'contained';

    /**
     * Bucket will store all the detail data in the bucket and retrieve it in Ludwig.
     *
     * @var string
     */
    case Bucket = 'bucket';
}
