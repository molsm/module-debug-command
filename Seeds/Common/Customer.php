<?php

namespace MolsM\Playground\Seeds\Common;

use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Api\Data\CustomerInterfaceFactory;
use Magento\Customer\Model\CustomerFactory;
use Magento\Customer\Model\ResourceModel\CustomerRepository;
use Magento\Customer\Api\Data\AddressInterfaceFactory;
use Magento\Quote\Api\Data\AddressInterface;
use Magento\Framework\App\State;

class Customer
{
    const DEDAULT_RECORDS = 100;

    protected $customerFactory;

    protected $customerRepository;

    protected $addressFactory;

    protected $state;

    protected $records = self::DEDAULT_RECORDS;

    public function __construct(
        CustomerInterfaceFactory $customerFactory,
        CustomerRepository $customerRepository,
        AddressInterfaceFactory $addressFactory,
        State $state
    ) {
        $this->customerFactory = $customerFactory;
        $this->customerRepository = $customerRepository;
        $this->addressFactory = $addressFactory;
        $this->state = $state;
    }

    public function place()
    {
        $faker = \Faker\Factory::create();
        $this->state->setAreaCode('adminhtml');

        for ($i = 1; $i <= $this->records; ++$i) {
            /** @var CustomerInterface $customer */
            $customer = $this->customerFactory->create();
            /** @var \Magento\Customer\Model\Address $address */
            $address = $this->addressFactory->create();

            $firstName = $faker->firstName;
            $lastName = $faker->lastName;

            $customer->setFirstname($firstName);
            $customer->setLastname($lastName);
            $customer->setEmail(rand(0, 10000).$faker->safeEmail);
//            $customer->setPassword('secret123');

            $address->setCountryId('US');
            $address->setPostcode($faker->postcode);
            $address->setTelephone($faker->phoneNumber);
            $address->setStreet([$faker->streetAddress]);
            $address->setCity($faker->city);
            $address->setFirstname($firstName);
            $address->setLastname($lastName);


            $customer->setAddresses([$address]);

            $this->customerRepository->save($customer);

            if ($i % 1000 == 0) {
                echo '1000 iteration passed'.PHP_EOL;
            }
        }
    }

    /**
     * @param $records
     * @return $this
     */
    public function setRecords($records)
    {
        $this->records = $records;

        return $this;
    }

}