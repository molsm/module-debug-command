<?php

namespace MolsM\Playground\Seeds\Common;

use Magento\Customer\Model\CustomerFactory;
use Magento\Customer\Model\ResourceModel\CustomerRepository;
use Magento\Customer\Model\AddressFactory;
use Faker\Factory as Faker;

class Customer
{
    const DEDAULT_RECORDS = 100;

    protected $customerFactory;

    protected $customerRepository;

    protected $addressFactory;

    protected $records = self::DEDAULT_RECORDS;

    public function __construct(
        CustomerFactory $customerFactory,
        CustomerRepository $customerRepository,
        AddressFactory $addressFactory
    ) {
        $this->customerFactory = $customerFactory;
        $this->customerRepository = $customerRepository;
        $this->addressFactory = $addressFactory;
    }

    public function place()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= $this->records; ++$i) {
            $customer = $this->customerFactory->create();
            $address = $this->addressFactory->create();
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