<?php
/**
 * Created by PhpStorm.
 * User: davidthomas
 * Date: 6/23/18
 * Time: 1:31 PM
 */
namespace Album\Form;

use Zend\Form\Form;
use Zend\Captcha;
use Zend\Form\Element;


use Zend\Captcha\ReCaptcha;
//use Zend\Validator\ValidatorInterface;

//use Zend\Service\ReCaptcha\ReCaptcha;


class AlbumForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('album');






        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);

        $this->add([
            'name' => 'title',
            'type' => 'text',
            'options' => [
                'label' => 'Title',
            ],
        ]);


        $this->add([
            'name' => 'title',
            'type' => 'text',
            'options' => [
                'label' => 'Title',
            ],
        ]);
        $this->add([
            'name' => 'artist',
            'type' => 'text',
            'options' => [
                'label' => 'Artist',
            ],
        ]);




        $privatekey = 'yyyyyyyyyyyyyyyy';
        $publickey = 'yyyyyy';

        $recap= new  \Zend\Captcha\ReCaptcha();
        $recap->setSiteKey($publickey);
        $recap->setSecretKey($privatekey);
        $recap->generate();





        $this->add([
            'type' => 'Zend\Form\Element\Captcha',
            'name' => 'captcha',
            'options' => [
                'label' => 'Please verify you are human',
                'captcha' => $recap,
            ],
        ]);




        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id'    => 'submitbutton',
            ],
        ]);

    }
}