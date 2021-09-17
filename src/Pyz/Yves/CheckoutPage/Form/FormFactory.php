<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CheckoutPage\Form;

use Pyz\Yves\CheckoutPage\Form\Steps\PaymentForm;
use Pyz\Yves\CheckoutPage\Form\Steps\VoucherForm;
use Spryker\Yves\StepEngine\Form\FormCollectionHandlerInterface;
use SprykerShop\Yves\CheckoutPage\Form\FormFactory as SprykerFormFactory;

class FormFactory extends SprykerFormFactory
{
    /**
     * @return \Spryker\Yves\StepEngine\Form\FormCollectionHandlerInterface
     */
    public function getPaymentFormCollection(): FormCollectionHandlerInterface
    {
        $createPaymentSubForms = $this->getPaymentMethodSubForms();
        $subFormDataProvider = $this->createSubFormDataProvider($createPaymentSubForms);

        return $this->createSubFormCollection(PaymentForm::class, $subFormDataProvider);
    }

    /**
     * @return \Spryker\Yves\StepEngine\Form\FormCollectionHandlerInterface
     */
    public function createVoucherFormCollection()
    {
        return $this->createFormCollection($this->getVoucherFormTypes());
    }

    /**
     * @return string[]
     */
    public function getVoucherFormTypes()
    {
        return [
            $this->getVoucherForm(),
        ];
    }

    /**
     * @return string
     */
    public function getVoucherForm()
    {
        return VoucherForm::class;
    }
}
