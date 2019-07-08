<?php

namespace Dialogflow\Action\Questions;

use Dialogflow\Action\Interfaces\QuestionInterface;

class DeliveryAddress implements QuestionInterface
{
    /** @var string */
    protected $reason;

    public function __construct($reason)
    {
        $this->reason = $reason;
    }

    /**
     * Create a new DeliveryAddress instance.
     *
     * @param string $context
     * @return DeliveryAddress
     */
    public static function create($reason)
    {
        return new self($reason);
    }

    /**
     * Render a single Rich Response item as array.
     *
     * @return null|array
     */
    public function renderRichResponseItem()
    {
        $out = [];

        $out['simpleResponse'] = ['textToSpeech' => 'PLACEHOLDER_FOR_DELIVERY_ADDRESS'];

        return $out;
    }

    /**
     * Render System Intent as array.
     *
     * @return null|array
     */
    public function renderSystemIntent()
    {
        $out = [];

        $out['intent'] = 'actions.intent.DELIVERY_ADDRESS';
        $out['data'] = [
            '@type'       => 'type.googleapis.com/google.actions.v2.DeliveryAddressValueSpec',
            'addressOptions'  => [
                'reason' => $this->reason
            ]
        ];

        return $out;
    }
}