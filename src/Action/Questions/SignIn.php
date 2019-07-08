<?php

namespace Dialogflow\Action\Questions;

use Dialogflow\Action\Interfaces\QuestionInterface;

class SignIn implements QuestionInterface
{
    /** @var string */
    protected $context;

    public function __construct($context)
    {
        $this->context = $context;
    }

    /**
     * Create a new SingIn instance.
     *
     * @param string $context
     * @return SignIn
     */
    public static function create($context)
    {
        return new self($context);
    }

    /**
     * Render a single Rich Response item as array.
     *
     * @return null|array
     */
    public function renderRichResponseItem()
    {
        $out = [];

        $out['simpleResponse'] = ['textToSpeech' => 'PLACEHOLDER_FOR_SIGN_IN'];

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

        $out['intent'] = 'actions.intent.SIGN_IN';
        $out['data'] = [
            '@type'       => 'type.googleapis.com/google.actions.v2.SignInValueSpec',
            'optContext'  => $this->context
        ];

        return $out;
    }
}