<?php
namespace morhos\test\Russian;
require_once __DIR__.'/../../vendor/autoload.php';

use morphos\Russian\GeneralDeclension;

class GeneralDeclensionTest extends \PHPUnit_Framework_TestCase {
    protected $dec;

    public function setUp() {
        $this->dec = new GeneralDeclension();
    }

    /**
     * @dataProvider wordsProvider
     */
    public function testDeclensionDetect($word, $animateness, $declension) {
        $this->assertEquals($declension, GeneralDeclension::getDeclension($word));
    }

    /**
     * @dataProvider wordsProvider
     */
    public function testDeclenation($word, $animateness, $declension, $declenated) {
        $this->assertEquals($declenated, array_values($this->dec->getForms($word, $animateness)));
    }

    public function wordsProvider() {
        return array(
            array('дом', false, 1, array('дом', 'дома', 'дому', 'дом', 'домом', 'о доме')),
            array('поле', false, 1, array('поле', 'поля', 'полю', 'поле', 'полем', 'о поле')),
            // array('ночь', false, 2, array('ночь', 'ночи', 'ночи', 'ночь', 'ночью', 'о ночи')),
            // array('кирпич', false, 1, array('кирпич', 'кирпича', 'кирпичу', 'кирпич', 'кирпичем', 'о кирпиче')),
            array('гвоздь', false, 1, array('гвоздь', 'гвоздя', 'гвоздю', 'гвоздь', 'гвоздем', 'о гвозде')),
            array('гений', true, 1, array('гений', 'гения', 'гению', 'гения', 'гением', 'о гении')),
            array('молния', false, 2, array('молния', 'молнии', 'молние', 'молнию', 'молнией', 'о молние')),
        );
    }

    /**
     * @dataProvider immutableWordsProvider
     */
    public function testImmutableWords($word) {
        $this->assertFalse($this->dec->hasForms($word, false));
    }

    public function immutableWordsProvider() {
        return array(
            array('авеню'),
            array('атташе'),
            array('бюро'),
            array('вето'),
            array('денди'),
            array('депо'),
            array('жалюзи'),
            array('желе'),
            array('жюри'),
            array('интервью'),
            array('какаду'),
            array('какао'),
            array('кафе'),
            array('кашне'),
            array('кенгуру'),
            array('кино'),
            array('клише'),
            array('кольраби'),
            array('коммюнике'),
            array('конферансье'),
            array('кофе'),
            array('купе'),
            array('леди'),
            array('меню'),
            array('метро'),
            array('пальто'),
            array('пенсне'),
            array('пианино'),
            array('плато'),
            array('портмоне'),
            array('рагу'),
            array('радио'),
            array('самбо'),
            array('табло'),
            array('такси'),
            array('трюмо'),
            array('фортепиано'),
            array('шимпанзе'),
            array('шоссе'),
            array('эскимо'),
            array('галифе'),
            array('монпансье'),
        );
    }
}
