<?php

namespace App\Forms;

use Themosis\Field\Contracts\FieldFactoryInterface;
use Themosis\Forms\Contracts\FormFactoryInterface;
use Themosis\Forms\Contracts\Formidable;
use Themosis\Forms\Contracts\FormInterface;

class ContactForm implements Formidable
{
    /**
     * Build your form.
     *
     * @param FormFactoryInterface  $factory
     * @param FieldFactoryInterface $fields
     *
     * @return FormInterface
     */
    public function build(FormFactoryInterface $factory, FieldFactoryInterface $fields): FormInterface
    {
        return $factory->make()
        ->add($fields->text('fullname', [
            'label' => 'Nom & Prénom<sup>*</sup>',
            'rules' => 'required|min:3'
            ]))
        ->add($fields->email('email', [
            'label' => 'Adresse E-Mail<sup>*</sup>',
            'rules' => 'required|email'
            ]))
        ->add($fields->textarea('message', [
            'label' => 'Votre message<sup>*</sup>',
            'rules' => 'required|min:10'
            ]))
        ->add($fields->text('age', [
            'label' => false,
            'attributes' => [
                'aria-hidden' => 'true',
                'class' => 'form-age',
                'autocomplete' => 'age'
            ]
        ]))
        ->add($fields->submit('send', [
            'label' => 'Envoyer'
        ]))
        ->get();
    }
}
