<?php

namespace Pyz\Yves\CheckoutPage\Form\Steps;

use Spryker\Yves\Kernel\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class VoucherForm extends AbstractType
{
    private const FIELD_ID_VOUCHER_CODE = 'voucher-code';
    private const VOUCHER_PROPERTY_PATH = 'voucher';

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'voucherForm';
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return $this
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(self::FIELD_ID_VOUCHER_CODE, TextType::class, [
            'required' => true,
            'property_path' => static::VOUCHER_PROPERTY_PATH,
            'constraints' => [
                new NotBlank(),
            ],
            'label' => false,
        ]);

        return $this;
    }
}
