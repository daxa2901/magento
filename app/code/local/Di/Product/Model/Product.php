<?php 
class Di_Product_Model_Product extends Mage_Core_Model_Abstract
{
	public function _construct()
	{
		$this->_init('product/product');
	}

	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 2;
	const STATUS_DEFAULT = 1;
	const STATUS_ENABLED_LBL = 'Active';
	const STATUS_DISABLED_LBL = 'Inactive';
	
	public function __construct()
	{
		$this->setResourceClassName('Category_Resource');
		parent::__construct();
	}

	public function getStatus($key = null)
	{
		$statuses = [
			self::STATUS_ENABLED => self::STATUS_ENABLED_LBL,
			self::STATUS_DISABLED => self::STATUS_DISABLED_LBL,
		];

		if(!$key)
		{
			return $statuses;
		}

		if (array_key_exists($key,$statuses)) 
		{	
			return $statuses[$key];
		}
		return self::STATUS_DEFAULT;
	}


	public function getFinalPrice()
	{
		$discount = $this->discount;
		if ($this->discount_mode == 2) 
		{
			$discount = ($this->price * ($this->discount/100));
		}
		$discountPrice = $this->price - $this->cost;
		if ($discountPrice < 1) 
		{
			throw new Exception("Cost must be less than price.", 1);
		}
		if ($discount > $discountPrice || $discount < 1) 
		{
			throw new Exception("Discount must be between price and cost.", 1);
		}
		return $this->price - $discount;
	}
	
}