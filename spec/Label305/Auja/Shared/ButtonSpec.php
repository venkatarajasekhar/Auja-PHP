<?php

namespace spec\Label305\Auja\Shared;

set_include_path(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . PATH_SEPARATOR . get_include_path());
require_once('BaseSpec.php'); // TODO: can this be prettier?

use Prophecy\Argument;
use spec\Label305\Auja\BaseSpec;

class ButtonSpec extends BaseSpec {

    function it_is_initializable() {
        $this->shouldHaveType('Label305\Auja\Shared\Button');
    }

    function it_has_no_type(){
        $this->getType()->shouldBeNull();
    }

    function it_has_a_text() {
        $this->setText('Text');
        $this->getText()->shouldBe('Text');
    }

    function it_can_have_a_confirmation_message() {
        $this->setConfirmationMessage('Confirmation');
        $this->getConfirmationMessage()->shouldBe('Confirmation');
    }

    function it_has_a_target() {
        $this->setTarget('Target');
        $this->getTarget()->shouldBe('Target');
    }

    function it_has_a_method() {
        $this->setMethod('Method');
        $this->getMethod()->shouldBe('Method');
    }

    function it_can_return_json_serializable_data() {
        $this->setConfirmationMessage('Confirmation');

        $this->jsonSerialize()->shouldHaveKeys(array(
            'text',
            'confirm',
            'target',
            'method'
        ));
    }

    function it_can_return_json_serializable_data_without_confirmation_message() {
        $this->jsonSerialize()->shouldHaveCount(3);
        $this->jsonSerialize()->shouldHaveKeys(array(
            'text',
            'target',
            'method'
        ));
    }

    function it_returns_jsonSerialize_as_aujaSerialize() {
        $this->aujaSerialize()->shouldReturn($this->jsonSerialize());
    }
}
